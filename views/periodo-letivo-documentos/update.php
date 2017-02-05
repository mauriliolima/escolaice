<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodoLetivoDocumentos */

$this->title = 'Update Periodo Letivo Documentos: ' . ' ' . $model->id_periodo_letivo;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Letivo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_periodo_letivo, 'url' => ['view', 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_documento' => $model->id_documento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodo-letivo-documentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
