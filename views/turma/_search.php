<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TurmaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_turma') ?>

    <?= $form->field($model, 'id_curso') ?>

    <?= $form->field($model, 'id_periodo_letivo') ?>

    <?= $form->field($model, 'id_disciplina') ?>

    <?= $form->field($model, 'id_nivel') ?>

    <?php // echo $form->field($model, 'nome') ?>

    <?php // echo $form->field($model, 'data_inicio') ?>

    <?php // echo $form->field($model, 'data_fim') ?>

    <?php // echo $form->field($model, 'data_inclusao') ?>

    <?php // echo $form->field($model, 'usuario_inclusao') ?>

    <?php // echo $form->field($model, 'data_alteracao') ?>

    <?php // echo $form->field($model, 'usuario_alteracao') ?>

    <?php // echo $form->field($model, 'id_modelo_avaliacao') ?>

    <?php // echo $form->field($model, 'id_curriculo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
