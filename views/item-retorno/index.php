<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemRetornoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Retornos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-retorno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item Retorno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_retorno',
            'id_item_retorno',
            'nosso_numero',
            'numero_documento',
            'data_pagamento',
            // 'data_baixa',
            // 'id_banco_cobrador',
            // 'agencia_cobradora',
            // 'valor_despesas_cobranca',
            // 'valor_documento',
            // 'valor_pago',
            // 'valor_abatimento',
            // 'valor_juros',
            // 'valor_multa',
            // 'valor_desconto',
            // 'codigo_ocorrencia_1',
            // 'codigo_ocorrencia_2',
            // 'codigo_ocorrencia_3',
            // 'inserido_por',
            // 'inserido_em',
            // 'alterado_por',
            // 'alterado_em',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
