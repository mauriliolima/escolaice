<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BancoOcorrenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banco Ocorrencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-ocorrencia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banco Ocorrencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_banco',
            'tipo_ocorrencia',
            'cod_ocorrencia',
            'descricao',
            'confirma_baixa:boolean',
            // 'confirma_registro:boolean',
            // 'confirma_cancelamento:boolean',
            // 'confirma_rejeicao:boolean',
            // 'verifica_ocorrencia_2:boolean',
            // 'verifica_ocorrencia_3:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
