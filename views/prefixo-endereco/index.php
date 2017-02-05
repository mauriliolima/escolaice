<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widget\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrefixoEnderecoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prefixo Enderecos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prefixo-endereco-index">

    <?php Pjax::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prefixo Endereco', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prefixo_endereco',
            'descricao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
