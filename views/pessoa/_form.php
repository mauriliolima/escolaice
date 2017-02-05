<?php

use backend\models\Standard;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
//use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;


use kartik\builder\Form;
use kartik\form\ActiveForm;
use kartik\helpers\Html;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;

use app\models\Estado;
use app\models\Pais;
use app\models\Pessoa;

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */

$tipoPessoa = ['F' => 'Fisica', 'J' => 'Juridica', ];

$url_busca_cep = Url::to(['pessoa/busca-cep']);

$script = <<< JS
$(document).ready( function(){
	if ('{$model->tipo_pessoa}' == 'F') {
		$('div.field-pessoa-nome_fantasia').hide();
	} else {
		$('div.field-pessoa-nome_fantasia').show();
	}
});

$('form#{$model->formName()}').on('beforeSubmit', function(e)
{
    var \$form = $(this);
	
	$.post(
        \$form.attr("action"), 
        \$form.serialize()
    )
    .done(function(result) {
        if(result == 1)
        {
            $(document).find('#modal').modal('hide');
            $(\$form).trigger("reset");
			$.pjax.reload({container:'#PessoaGrid'});
        } else {
            $("#message").html(result);
        }
    })
    .fail(function()
    {
        console.log("server error");
    });
    return false;
});

var droplist = $('#pessoa-tipo_pessoa');
droplist.change(function(){
	if(droplist.val() == 'F'){
		$('div.field-pessoa-nome_fantasia').hide();
		$('div.field-pessoa-id_pessoa_pai').show();
		$('div.field-pessoa-id_pessoa_mae').show();
		$('div.field-pessoa-id_pessoa_responsavel').show();
		$('div.field-pessoa-numero_identidade').show();
		$('div.field-pessoa-orgao_identidade').show();
		$('div.field-pessoa-emissao_identidade').show();
		$('div.field-pessoa-data_nascimento').show();
	} else {
		$('div.field-pessoa-nome_fantasia').show();
		$('div.field-pessoa-id_pessoa_pai').hide();
		$('div.field-pessoa-id_pessoa_mae').hide();
		$('div.field-pessoa-id_pessoa_responsavel').hide();
		$('div.field-pessoa-numero_identidade').hide();
		$('div.field-pessoa-orgao_identidade').hide();
		$('div.field-pessoa-emissao_identidade').hide();
		$('div.field-pessoa-data_nascimento').hide();
	}
});		

var objcep = $('#pessoa-cep');
objcep.blur(function(){
	var valorcep = objcep.val();
	$.getJSON('{$url_busca_cep}', {cep: valorcep})
	.done(function(data){
		$('#pessoa-logradouro').val(data.logradouro);
		$('#pessoa-bairro').val(data.bairro);
		
		//$('#pessoa-id_pais').append('<option value=36>Brasil</option>');
		$('#pessoa-id_pais').select2('val', 36, true);
		
	})
	 
});
JS;
$this->registerJs($script);

Modal::begin([
		'header'=>'<h4>Incluir/Editar Pessoa</h4>',
		'id'=>'modal',
		'size'=>'modal-lg',
		]);
echo "<div id='modalContent'></div>";
Modal::end();


$form = kartik\widgets\ActiveForm::begin([
    'id' => $model->formName(),
    'type' => ActiveForm::TYPE_VERTICAL, 
	//'action' => ['index'],
    //'enableAjaxValidation' => true,
	'enableClientValidation' => true,
	//'withAjaxSubmit' => true,
    ]);

echo Form::widget([
	'model' => $model,
	'form' => $form,
	'columns' => 3,
	'attributes' => [
		'tipo_pessoa' => [
			'type' => Form::INPUT_DROPDOWN_LIST,
			'options' => [ 
				'options' => ['placeholder' => 'Selecione', ],
			],
			'items' => $tipoPessoa, 
		],
		'cpf_cnpj' => [ $form->field($model, 'cpf_cnpj')->widget(\yii\widgets\MaskedInput::className(), ['mask' => ['999.999.999-99','99.999.999/9999-99']]),
		], 
		'data_nascimento' => [
			'type'=>Form::INPUT_WIDGET, 
			'widgetClass'=>'\kartik\widgets\DatePicker', 
			'options' => [
				'type' => DatePicker::TYPE_COMPONENT_APPEND,
				'language' => 'pt-BR',
				'pluginOptions' => [
					'data-date-format' => 'dd/mm/yyyy',
					'autoclose' => true,
					'todayHighlight' => true 
				]
			],
		],
	]
]);
echo Form::widget([
	'model' => $model,
	'form' => $form,
	'columns' => 1,
	'attributes' => [
		'nome'              => ['type' => Form::INPUT_TEXT, ],
		'nome_fantasia'     => ['type' => Form::INPUT_TEXT, ],
	]
]);

