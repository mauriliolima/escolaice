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
use app\models\PrefixoEndereco;

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */

$script = <<< JS
$('form#{$model->formName()}').on('beforeSubmit', function(e)
{
    var \$form = $(this);
	
	$.post(
        \$form.attr("action"), 
        \$form.serialize()
    )
    .done(function(result) {
        /*if(result == 1)
        {*/
            jsonresult = result;
			$(document).find('#modal').modal('hide');
            //$(\$form).trigger("reset");
			//$.pjax.reload({container:'#PessoaGrid'});
        /*} else {
            $("#message").html(result);
        }*/
    })
    .fail(function()
    {
        console.log("server error");
    });
    return false;
});
JS;
$this->registerJs($script);


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
            'cpf_cnpj' => [ $form->field($model, 'cpf_cnpj')->widget(\yii\widgets\MaskedInput::className(), ['mask' => ['999.999.999-99','99.999.999/9999-99']]),], 
						'nome' => ['type' => Form::INPUT_TEXT, 'columnOptions'=>['colspan'=>2], ],
/*            'data_nascimento' => ['type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\DatePicker', 
                'options' => [
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'language' => 'pt-BR',
                    'pluginOptions' => [
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                        'todayHighlight' => true 
										]
                ]
            ]*/
        ]
    ]);
/*
echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'nome'              => ['type' => Form::INPUT_TEXT, ],
            //'nome_fantasia'     => ['type' => Form::INPUT_TEXT, ],
        ]
    ]);*/

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
        /*'id_prefixo_endereco' => [
            'type' => Form::INPUT_DROPDOWN_LIST,
            'items' => ArrayHelper::map(PrefixoEndereco::find()->all(), 'id_prefixo_endereco', 'descricao')
        ],*/
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
        'id_pais' => [ 'type'=>Form::INPUT_WIDGET, 
    				'widgetClass'=>'kartik\select2\Select2',
    				'options' => [
        				//'data' => ArrayHelper::map(Pais::find()->orderBy('nome')->asArray()->all(), 'id_pais', 'nome'),
						'data' => [36 => 'Brasil'],
						'initValueText' => 'Brasil',
						'options' => [
							'placeholder' => Yii::t('app','Selecione'),
						],
        				'pluginOptions' => [
            				'allowClear' => true
        				],
    				],
        ],
        'id_estado' => [ 'type'=>Form::INPUT_WIDGET, 
    				'widgetClass'=>'kartik\widgets\DepDrop',
    				'options' => [
    					'type'=>DepDrop::TYPE_SELECT2,
        				'options' => ['placeholder' => Yii::t('app','Selecione')],
        				'pluginOptions' => [
            				'loading' => 'Carregando...',
            				'depends' => ['pessoa-id_pais'],
            				'allowClear' => true,
            				'url' => Url::to(['/pessoa/lista-estados']),
							'initValueText' => 'Rio de Janeiro',
        				],
    				],
				],
        'id_cidade' => ['type'=>Form::INPUT_WIDGET, 
    				'widgetClass'=>'kartik\widgets\DepDrop',
    				'options' => [
    					'type'=>DepDrop::TYPE_SELECT2,
        				'options' => ['placeholder' => Yii::t('app','Selecione')],
        				'pluginOptions' => [
            				'loading' => 'Carregando...',
            				'depends' => ['pessoa-id_estado'],
            				'allowClear' => true,
            				'url' => Url::to(['/pessoa/lista-cidades']),
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
        'emissao_identidade' => ['type'=>Form::INPUT_WIDGET, 
						'widgetClass'=>'\kartik\widgets\DatePicker', 
            'options' => [
            		'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'language' => 'pt-BR',
                'pluginOptions' => [
                		'format' => 'dd/mm/yyyy',
                    'autoclose' => true,
                    'todayHighlight' => true 
								]
            ]
        ],
    ]
]);
/*
echo Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,
    'attributes' => [
        'id_pessoa_pai' => [ 'type'=>Form::INPUT_WIDGET, 
    				'widgetClass'=>'kartik\select2\Select2',
    				'options' => [
        				'initValueText' => '',
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
        				'addon' => [
        						//'prepend' => [
            				//		'content' => Html::icon('globe')
        						//],
        						'append' => [
            						'content' => Html::button(Html::icon('plus-sign'), [
                						'class' => 'btn btn-primary', 
                						'title' => 'Mark on map', 
                						'data-toggle' => 'tooltip',
										'value' => Url::to('index.php?r=pessoa/create'),
										'id'=>'modalButton',
                						//'onclick' => 'alert("aviso");'
            						]),
            						'asButton' => true
        						]
    						]
    				],     
        ],
        'id_pessoa_mae' => ['type'=>Form::INPUT_WIDGET, 
    				'widgetClass'=>'kartik\select2\Select2',
    				'options' => [
        				'initValueText' => '',
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
            				//'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        						//'templateResult' => new JsExpression('function(city) { return city.text; }'),
        						//'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        						'language' => [
												'inputTooShort' => new JsExpression('function() { return "Digite ao menos 3 caracteres"; }'),
										]
        				],
    				],
        ],
        'id_pessoa_responsavel' => [
            'type' => Form::INPUT_TEXT,
        ],
    ]
]);
*/
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

