<?php
/* @var $this yii\web\View */
use app\models\PeriodoLetivo;
use app\models\Turma;
use app\models\Curso;

use yii\bootstrap\Tabs;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Progress;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

use kartik\helpers\Html;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

$this->title = 'Emissão de Boletos';

$url2 = Url::to(['/financeiro/lista-alunos-selecionados']);
$url3 = Url::to(['/financeiro/calcula-boleto']);

$script = <<< JS

$('#selecaoAluno').on('beforeSubmit', function(e)
{
    var \$form = $(this);
	
	$.post(
        \$form.attr("action"), 
        \$form.serialize()
    )
    .done(function(result) {
        $(\$form).trigger("reset");
		$.pjax.reload({container:'#AlunosSelecionados'});
    })
    .fail(function()
    {
        console.log("server error");
    });
    return false;
});

$('#btn-gerar-boleto').click(function(){
	$.getJSON("{$url2}", function(result){
		var total = result.total;
		var linhas = result.linhas;
        $.each(linhas, function(i, field){
			//alert('calculado ' + field.matricula);
			periodo = $("#gerar_periodo").val();
			dti = $("#w3").val();
			dtf = $("#w3-2").val();
			$.ajax({
			  url: "{$url3}",
			  data: {ma: field.matricula, pr: periodo , di: dti ,df: dtf }
			}).done(function(data) {
				if (data != '1'){
					alert('boleto não gerado');
				}
				percentual = Math.round(((i+1)*100)/total);
				perc = percentual.toString()+"%";
				$(".progress-bar").width(perc);
			});
        });
		$(".progress-bar").width("0%");
    });
});


JS;
$this->registerJs($script);

