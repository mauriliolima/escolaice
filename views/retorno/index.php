<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RetornoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Retornos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retorno-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Retorno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_retorno',
            'nome_arquivo',
            'id_conta_corrente',
            'numero_linhas',
            'data_retorno',
            // 'total_registrado',
            // 'total_baixado',
            // 'total_rejeitado',
            // 'id_agencia',
            // 'id_banco',
            // 'inserido_por',
            // 'inserido_em',
            // 'alterado_por',
            // 'alterado_em',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
