<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = 'Update Turma: ' . ' ' . $model->id_turma;
$this->params['breadcrumbs'][] = ['label' => 'Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_turma, 'url' => ['view', 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="turma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
