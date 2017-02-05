<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PrefixoEndereco */

$this->title = $model->id_prefixo_endereco;
$this->params['breadcrumbs'][] = ['label' => 'Prefixo Enderecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prefixo-endereco-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_prefixo_endereco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_prefixo_endereco], [
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
            'id_prefixo_endereco',
            'descricao',
        ],
    ]) ?>

</div>
