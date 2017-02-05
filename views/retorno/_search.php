<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RetornoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="retorno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_retorno') ?>

    <?= $form->field($model, 'nome_arquivo') ?>

    <?= $form->field($model, 'id_conta_corrente') ?>

    <?= $form->field($model, 'numero_linhas') ?>

    <?= $form->field($model, 'data_retorno') ?>

    <?php // echo $form->field($model, 'total_registrado') ?>

    <?php // echo $form->field($model, 'total_baixado') ?>

    <?php // echo $form->field($model, 'total_rejeitado') ?>

    <?php // echo $form->field($model, 'id_agencia') ?>

    <?php // echo $form->field($model, 'id_banco') ?>

    <?php // echo $form->field($model, 'inserido_por') ?>

    <?php // echo $form->field($model, 'inserido_em') ?>

    <?php // echo $form->field($model, 'alterado_por') ?>

    <?php // echo $form->field($model, 'alterado_em') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
