<?php

namespace app\controllers;

use Yii;
use app\models\Pessoa;
use app\models\PessoaSearch;
use app\models\PessoaQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Estado;
use app\models\Cidade;
use app\models\estadoSearch;
use yii\helpers\Json;
use yii\db\Query;

/**
 * PessoaController implements the CRUD actions for Pessoa model.
 */
class PessoaController extends Controller
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
     * Lists all Pessoa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PessoaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pessoa model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pessoa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pessoa();
		$model->scenario = Pessoa::SCENARIO_ALUNO;
		
        $tipoPessoa = ['F' => 'Física', 'J' => 'Jurídica'];

        if($model->load(Yii::$app->request->post())) {
            $model->data_inclusao = date('Y-m-d h:i:s');
            $model->usuario_inclusao = 'maurilio';
            if($model->save()){
							echo 1;
            } else {
							echo 0; 
							print_r($model->getErrors());
            }
            //return $this->redirect(['view', 'id' => $model->id_pessoa]);
            /*return $this->redirect('index', [
									'searchModel' => $searchModel,
									'dataProvider' => $dataProvider,
									]);*/
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	
	public function actionCreatemin()
    {
        $model = new Pessoa();
		$model->scenario = Pessoa::SCENARIO_RESPONSAVEL;

        if($model->load(Yii::$app->request->post())) {
            $model->data_inclusao = date('Y-m-d h:i:s');
						$model->tipo_pessoa = 'F';
            $model->usuario_inclusao = 'maurilio';
            if($model->save()){
							$out = ['id' => $model->id_pessoa, 'text' => $model->nome];
								echo Json::encode($out);
            } else {
                echo 0; 
								print_r($model->getErrors());
            }
            //return $this->redirect(['view', 'id' => $model->id_pessoa]);
            /*return $this->redirect('index', [
									'searchModel' => $searchModel,
									'dataProvider' => $dataProvider,
									]);*/
        } else {
            return $this->renderAjax('createmin', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pessoa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
			$model = $this->findModel($id);
			$model->scenario = Pessoa::SCENARIO_ALUNO;
			if ($model->load(Yii::$app->request->post())){
				$model->data_nascimento = (($_POST['Pessoa']['data_nascimento']===NULL) ? NULL : \DateTime::createFromFormat('d/m/Y',$_POST['Pessoa']['data_nascimento'])->format('Y-m-d'));
				$model->emissao_identidade = (($_POST['Pessoa']['emissao_identidade']===NULL) ? NULL : \DateTime::createFromFormat('d/m/Y',$_POST['Pessoa']['emissao_identidade'])->format('Y-m-d'));
				if ($model->save()) {
					return $this->redirect(['view', 'id' => $model->id_pessoa]);
				} else {
					print_r($model);
					print_r($model->getErrors());	
				}
			} else {
				$model->data_nascimento = (($model->data_nascimento===NULL) ? NULL : \DateTime::createFromFormat('Y-m-d',$model->data_nascimento)->format('d/m/Y'));
				$model->emissao_identidade = (($model->emissao_identidade===NULL) ? NULL : \DateTime::createFromFormat('Y-m-d',$model->emissao_identidade)->format('d/m/Y'));
 				echo "<!-- id_pais: " . $model->id_pais . " | id_estado: " . $model->id_estado . " | id_cidade: " . $model->id_cidade . " -->";
				return $this->render('update', ['model' => $model,]);
        }
    }

    /**
     * Deletes an existing Pessoa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pessoa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pessoa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pessoa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página solicitada não existe.');
        }
    }
	
	public function actionListaEstados() 
	{
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$id = end($_POST['depdrop_parents']);
			if ($id == '') {
			 	return;
			}
			$list = Estado::find()->andWhere(['id_pais'=>$id])->asArray()->all();
			$selected  = null;
			$sel_alternativo = null;
			if ($id != null && count($list) > 0) {
				$selected = '';
				foreach ($list as $i => $estado) {
					$out[] = ['id' => (string)$estado['id_estado'], 'name' => $estado['nome']];
					if ($i == 0) {
						$sel_alternativo = $estado['id_estado'];
					}
					if ($estado['id_estado'] = $_GET['sel']) {
						$selected = $estado['id_estado'];
					}
				}
				if ($_GET['sel'] === NULL) {
					$selected = $sel_alternativo;
				}
				// Shows how you can preselect a value
				echo Json::encode(['output' => $out, 'selected'=>$selected]);
				return;
			}
		}
		echo Json::encode(['output' => '', 'selected'=>'']);
	}
	
	public function actionListaCidades() 
	{
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$id = end($_POST['depdrop_parents']);
			if ($id == '') {
			 	return;
			}
			$list = Cidade::find()->andWhere(['id_estado'=>$id])->asArray()->all();
			$selected  = null;
			$sel_alternativo = null;
			if ($id != null && count($list) > 0) {
				$selected = '';
				foreach ($list as $i => $cidade) {
					$out[] = ['id' => (string)$cidade['id_cidade'], 'name' => $cidade['nome']];
					if ($i == 0) {
						$sel_alternativo = $cidade['id_cidade'];
					}
					if ($cidade['id_cidade'] = $_GET['sel']) {
						$selected = $cidade['id_cidade'];
					}
				}
				if ($_GET['sel'] === NULL) {
					$selected = $sel_alternativo;
				}
				// Shows how you can preselect a value
				echo Json::encode(['output' => $out, 'selected'=>$selected]);
				return;
			}
		}
		echo Json::encode(['output' => '', 'selected'=>'']);
	}
	
	
	public function actionListaPessoas($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('id_pessoa AS id, nome AS text')
            ->from('pessoa')
            ->where(['like', 'nome', strtoupper($q)])
			->andWhere(['tipo_pessoa' => 'F'])
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
	
	public function actionBuscaCep($cep = null)
	{
		$token = 'bc54eacfb2868ef0b670af3868ff1bc6';
        $url = 'http://www.cepaberto.com/api/v2/ceps.json?cep=' . $cep;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token token="' . $token . '"'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
		return $output;
	}
}
