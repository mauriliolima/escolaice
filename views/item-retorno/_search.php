<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemRetornoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-retorno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_retorno') ?>

    <?= $form->field($model, 'id_item_retorno') ?>

    <?= $form->field($model, 'nosso_numero') ?>

    <?= $form->field($model, 'numero_documento') ?>

    <?= $form->field($model, 'data_pagamento') ?>

    <?php // echo $form->field($model, 'data_baixa') ?>

    <?php // echo $form->field($model, 'id_banco_cobrador') ?>

    <?php // echo $form->field($model, 'agencia_cobradora') ?>

    <?php // echo $form->field($model, 'valor_despesas_cobranca') ?>

    <?php // echo $form->field($model, 'valor_documento') ?>

    <?php // echo $form->field($model, 'valor_pago') ?>

    <?php // echo $form->field($model, 'valor_abatimento') ?>

    <?php // echo $form->field($model, 'valor_juros') ?>

    <?php // echo $form->field($model, 'valor_multa') ?>

    <?php // echo $form->field($model, 'valor_desconto') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_1') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_2') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_3') ?>

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
