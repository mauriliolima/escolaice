<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PeriodoLetivo */

$this->title = 'Create Periodo Letivo';
$this->params['breadcrumbs'][] = ['label' => 'Periodo Letivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-letivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
