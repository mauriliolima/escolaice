<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_banco') ?>

    <?= $form->field($model, 'numero_febraban') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'inserido_por') ?>

    <?= $form->field($model, 'inserido_em') ?>

    <?php // echo $form->field($model, 'alterado_por') ?>

    <?php // echo $form->field($model, 'alterado_em') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
