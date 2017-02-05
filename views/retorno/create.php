<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Retorno */

$this->title = 'Create Retorno';
$this->params['breadcrumbs'][] = ['label' => 'Retornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retorno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
