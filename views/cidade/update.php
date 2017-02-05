<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cidade */

$this->title = 'Update Cidade: ' . ' ' . $model->id_pais;
$this->params['breadcrumbs'][] = ['label' => 'Cidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pais, 'url' => ['view', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado, 'id_cidade' => $model->id_cidade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cidade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
