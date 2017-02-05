<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriodoLetivoDocumentosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periodo Letivo Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-letivo-documentos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Periodo Letivo Documentos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_periodo_letivo',
            'id_documento',
            'obrigatorio',
            'quantidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
