<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Retorno */

$this->title = $model->id_retorno;
$this->params['breadcrumbs'][] = ['label' => 'Retornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retorno-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_retorno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_retorno], [
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
            'id_retorno',
            'nome_arquivo',
            'id_conta_corrente',
            'numero_linhas',
            'data_retorno',
            'total_registrado',
            'total_baixado',
            'total_rejeitado',
            'id_agencia',
            'id_banco',
            'inserido_por',
            'inserido_em',
            'alterado_por',
            'alterado_em',
        ],
    ]) ?>

</div>
