<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrefixoEndereco */

$this->title = 'Update Prefixo Endereco: ' . ' ' . $model->id_prefixo_endereco;
$this->params['breadcrumbs'][] = ['label' => 'Prefixo Enderecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prefixo_endereco, 'url' => ['view', 'id' => $model->id_prefixo_endereco]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prefixo-endereco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
