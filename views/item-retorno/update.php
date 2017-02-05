<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemRetorno */

$this->title = 'Update Item Retorno: ' . ' ' . $model->id_retorno;
$this->params['breadcrumbs'][] = ['label' => 'Item Retornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_retorno, 'url' => ['view', 'id_retorno' => $model->id_retorno, 'id_item_retorno' => $model->id_item_retorno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-retorno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
