<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
//use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */

DatePicker::widget([
    'model' => $model,
    'attribute' => 'data_inicio',
    'language' => 'pt-br',
    'dateFormat' => 'dd-MM-yyyy',
]);


?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <?= $form->field($model, 'nome_reduzido')->textInput() ?>

    <?= $form->field($model, 'data_inicio')->widget(DatePicker::className(), []);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
