<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nivel */

$this->title = 'Update Nivel: ' . ' ' . $model->id_nivel;
$this->params['breadcrumbs'][] = ['label' => 'Nivels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nivel, 'url' => ['view', 'id' => $model->id_nivel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nivel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
