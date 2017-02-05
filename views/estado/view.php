<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estado */

$this->title = $model->id_pais;
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado], [
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
            'id_pais',
            'id_estado',
            'nome',
            'sigla',
        ],
    ]) ?>

</div>
