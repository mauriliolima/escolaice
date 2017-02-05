<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriodoLetivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periodo Letivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-letivo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Periodo Letivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_periodo_letivo',
            'descricao',
            'data_inicio',
            'data_fim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
