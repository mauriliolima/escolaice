<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancoLayoutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banco-layout-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_banco') ?>

    <?= $form->field($model, 'header_cod_banco_ini') ?>

    <?= $form->field($model, 'header_data_baixa_ini') ?>

    <?= $form->field($model, 'header_data_baixa_cmp') ?>

    <?= $form->field($model, 'header_data_baixa_formato') ?>

    <?php // echo $form->field($model, 'header_data_compensacao_ini') ?>

    <?php // echo $form->field($model, 'header_data_compensacao_cmp') ?>

    <?php // echo $form->field($model, 'header_data_compensacao_formato') ?>

    <?php // echo $form->field($model, 'nosso_numero_ini') ?>

    <?php // echo $form->field($model, 'nosso_numero_cmp') ?>

    <?php // echo $form->field($model, 'numero_documento_ini') ?>

    <?php // echo $form->field($model, 'numero_documento_cmp') ?>

    <?php // echo $form->field($model, 'data_pagamento_ini') ?>

    <?php // echo $form->field($model, 'data_pagamento_cmp') ?>

    <?php // echo $form->field($model, 'data_pagamento_formato') ?>

    <?php // echo $form->field($model, 'data_baixa_ini') ?>

    <?php // echo $form->field($model, 'data_baixa_cmp') ?>

    <?php // echo $form->field($model, 'data_baixa_formato') ?>

    <?php // echo $form->field($model, 'id_banco_cobrador_ini') ?>

    <?php // echo $form->field($model, 'id_banco_cobrador_cmp') ?>

    <?php // echo $form->field($model, 'agencia_cobradora_ini') ?>

    <?php // echo $form->field($model, 'agencia_cobradora_cmp') ?>

    <?php // echo $form->field($model, 'valor_despesas_cobranca_ini') ?>

    <?php // echo $form->field($model, 'valor_despesas_cobranca_cmp') ?>

    <?php // echo $form->field($model, 'valor_documento_ini') ?>

    <?php // echo $form->field($model, 'valor_documento_cmp') ?>

    <?php // echo $form->field($model, 'valor_pago_ini') ?>

    <?php // echo $form->field($model, 'valor_pago_cmp') ?>

    <?php // echo $form->field($model, 'valor_abatimento_ini') ?>

    <?php // echo $form->field($model, 'valor_abatimento_cmp') ?>

    <?php // echo $form->field($model, 'valor_juros_ini') ?>

    <?php // echo $form->field($model, 'valor_juros_cmp') ?>

    <?php // echo $form->field($model, 'valor_multa_ini') ?>

    <?php // echo $form->field($model, 'valor_multa_cmp') ?>

    <?php // echo $form->field($model, 'valor_desconto_ini') ?>

    <?php // echo $form->field($model, 'valor_desconto_cmp') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_1_ini') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_1_cmp') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_2_ini') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_2_cmp') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_3_ini') ?>

    <?php // echo $form->field($model, 'codigo_ocorrencia_3_cmp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
