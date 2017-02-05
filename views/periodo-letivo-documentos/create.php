<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PeriodoLetivoDocumentos */

$this->title = 'Create Periodo Letivo Documentos';
$this->params['breadcrumbs'][] = ['label' => 'Periodo Letivo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-letivo-documentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
