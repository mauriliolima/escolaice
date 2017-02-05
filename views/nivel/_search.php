<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NivelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nivel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_curso') ?>

    <?= $form->field($model, 'id_nivel') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'ordem') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
