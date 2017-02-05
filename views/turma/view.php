<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = $model->id_turma;
$this->params['breadcrumbs'][] = ['label' => 'Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel], [
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
            'id_turma',
            'id_curso',
            'id_periodo_letivo',
            'id_disciplina',
            'id_nivel',
            'nome',
            'data_inicio',
            'data_fim',
            'data_inclusao',
            'usuario_inclusao',
            'data_alteracao',
            'usuario_alteracao',
            'id_modelo_avaliacao',
            'id_curriculo',
        ],
    ]) ?>

</div>
