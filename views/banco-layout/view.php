<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BancoLayout */

$this->title = $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Banco Layouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-layout-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_banco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_banco], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_banco',
            'header_cod_banco_ini',
            'header_data_baixa_ini',
            'header_data_baixa_cmp',
            'header_data_baixa_formato',
            'header_data_compensacao_ini',
            'header_data_compensacao_cmp',
            'header_data_compensacao_formato',
            'nosso_numero_ini',
            'nosso_numero_cmp',
            'numero_documento_ini',
            'numero_documento_cmp',
            'data_pagamento_ini',
            'data_pagamento_cmp',
            'data_pagamento_formato',
            'data_baixa_ini',
            'data_baixa_cmp',
            'data_baixa_formato',
            'id_banco_cobrador_ini',
            'id_banco_cobrador_cmp',
            'agencia_cobradora_ini',
            'agencia_cobradora_cmp',
            'valor_despesas_cobranca_ini',
            'valor_despesas_cobranca_cmp',
            'valor_documento_ini',
            'valor_documento_cmp',
            'valor_pago_ini',
            'valor_pago_cmp',
            'valor_abatimento_ini:datetime',
            'valor_abatimento_cmp:datetime',
            'valor_juros_ini',
            'valor_juros_cmp',
            'valor_multa_ini',
            'valor_multa_cmp',
            'valor_desconto_ini',
            'valor_desconto_cmp',
            'codigo_ocorrencia_1_ini',
            'codigo_ocorrencia_1_cmp',
            'codigo_ocorrencia_2_ini',
            'codigo_ocorrencia_2_cmp',
            'codigo_ocorrencia_3_ini',
            'codigo_ocorrencia_3_cmp',
        ],
    ]) ?>

</div>
