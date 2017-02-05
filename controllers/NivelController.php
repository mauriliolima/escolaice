<?php

namespace app\controllers;

use Yii;
use app\models\Nivel;
use app\models\NivelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * NivelController implements the CRUD actions for Nivel model.
 */
class NivelController extends Controller
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
     * Lists all Nivel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NivelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nivel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Nivel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nivel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_nivel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Nivel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_nivel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nivel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nivel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nivel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nivel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionListaNivelPerlet() 
	{
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$id = end($_POST['depdrop_parents']);
			if ($id == '') {
			 	return;
			}
			$query = new Query;
			$query->select('m.id_nivel, n.nome')
				->from('matricula_turma AS m')
				->innerJoin('nivel AS n', 'n.id_nivel=m.id_nivel')
				->innerJoin('situacao AS s', 's.id_situacao=m.id_situacao')
				->where(['m.id_periodo_letivo'=>$id])
				->andWhere(['s.gera_cobranca' => 'true'])
				->andWhere(['s.considera_matriculado' => 'true'])
				->limit(20);
			$command = $query->createCommand();
			$data = $command->queryAll();
			$selected  = null;
			if ($id != null && count($data) > 0) {
				$selected = '0';
				$out[] = ['id' => '0', 'name' => '<todas>'];
				foreach ($data as $i => $nivel) {
					$out[] = ['id' => (string)$nivel['id_nivel'], 'name' => $nivel['nome']];
				}
				// Shows how you can preselect a value
				echo Json::encode(['output' => $out, 'selected'=>$selected]);
				return;
			}
		}
		echo Json::encode(['output' => '', 'selected'=>'']);
	}
}