?>
<div class="row">
    <h1><?= Html::encode($this->title) ?></h1>
	<div id="selecao_aluno" class="col-sm-4">
	<?php 
	$form = ActiveForm::begin(['id' => 'selecaoAluno', 'action' => Url::toRoute('financeiro/incluir-selecao')]);
	?>
	<label for='responsavel'>Respons&aacute;vel</label>
	<?php
	echo Select2::widget([
			'name' => 'responsavel',
			'language' => 'pt_BR',
			'options' => ['placeholder' => Yii::t('app','Selecione')],
			'pluginOptions' => [
				'allowClear' => true,
				'minimumInputLength' => 3,
				'ajax' => [
					'url' => Url::to(['/pessoa/lista-pessoas']),
					'dataType' => 'json',
					'data' => new JsExpression('function(params) { return {q:params.term}; }')
				],
				'language' => [
					'inputTooShort' => new JsExpression('function() { return "Digite ao menos 3 caracteres"; }'),
				]
			],
			/*'addon' => [
				'append' => [
					'content' => Html::button(Html::icon('menu-right'), [
						'class' => 'btn btn-primary modalButton', 
						'title' => 'Adicionar', 
						'data-toggle' => 'tooltip',
						//'value' => Url::to('index.php?r=pessoa/createmin'),
						'id'=>'s2_responsavel',
					]),
					'asButton' => true
				],
			],*/
        ]);
	?>	<br />
	<label for='aluno'>Aluno</label>
	<?php
	echo Select2::widget([
			'name' => 'aluno',
			'language' => 'pt_BR',
			'options' => ['placeholder' => Yii::t('app','Selecione')],
			'pluginOptions' => [
				'allowClear' => true,
				'minimumInputLength' => 3,
				'ajax' => [
					'url' => Url::to(['/aluno/lista-alunos']),
					'dataType' => 'json',
					'data' => new JsExpression('function(params) { return {q:params.term}; }')
				],
				'language' => [
					'inputTooShort' => new JsExpression('function() { return "Digite ao menos 3 caracteres"; }'),
				]
			],
			/*addon' => [
				'append' => [
					'content' => Html::button(Html::icon('menu-right'), [
						'class' => 'btn btn-primary modalButton', 
						'title' => 'Adicionar', 
						'data-toggle' => 'tooltip',
						//'value' => Url::to('index.php?r=pessoa/createmin'),
						'id'=>'s2_aluno',
					]),
					'asButton' => true
				],
			],*/
        ]);
	?>	
	<hr />
	<label for="periodo_letivo">Per&iacute;odo Letivo</label>
	<?=Select2::widget([
		'name' => 'periodo_letivo',
		'id' => 'periodo_letivo',
		'language' => 'pt_BR',
		'data' => ArrayHelper::map(PeriodoLetivo::find()->asArray()->all(), 'id_periodo_letivo', 'descricao'), 
		'options' => ['placeholder' => Yii::t('app','Selecione')],
    ]);
	?><br />
	<label for='nivel'>N&iacute;vel</label>
	<?php
	echo DepDrop::widget([
		'name' => 'nivel',
		'id' => 'nivel',
		'data' => ['0' => '<Todos>'],
		'type'=>DepDrop::TYPE_SELECT2,
		'options' => ['placeholder' => Yii::t('app','Selecione')],
		'pluginOptions' => [
			'loading' => 'Carregando...',
			'depends' => ['periodo_letivo'],
			'allowClear' => true,
			'url' => Url::to(['/nivel/lista-nivel-perlet']),
		],
    ]);
	?><br />
	<label for='turma'>Turma</label>
	<?php
	echo DepDrop::widget([
		'name' => 'turma',
		'data' => ['0' => '<Todas>'],
		'type'=>DepDrop::TYPE_SELECT2,
		'options' => ['placeholder' => Yii::t('app','Selecione')],
		'pluginOptions' => [
			'loading' => 'Carregando...',
			'depends' => ['nivel'],
			'allowClear' => true,
			'url' => Url::to(['/turma/lista-turma-perlet']),
		],
    ]);
	?>		<br />
	<label for="gerar_periodo">Per&iacute;odo</label>
	<?php 
	echo Select2::widget([
		'name' => 'gerar_periodo',
		'id' => 'gerar_periodo',
		'language' => 'pt_BR',
		'data' => ['c' => 'por Competencia', 'v' => 'por Vencimento'], //, 'p' => 'por Parcela'], 
		//'options' => ['placeholder' => Yii::t('app','Selecione')],
		'hideSearch' => true,
    ]);
	?>
	<?php
	echo DatePicker::widget([
		'name' => 'from_date',
		'value' => '01' . substr(date('d/m/Y'),2),
		'type' => DatePicker::TYPE_RANGE,
		'name2' => 'to_date',
		'value2' => date('t/m/Y'),
		'separator' => 'até',
		'language' => 'pt-BR',
		'pluginOptions' => [
			'autoclose'=>true,
			'format' => 'dd/mm/yyyy'
		]
	]);
	?>
	<br />
	 <?= Html::submitButton('Incluir Sele&ccedil;&atilde;o', ['class' => 'btn btn-primary']) ?>
	 <?= Html::a('Limpar Lista', ['limpar-alunos-selecionados', ], ['class' => 'btn btn-primary']) ?>
	 <?= Html::button('Gerar Boletos', ['class' => 'btn btn-primary', 'id' => 'btn-gerar-boleto']) ?>
	 <input type="hidden" name="alunos" id="alunos" value="<?php print_r(ArrayHelper::toArray($dataProvider->allModels)); ?>" />
	<?php
	ActiveForm::end();
	?>
	</div>
	<label>Alunos Selecionados</label>
	<?php 
	Pjax::begin(['id' => 'AlunosSelecionados']);
	?>
	<div id="grid_alunos" class="col-sm-8" style="">
	<?php
	echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'matricula',
            [
            'attribute' => 'nome', 
            'value' => 'nome',
            ],
		], 
		'options'=> ['style'=>'overflow-y:scroll;height:429px;'],
	]);
	?>
	</div>
	<?php 
	Pjax::end();
	?>
	<br /><br />
	<div class="col-sm-8">
	<?php
	echo Progress::widget([
		'percent' => 0,
		'barOptions' => ['class' => 'progress-bar-success'],
		'options' => ['class' => 'active progress-striped']
	]);
	?>
	</div>

</div>
