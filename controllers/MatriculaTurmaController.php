<?php

namespace app\controllers;

use Yii;
use app\models\MatriculaTurma;
use app\models\MatriculaTurmaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatriculaTurmaController implements the CRUD actions for MatriculaTurma model.
 */
class MatriculaTurmaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MatriculaTurma models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatriculaTurmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MatriculaTurma model.
     * @param string $matricula
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return mixed
     */
    public function actionView($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        return $this->render('view', [
            'model' => $this->findModel($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel),
        ]);
    }

    /**
     * Creates a new MatriculaTurma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MatriculaTurma();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'matricula' => $model->matricula, 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MatriculaTurma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $matricula
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return mixed
     */
    public function actionUpdate($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        $model = $this->findModel($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'matricula' => $model->matricula, 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MatriculaTurma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $matricula
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return mixed
     */
    public function actionDelete($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        $this->findModel($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MatriculaTurma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $matricula
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return MatriculaTurma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($matricula, $id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        if (($model = MatriculaTurma::findOne(['matricula' => $matricula, 'id_turma' => $id_turma, 'id_curso' => $id_curso, 'id_periodo_letivo' => $id_periodo_letivo, 'id_disciplina' => $id_disciplina, 'id_nivel' => $id_nivel])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
