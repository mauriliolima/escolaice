<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Documento */

$this->title = 'Update Documento: ' . ' ' . $model->id_documento;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_documento, 'url' => ['view', 'id' => $model->id_documento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
