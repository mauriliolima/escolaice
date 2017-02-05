<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BancoOcorrencia */

$this->title = $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Banco Ocorrencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-ocorrencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_banco' => $model->id_banco, 'tipo_ocorrencia' => $model->tipo_ocorrencia, 'cod_ocorrencia' => $model->cod_ocorrencia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_banco' => $model->id_banco, 'tipo_ocorrencia' => $model->tipo_ocorrencia, 'cod_ocorrencia' => $model->cod_ocorrencia], [
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
            'id_banco',
            'tipo_ocorrencia',
            'cod_ocorrencia',
            'descricao',
            'confirma_baixa:boolean',
            'confirma_registro:boolean',
            'confirma_cancelamento:boolean',
            'confirma_rejeicao:boolean',
            'verifica_ocorrencia_2:boolean',
            'verifica_ocorrencia_3:boolean',
        ],
    ]) ?>

</div>
