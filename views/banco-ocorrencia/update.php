<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BancoOcorrencia */

$this->title = 'Update Banco Ocorrencia: ' . ' ' . $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Banco Ocorrencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_banco, 'url' => ['view', 'id_banco' => $model->id_banco, 'tipo_ocorrencia' => $model->tipo_ocorrencia, 'cod_ocorrencia' => $model->cod_ocorrencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banco-ocorrencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
