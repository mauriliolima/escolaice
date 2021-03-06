<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodoLetivo */

$this->title = 'Update Periodo Letivo: ' . ' ' . $model->id_periodo_letivo;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Letivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_periodo_letivo, 'url' => ['view', 'id' => $model->id_periodo_letivo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodo-letivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
