<?php

namespace app\controllers;

use Yii;
use app\models\Estado;
use app\models\EstadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadoController implements the CRUD actions for Estado model.
 */
class EstadoController extends Controller
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
     * Lists all Estado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estado model.
     * @param integer $id_pais
     * @param integer $id_estado
     * @return mixed
     */
    public function actionView($id_pais, $id_estado)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pais, $id_estado),
        ]);
    }

    /**
     * Creates a new Estado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Estado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_pais
     * @param integer $id_estado
     * @return mixed
     */
    public function actionUpdate($id_pais, $id_estado)
    {
        $model = $this->findModel($id_pais, $id_estado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Estado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pais
     * @param integer $id_estado
     * @return mixed
     */
    public function actionDelete($id_pais, $id_estado)
    {
        $this->findModel($id_pais, $id_estado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_pais
     * @param integer $id_estado
     * @return Estado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pais, $id_estado)
    {
        if (($model = Estado::findOne(['id_pais' => $id_pais, 'id_estado' => $id_estado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
