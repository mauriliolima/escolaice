<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cidade */

$this->title = $model->id_pais;
$this->params['breadcrumbs'][] = ['label' => 'Cidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado, 'id_cidade' => $model->id_cidade], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado, 'id_cidade' => $model->id_cidade], [
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
            'id_cidade',
            'codigo_ibge',
            'nome',
        ],
    ]) ?>

</div>
