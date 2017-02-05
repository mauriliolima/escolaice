<?php

namespace app\controllers;

use Yii;
use app\models\BancoOcorrencia;
use app\models\BancoOcorrenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BancoOcorrenciaController implements the CRUD actions for BancoOcorrencia model.
 */
class BancoOcorrenciaController extends Controller
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
     * Lists all BancoOcorrencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BancoOcorrenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BancoOcorrencia model.
     * @param integer $id_banco
     * @param integer $tipo_ocorrencia
     * @param string $cod_ocorrencia
     * @return mixed
     */
    public function actionView($id_banco, $tipo_ocorrencia, $cod_ocorrencia)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_banco, $tipo_ocorrencia, $cod_ocorrencia),
        ]);
    }

    /**
     * Creates a new BancoOcorrencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BancoOcorrencia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_banco' => $model->id_banco, 'tipo_ocorrencia' => $model->tipo_ocorrencia, 'cod_ocorrencia' => $model->cod_ocorrencia]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BancoOcorrencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_banco
     * @param integer $tipo_ocorrencia
     * @param string $cod_ocorrencia
     * @return mixed
     */
    public function actionUpdate($id_banco, $tipo_ocorrencia, $cod_ocorrencia)
    {
        $model = $this->findModel($id_banco, $tipo_ocorrencia, $cod_ocorrencia);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_banco' => $model->id_banco, 'tipo_ocorrencia' => $model->tipo_ocorrencia, 'cod_ocorrencia' => $model->cod_ocorrencia]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BancoOcorrencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_banco
     * @param integer $tipo_ocorrencia
     * @param string $cod_ocorrencia
     * @return mixed
     */
    public function actionDelete($id_banco, $tipo_ocorrencia, $cod_ocorrencia)
    {
        $this->findModel($id_banco, $tipo_ocorrencia, $cod_ocorrencia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BancoOcorrencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_banco
     * @param integer $tipo_ocorrencia
     * @param string $cod_ocorrencia
     * @return BancoOcorrencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_banco, $tipo_ocorrencia, $cod_ocorrencia)
    {
        if (($model = BancoOcorrencia::findOne(['id_banco' => $id_banco, 'tipo_ocorrencia' => $tipo_ocorrencia, 'cod_ocorrencia' => $cod_ocorrencia])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
