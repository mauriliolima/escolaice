<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_curso')->textInput() ?>

    <?= $form->field($model, 'id_periodo_letivo')->textInput() ?>

    <?= $form->field($model, 'id_disciplina')->textInput() ?>

    <?= $form->field($model, 'id_nivel')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_fim')->textInput() ?>

    <?= $form->field($model, 'data_inclusao')->textInput() ?>

    <?= $form->field($model, 'usuario_inclusao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_alteracao')->textInput() ?>

    <?= $form->field($model, 'usuario_alteracao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_modelo_avaliacao')->textInput() ?>

    <?= $form->field($model, 'id_curriculo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
