<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemRetorno */

$this->title = 'Create Item Retorno';
$this->params['breadcrumbs'][] = ['label' => 'Item Retornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-retorno-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
