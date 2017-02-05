<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pessoa')->textInput() ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'data_inclusao')->textInput() ?>

    <?= $form->field($model, 'usuario_inclusao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?>

    <?= $form->field($model, 'usuario_alteracao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pessoa_responsavel')->textInput() ?>

    <?= $form->field($model, 'id_pessoa_responsavel_financeiro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
