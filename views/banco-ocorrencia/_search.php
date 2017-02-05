<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancoOcorrenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banco-ocorrencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_banco') ?>

    <?= $form->field($model, 'tipo_ocorrencia') ?>

    <?= $form->field($model, 'cod_ocorrencia') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'confirma_baixa')->checkbox() ?>

    <?php // echo $form->field($model, 'confirma_registro')->checkbox() ?>

    <?php // echo $form->field($model, 'confirma_cancelamento')->checkbox() ?>

    <?php // echo $form->field($model, 'confirma_rejeicao')->checkbox() ?>

    <?php // echo $form->field($model, 'verifica_ocorrencia_2')->checkbox() ?>

    <?php // echo $form->field($model, 'verifica_ocorrencia_3')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
