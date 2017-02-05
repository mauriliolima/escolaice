<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodoLetivoDocumentos */

$this->title = $model->id_periodo_letivo;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Letivo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-letivo-documentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_documento' => $model->id_documento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_documento' => $model->id_documento], [
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
            'id_periodo_letivo',
            'id_documento',
            'obrigatorio',
            'quantidade',
        ],
    ]) ?>

</div>
