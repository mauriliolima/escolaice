<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BancoOcorrencia */

$this->title = 'Create Banco Ocorrencia';
$this->params['breadcrumbs'][] = ['label' => 'Banco Ocorrencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-ocorrencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
