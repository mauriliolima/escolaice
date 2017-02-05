<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */

$this->title = $model->id_pessoa;
$this->params['breadcrumbs'][] = ['label' => 'Pessoas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pessoa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pessoa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pessoa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pessoa',
            'tipo_pessoa',
            'cpf_cnpj',
            'nome',
            'nome_fantasia',
            'logradouro',
            'numero',
            'complemento',
            'bairro',
            'id_cidade',
            'id_estado',
            'id_pais',
            'cep',
            'numero_identidade',
            'orgao_identidade',
            'emissao_identidade',
            'data_inclusao',
            'usuario_inclusao',
            'data_alteracao',
            'usuario_alteracao',
            'id_pessoa_pai',
            'id_pessoa_mae',
        ],
    ]) ?>

</div>
