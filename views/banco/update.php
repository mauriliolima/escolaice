<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Banco */

$this->title = 'Update Banco: ' . ' ' . $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_banco, 'url' => ['view', 'id' => $model->id_banco]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
