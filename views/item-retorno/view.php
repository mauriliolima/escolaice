<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemRetorno */

$this->title = $model->id_retorno;
$this->params['breadcrumbs'][] = ['label' => 'Item Retornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-retorno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_retorno' => $model->id_retorno, 'id_item_retorno' => $model->id_item_retorno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_retorno' => $model->id_retorno, 'id_item_retorno' => $model->id_item_retorno], [
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
            'id_retorno',
            'id_item_retorno',
            'nosso_numero',
            'numero_documento',
            'data_pagamento',
            'data_baixa',
            'id_banco_cobrador',
            'agencia_cobradora',
            'valor_despesas_cobranca',
            'valor_documento',
            'valor_pago',
            'valor_abatimento',
            'valor_juros',
            'valor_multa',
            'valor_desconto',
            'codigo_ocorrencia_1',
            'codigo_ocorrencia_2',
            'codigo_ocorrencia_3',
            'inserido_por',
            'inserido_em',
            'alterado_por',
            'alterado_em',
        ],
    ]) ?>

</div>
