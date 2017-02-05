<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Retorno */

$this->title = 'Update Retorno: ' . ' ' . $model->id_retorno;
$this->params['breadcrumbs'][] = ['label' => 'Retornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_retorno, 'url' => ['view', 'id' => $model->id_retorno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="retorno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
