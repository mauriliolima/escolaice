<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PessoaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pessoa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pessoa') ?>

    <?= $form->field($model, 'tipo_pessoa') ?>

    <?= $form->field($model, 'cpf_cnpj') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'nome_fantasia') ?>

    <?php // echo $form->field($model, 'logradouro') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'complemento') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'id_cidade') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <?php // echo $form->field($model, 'id_pais') ?>

    <?php // echo $form->field($model, 'cep') ?>

    <?php // echo $form->field($model, 'numero_identidade') ?>

    <?php // echo $form->field($model, 'orgao_identidade') ?>

    <?php // echo $form->field($model, 'emissao_identidade') ?>

    <?php // echo $form->field($model, 'data_inclusao') ?>

    <?php // echo $form->field($model, 'usuario_inclusao') ?>

    <?php // echo $form->field($model, 'data_alteracao') ?>

    <?php // echo $form->field($model, 'usuario_alteracao') ?>

    <?php // echo $form->field($model, 'id_pessoa_pai') ?>

    <?php // echo $form->field($model, 'id_pessoa_mae') ?>

    <?php // echo $form->field($model, 'id_pessoa_responsavel') ?>

    <?php // echo $form->field($model, 'id_prefixo_endereco') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
