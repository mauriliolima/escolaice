<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MatriculaTurma */

$this->title = 'Create Matricula Turma';
$this->params['breadcrumbs'][] = ['label' => 'Matricula Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-turma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
