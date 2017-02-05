<?php

namespace app\controllers;

use Yii;
use app\models\ItemRetorno;
use app\models\ItemRetornoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemRetornoController implements the CRUD actions for ItemRetorno model.
 */
class ItemRetornoController extends Controller
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
     * Lists all ItemRetorno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemRetornoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemRetorno model.
     * @param integer $id_retorno
     * @param string $id_item_retorno
     * @return mixed
     */
    public function actionView($id_retorno, $id_item_retorno)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_retorno, $id_item_retorno),
        ]);
    }

    /**
     * Creates a new ItemRetorno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemRetorno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_retorno' => $model->id_retorno, 'id_item_retorno' => $model->id_item_retorno]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ItemRetorno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_retorno
     * @param string $id_item_retorno
     * @return mixed
     */
    public function actionUpdate($id_retorno, $id_item_retorno)
    {
        $model = $this->findModel($id_retorno, $id_item_retorno);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_retorno' => $model->id_retorno, 'id_item_retorno' => $model->id_item_retorno]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ItemRetorno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_retorno
     * @param string $id_item_retorno
     * @return mixed
     */
    public function actionDelete($id_retorno, $id_item_retorno)
    {
        $this->findModel($id_retorno, $id_item_retorno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItemRetorno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_retorno
     * @param string $id_item_retorno
     * @return ItemRetorno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_retorno, $id_item_retorno)
    {
        if (($model = ItemRetorno::findOne(['id_retorno' => $id_retorno, 'id_item_retorno' => $id_item_retorno])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
