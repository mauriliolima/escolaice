<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancoLayout */
/* @var $form yii\widgets\ActiveForm */

$formato_data = array("dmy" => "DDMMAA", "dmY" => "DDMMAAAA", "mdy" => "MMDDAA", "mdY" => "MMDDAAAA", "ymd" => "AAMMDD", "Ymd" => "AAAAMMDD");

?>

<div class="banco-layout-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_banco')->textInput() ?>

    <?= $form->field($model, 'header_cod_banco_ini')->textInput() ?>
    
    <?= $form->field($model, 'header_cod_banco_cmp')->textInput() ?>

    <?= $form->field($model, 'header_data_baixa_ini')->textInput() ?>

    <?= $form->field($model, 'header_data_baixa_cmp')->textInput() ?>

    <?= $form->field($model, 'header_data_baixa_formato')->dropDownList($formato_data) ?>

    <?= $form->field($model, 'header_data_compensacao_ini')->textInput() ?>

    <?= $form->field($model, 'header_data_compensacao_cmp')->textInput() ?>

    <?= $form->field($model, 'header_data_compensacao_formato')->dropDownList($formato_data) ?>

    <?= $form->field($model, 'nosso_numero_ini')->textInput() ?>

    <?= $form->field($model, 'nosso_numero_cmp')->textInput() ?>

    <?= $form->field($model, 'numero_documento_ini')->textInput() ?>

    <?= $form->field($model, 'numero_documento_cmp')->textInput() ?>

    <?= $form->field($model, 'data_pagamento_ini')->textInput() ?>

    <?= $form->field($model, 'data_pagamento_cmp')->textInput() ?>

    <?= $form->field($model, 'data_pagamento_formato')->dropDownList($formato_data) ?>

    <?= $form->field($model, 'data_baixa_ini')->textInput() ?>

    <?= $form->field($model, 'data_baixa_cmp')->textInput() ?>

    <?= $form->field($model, 'data_baixa_formato')->dropDownList($formato_data)  ?>

    <?= $form->field($model, 'id_banco_cobrador_ini')->textInput() ?>

    <?= $form->field($model, 'id_banco_cobrador_cmp')->textInput() ?>

    <?= $form->field($model, 'agencia_cobradora_ini')->textInput() ?>

    <?= $form->field($model, 'agencia_cobradora_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_despesas_cobranca_ini')->textInput() ?>

    <?= $form->field($model, 'valor_despesas_cobranca_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_documento_ini')->textInput() ?>

    <?= $form->field($model, 'valor_documento_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_pago_ini')->textInput() ?>

    <?= $form->field($model, 'valor_pago_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_abatimento_ini')->textInput() ?>

    <?= $form->field($model, 'valor_abatimento_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_juros_ini')->textInput() ?>

    <?= $form->field($model, 'valor_juros_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_multa_ini')->textInput() ?>

    <?= $form->field($model, 'valor_multa_cmp')->textInput() ?>

    <?= $form->field($model, 'valor_desconto_ini')->textInput() ?>

    <?= $form->field($model, 'valor_desconto_cmp')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_1_ini')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_1_cmp')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_2_ini')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_2_cmp')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_3_ini')->textInput() ?>

    <?= $form->field($model, 'codigo_ocorrencia_3_cmp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
