<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MatriculaTurma */

$this->title = $model->matricula;
$this->params['breadcrumbs'][] = ['label' => 'Matricula Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-turma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'matricula' => $model->matricula, 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'matricula' => $model->matricula, 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel], [
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
            'matricula',
            'id_turma',
            'id_curso',
            'id_periodo_letivo',
            'id_disciplina',
            'id_nivel',
            'nota',
            'faltas',
            'id_situacao',
            'id_curriculo',
        ],
    ]) ?>

</div>
