<?php

namespace app\controllers;

use Yii;
use app\models\Cidade;
use app\models\CidadeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CidadeController implements the CRUD actions for Cidade model.
 */
class CidadeController extends Controller
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
     * Lists all Cidade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CidadeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cidade model.
     * @param integer $id_pais
     * @param integer $id_estado
     * @param integer $id_cidade
     * @return mixed
     */
    public function actionView($id_pais, $id_estado, $id_cidade)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pais, $id_estado, $id_cidade),
        ]);
    }

    /**
     * Creates a new Cidade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cidade();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado, 'id_cidade' => $model->id_cidade]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cidade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_pais
     * @param integer $id_estado
     * @param integer $id_cidade
     * @return mixed
     */
    public function actionUpdate($id_pais, $id_estado, $id_cidade)
    {
        $model = $this->findModel($id_pais, $id_estado, $id_cidade);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pais' => $model->id_pais, 'id_estado' => $model->id_estado, 'id_cidade' => $model->id_cidade]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cidade model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pais
     * @param integer $id_estado
     * @param integer $id_cidade
     * @return mixed
     */
    public function actionDelete($id_pais, $id_estado, $id_cidade)
    {
        $this->findModel($id_pais, $id_estado, $id_cidade)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cidade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_pais
     * @param integer $id_estado
     * @param integer $id_cidade
     * @return Cidade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pais, $id_estado, $id_cidade)
    {
        if (($model = Cidade::findOne(['id_pais' => $id_pais, 'id_estado' => $id_estado, 'id_cidade' => $id_cidade])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
