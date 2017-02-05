<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlunoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'matricula') ?>

    <?= $form->field($model, 'id_pessoa') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'data_inclusao') ?>

    <?= $form->field($model, 'usuario_inclusao') ?>

    <?php // echo $form->field($model, 'data_alteracao') ?>

    <?php // echo $form->field($model, 'usuario_alteracao') ?>

    <?php // echo $form->field($model, 'id_pessoa_responsavel') ?>

    <?php // echo $form->field($model, 'id_pessoa_responsavel_financeiro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
