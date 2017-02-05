<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancoOcorrencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banco-ocorrencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_banco')->textInput() ?>

    <?= $form->field($model, 'tipo_ocorrencia')->textInput() ?>

    <?= $form->field($model, 'cod_ocorrencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirma_baixa')->checkbox() ?>

    <?= $form->field($model, 'confirma_registro')->checkbox() ?>

    <?= $form->field($model, 'confirma_cancelamento')->checkbox() ?>

    <?= $form->field($model, 'confirma_rejeicao')->checkbox() ?>

    <?= $form->field($model, 'verifica_ocorrencia_2')->checkbox() ?>

    <?= $form->field($model, 'verifica_ocorrencia_3')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
