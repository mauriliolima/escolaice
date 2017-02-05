<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatriculaTurma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_turma')->textInput() ?>

    <?= $form->field($model, 'id_curso')->textInput() ?>

    <?= $form->field($model, 'id_periodo_letivo')->textInput() ?>

    <?= $form->field($model, 'id_disciplina')->textInput() ?>

    <?= $form->field($model, 'id_nivel')->textInput() ?>

    <?= $form->field($model, 'nota')->textInput() ?>

    <?= $form->field($model, 'faltas')->textInput() ?>

    <?= $form->field($model, 'id_situacao')->textInput() ?>

    <?= $form->field($model, 'id_curriculo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
