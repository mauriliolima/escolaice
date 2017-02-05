<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Retorno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="retorno-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?php     
    echo FileInput::widget([
    'model' => $model,
    'attribute' => 'imageFile',
    'pluginOptions' => [
        'browseLabel' => 'Procurar',
        'removeLabel' => 'Remover',
        'uploadLabel' => 'Enviar'
    ],
    'options' => ['multiple' => false]
]);

?>

    <?php ActiveForm::end(); ?>

</div>
