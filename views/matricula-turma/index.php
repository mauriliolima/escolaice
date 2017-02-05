<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatriculaTurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matricula Turmas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-turma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Matricula Turma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'matricula',
            'id_turma',
            'id_curso',
            'id_periodo_letivo',
            'id_disciplina',
            // 'id_nivel',
            // 'nota',
            // 'faltas',
            // 'id_situacao',
            // 'id_curriculo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
