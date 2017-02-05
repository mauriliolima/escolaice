<?php
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <!-- ?= $form->field($model, 'imageFile')->fileInput() ? -->


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

<?php ActiveForm::end() ?>