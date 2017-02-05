<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemRetorno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-retorno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_retorno')->textInput() ?>

    <?= $form->field($model, 'nosso_numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_pagamento')->textInput() ?>

    <?= $form->field($model, 'data_baixa')->textInput() ?>

    <?= $form->field($model, 'id_banco_cobrador')->textInput() ?>

    <?= $form->field($model, 'agencia_cobradora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_despesas_cobranca')->textInput() ?>

    <?= $form->field($model, 'valor_documento')->textInput() ?>

    <?= $form->field($model, 'valor_pago')->textInput() ?>

    <?= $form->field($model, 'valor_abatimento')->textInput() ?>

    <?= $form->field($model, 'valor_juros')->textInput() ?>

    <?= $form->field($model, 'valor_multa')->textInput() ?>

    <?= $form->field($model, 'valor_desconto')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_ocorrencia_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_ocorrencia_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inserido_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inserido_em')->textInput() ?>

    <?= $form->field($model, 'alterado_por')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alterado_em')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