echo Form::widget([
	'model' => $model,
	'form' => $form,
	'columns' => 5,
	'attributes' => [
		'cep' => [
			'type' => Form::INPUT_TEXT,
			'options' => [
				'maxlengh' => true,
			]
		],
		'logradouro' => [
			'type' => Form::INPUT_TEXT,
			'options' => [
				'placeholder' => 'Digite o nome da rua, avenida, travessa, etc.',
			],
			'columnOptions'=>['colspan'=>2],
		],
		'numero' => [
			'type' => Form::INPUT_TEXT,
		],
		'complemento' => [
			'type' => Form::INPUT_TEXT,
		],
			'bairro' => [
			'type' => Form::INPUT_TEXT,
			'columnOptions'=>['colspan'=>2],
		],
		'id_pais' => [ 
			'type'=>Form::INPUT_WIDGET, 
			'widgetClass'=>'kartik\select2\Select2',
			'options' => [
				'data' => ArrayHelper::map(Pais::find()->orderBy('nome')->asArray()->all(), 'id_pais', 'nome'),
				'options' => ['placeholder' => Yii::t('app','Selecione')],
				'pluginOptions' => [
					'allowClear' => true
				],
			],
		],
		'id_estado' => [ 
			'type'=>Form::INPUT_WIDGET, 
			'widgetClass'=>'kartik\widgets\DepDrop',
			'options' => [
				'type'=>DepDrop::TYPE_SELECT2,
				'options' => ['placeholder' => Yii::t('app','Selecione')],
				'pluginOptions' => [
					'loading' => 'Carregando...',
					'depends' => ['pessoa-id_pais'],
					'allowClear' => true,
					'url' => Url::to(['/pessoa/lista-estados?sel=' . $model->id_estado]),
					'initialize' => true,
				],
			],
		],
		'id_cidade' => [
			'type'=>Form::INPUT_WIDGET, 
			'widgetClass'=>'kartik\widgets\DepDrop',
			'options' => [
				'type'=>DepDrop::TYPE_SELECT2,
				'options' => ['placeholder' => Yii::t('app','Selecione')],
				'pluginOptions' => [
					'loading' => 'Carregando...',
					'depends' => ['pessoa-id_estado'],
					'allowClear' => true,
					'url' => Url::to(['/pessoa/lista-cidades?sel=' . $model->id_cidade]),
				],
			],
			'columnOptions'=>['colspan'=>2],
		],
	]
]);

echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 3,
    'attributes' => [
        'numero_identidade' => [
            'type' => Form::INPUT_TEXT,
            'options' => [
                'maxlengh' => true,
            ]
        ],
        'orgao_identidade' => [
            'type' => Form::INPUT_TEXT,
            'options' => [
                'maxlengh' => true,
            ]            
        ],
        'emissao_identidade' => [
			'type'=>Form::INPUT_WIDGET, 
			'widgetClass'=>'\kartik\widgets\DatePicker', 
            'options' => [
				'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'language' => 'pt-BR',
                'pluginOptions' => [
                		'format' => 'dd/mm/yyyy',
                    'autoclose' => true,
                    'todayHighlight' => true 
								]
            ],
        ],
    ],
]);

echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,
    'attributes' => [
        'id_pessoa_pai' => [ 
			'type'=>Form::INPUT_WIDGET, 
    		'widgetClass'=>'kartik\select2\Select2',
    		'options' => [
				'initValueText' => [$model->id_pessoa_pai == '' ? '' : Pessoa::find()->where(['id_pessoa' => $model->id_pessoa_pai])->one()->nome],
				'language' => 'pt_BR',
				//'options' => ['placeholder' => Yii::t('app','Selecione')],
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
				'addon' => [
					'append' => [
						'content' => Html::button(Html::icon('plus-sign'), [
							'class' => 'btn btn-primary modalButton', 
							'title' => 'Adicionar', 
							'data-toggle' => 'tooltip',
							'value' => Url::to('/web/pessoa/createmin'),
							'id'=>'mdb_id_pessoa_pai',
						]),
						'asButton' => true
					]
				]
			],     
        ],
        'id_pessoa_mae' => ['type'=>Form::INPUT_WIDGET, 
			'widgetClass'=>'kartik\select2\Select2',
			'options' => [
				'initValueText' => [$model->id_pessoa_mae == '' ? '' : Pessoa::find()->where(['id_pessoa' => $model->id_pessoa_mae])->one()->nome],
				'language' => 'pt_BR',
				//'options' => ['placeholder' => Yii::t('app','Selecione')],
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
				'addon' => [
					'append' => [
						'content' => Html::button(Html::icon('plus-sign'), [
							'class' => 'btn btn-primary modalButton', 
							'title' => 'Adicionar', 
							'data-toggle' => 'tooltip',
							'value' => Url::to('/web/pessoa/createmin'),
							'id'=>'mdb_id_pessoa_mae',
						]),
						'asButton' => true
					],
				],

			],
        ],
    ]
]);

echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [
        'actions'=>[
            'type'=>Form::INPUT_RAW, 
            'value'=>'<div style="text-align: right; margin-top: 20px">' . 
                Html::submitButton($model->isNewRecord ? 'Gravar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) . 
                '</div>'
        ],
    ]
]); 

kartik\widgets\ActiveForm::end();
?>

