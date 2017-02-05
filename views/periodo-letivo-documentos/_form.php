<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PeriodoLetivo;
use app\models\Documento;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodoLetivoDocumentos */
/* @var $form yii\widgets\ActiveForm */

if ($model->isNewRecord) {
  $model->quantidade = 1;
}

?>

<div class="periodo-letivo-documentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <? 
  $itens = ArrayHelper::map(PeriodoLetivo::find()->All(), 'id_periodo_letivo', 'descricao');
  echo $form->field($model, 'id_periodo_letivo')->dropDownList($itens); //textInput() 
  ?>

    <?
  $itens = ArrayHelper::map(Documento::find()->All(), 'id_documento', 'nome');
  echo $form->field($model, 'id_documento')->dropDownList($itens); //textInput() ?>

    <?= $form->field($model, 'obrigatorio')->dropDownList(['S'=>'Sim', 'N'=>'Não']) //textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
