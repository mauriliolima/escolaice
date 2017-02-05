<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BancoLayout */

$this->title = 'Update Banco Layout: ' . ' ' . $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Banco Layouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_banco, 'url' => ['view', 'id' => $model->id_banco]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banco-layout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
