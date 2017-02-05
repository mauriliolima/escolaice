<?php

namespace app\controllers;

use Yii;
use app\models\Turma;
use app\models\TurmaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * TurmaController implements the CRUD actions for Turma model.
 */
class TurmaController extends Controller
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
     * Lists all Turma models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TurmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Turma model.
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return mixed
     */
    public function actionView($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel),
        ]);
    }

    /**
     * Creates a new Turma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Turma();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Turma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return mixed
     */
    public function actionUpdate($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        $model = $this->findModel($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_turma' => $model->id_turma, 'id_curso' => $model->id_curso, 'id_periodo_letivo' => $model->id_periodo_letivo, 'id_disciplina' => $model->id_disciplina, 'id_nivel' => $model->id_nivel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Turma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return mixed
     */
    public function actionDelete($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        $this->findModel($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Turma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_turma
     * @param integer $id_curso
     * @param integer $id_periodo_letivo
     * @param string $id_disciplina
     * @param integer $id_nivel
     * @return Turma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_turma, $id_curso, $id_periodo_letivo, $id_disciplina, $id_nivel)
    {
        if (($model = Turma::findOne(['id_turma' => $id_turma, 'id_curso' => $id_curso, 'id_periodo_letivo' => $id_periodo_letivo, 'id_disciplina' => $id_disciplina, 'id_nivel' => $id_nivel])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	/*
	public function actionListaTurmaPerlet($q = null, $id = null) {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$out = ['results' => ['id' => '', 'text' => '']];
		if (!is_null($q)) {
			$query = new Query;
			$query->select('m.id_turma AS id, t.nome AS text')
				->from('matricula_turma AS m')
				->innerJoin('turma AS t', 't.id_turma=m.id_turma')
				->innerJoin('situacao AS s', 's.id_situacao=m.id_situacao')
				->where(['id_periodo_letivo'=>$q])
				->andWhere(['s.gera_cobranca' => 'true'])
				->andWhere(['s.considera_matriculado' => 'true'])
				->limit(20);
			$command = $query->createCommand();
			$data = $command->queryAll();
			$out['results'] = array_values($data);
		}
		elseif ($id > 0) {
			$out['results'] = ['id' => $id, 'text' => Pessoa::find($id)->nome];
		}
		return $out;
	}
	*/
	
	public function actionListaTurmaPerlet() 
	{
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$ids = $_POST['depdrop_parents'];
			$id_nivel = empty($ids[0]) ? null : $ids[0];
			$id_periodo_letivo = empty($ids[1]) ? null : $ids[1];
			$query = new Query;
			$query->select('m.id_turma, t.nome')
				->from('matricula_turma AS m')
				->innerJoin('turma AS t', 't.id_turma=m.id_turma')
				->innerJoin('situacao AS s', 's.id_situacao=m.id_situacao')
				->where(is_null($id_periodo_letivo) ? ['not', ['m.id_periodo_letivo' => $id_periodo_letivo]] : ['m.id_periodo_letivo' => $id_periodo_letivo])
				->andWhere(is_null($id_nivel) ? ['not', ['m.id_nivel' => $id_nivel]] : ['m.id_nivel' => $id_nivel])
				->andWhere(['s.gera_cobranca' => 'true'])
				->andWhere(['s.considera_matriculado' => 'true'])
				->limit(20);
			$command = $query->createCommand();
			$data = $command->queryAll();
			$selected  = null;
			if (count($data) > 0) {
				$selected = '0';
				$out[] = ['id' => '0', 'name' => '<todas>'];
				foreach ($data as $i => $turma) {
					$out[] = ['id' => (string)$turma['id_turma'], 'name' => $turma['nome']];
				}
				echo Json::encode(['output' => $out, 'selected'=>$selected]);
				return;
			}
		}
		echo Json::encode(['output' => '', 'selected'=>'']);
	}
}
