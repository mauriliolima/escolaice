<?php

namespace app\controllers;

use Yii;
use app\models\PeriodoLetivoDocumentos;
use app\models\PeriodoLetivoDocumentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeriodoLetivoDocumentosController implements the CRUD actions for PeriodoLetivoDocumentos model.
 */
class PeriodoLetivoDocumentosController extends Controller
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
     * Lists all PeriodoLetivoDocumentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoLetivoDocumentosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PeriodoLetivoDocumentos model.
     * @param integer $id_periodo_letivo
     * @param integer $id_documento
     * @return mixed
     */
    public function actionView($id_periodo_letivo, $id_documento)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_periodo_letivo, $id_documento),
        ]);
    }

    /**
     * Creates a new PeriodoLetivoDocumentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PeriodoLetivoDocumentos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_documento' => $model->id_documento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PeriodoLetivoDocumentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_periodo_letivo
     * @param integer $id_documento
     * @return mixed
     */
    public function actionUpdate($id_periodo_letivo, $id_documento)
    {
        $model = $this->findModel($id_periodo_letivo, $id_documento);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_documento' => $model->id_documento]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PeriodoLetivoDocumentos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_periodo_letivo
     * @param integer $id_documento
     * @return mixed
     */
    public function actionDelete($id_periodo_letivo, $id_documento)
    {
        $this->findModel($id_periodo_letivo, $id_documento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PeriodoLetivoDocumentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_periodo_letivo
     * @param integer $id_documento
     * @return PeriodoLetivoDocumentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_periodo_letivo, $id_documento)
    {
        if (($model = PeriodoLetivoDocumentos::findOne(['id_periodo_letivo' => $id_periodo_letivo, 'id_documento' => $id_documento])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
