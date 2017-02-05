<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatriculaTurmaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-turma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'matricula') ?>

    <?= $form->field($model, 'id_turma') ?>

    <?= $form->field($model, 'id_curso') ?>

    <?= $form->field($model, 'id_periodo_letivo') ?>

    <?= $form->field($model, 'id_disciplina') ?>

    <?php // echo $form->field($model, 'id_nivel') ?>

    <?php // echo $form->field($model, 'nota') ?>

    <?php // echo $form->field($model, 'faltas') ?>

    <?php // echo $form->field($model, 'id_situacao') ?>

    <?php // echo $form->field($model, 'id_curriculo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
