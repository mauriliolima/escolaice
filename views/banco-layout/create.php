<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BancoLayout */

$this->title = 'Create Banco Layout';
$this->params['breadcrumbs'][] = ['label' => 'Banco Layouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-layout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
