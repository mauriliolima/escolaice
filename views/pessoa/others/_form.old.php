<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Standard;
use yii\helpers\ArrayHelper;
use app\models\PrefixoEndereco;
use dosamigos\datepicker\DatePicker;
use yii\widgets\MaskedInput;
use kartik\builder\Form;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */

$tipoPessoa = ['F' => 'Fisica', 'J' => 'Juridica'];
?>

<div class="pessoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_pessoa')->dropDownList($tipoPessoa); ?>

    <?= $form->field($model, 'cpf_cnpj')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => ['999.999.999-99', '99.999.999/9999-99'],
]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome_fantasia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_nascimento')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                     'inline' => false, 
					 'language' => 'pt-BR',
                     // modify template for custom rendering
                    //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy'
                    ]
            ]);?>

	<?= $form->field($model, 'id_prefixo_endereco')->dropDownList(
		ArrayHelper::map(PrefixoEndereco::find()->all(), 'id_prefixo_endereco', 'descricao')
	) ?>
	
    <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cidade')->textInput() ?>

    <?= $form->field($model, 'id_estado')->textInput() ?>

    <?= $form->field($model, 'id_pais')->textInput() ?>

    <?= $form->field($model, 'cep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_identidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orgao_identidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emissao_identidade')->textInput() ?>

    <?= $form->field($model, 'data_inclusao')->textInput() ?>

    <?= $form->field($model, 'usuario_inclusao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?>

    <?= $form->field($model, 'usuario_alteracao')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'id_pessoa_pai')->textInput() ?>

    <?= $form->field($model, 'id_pessoa_mae')->textInput() ?>

    <?= $form->field($model, 'id_pessoa_responsavel')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
