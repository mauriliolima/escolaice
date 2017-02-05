<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Boleto;
use app\models\Parcela;
use app\models\Contrato;
use app\models\ItemBoleto;
use yii\base\Exception;
use yii\data\ArrayDataProvider;
use kartik\mpdf\Pdf;

class FinanceiroController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	public function actionIndex(){
        return $this->render('index');
    }
	
	public function actionEmissaoBoleto(){
		//return $this->render('emissao-boleto');
		//$searchModel = new TempAlunosSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		if(!Yii::$app->session->has('TempAlunos')){
			//throw new Exception('Variável de sessão nao encontrada');
			$resultData = [ array("matricula"=>"","nome"=>"")];
			$dP = new ArrayDataProvider([
				'key'=>'matricula',
				'allModels' => $resultData,
				'sort' => [
					'attributes' => ['matricula', 'nome'],
				],
				'pagination' => false,
			]);    
			Yii::$app->session["TempAlunos"] = $dP;
		}
		$dataProvider = Yii::$app->session["TempAlunos"];
        return $this->render('emissao-boleto', [
            'dataProvider' => $dataProvider,
        ]);
	}
    
	public function actionListaPessoas($q = null, $id = null) {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //$out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {
        $query = new Query;
        $query->select('m.id_curso AS id, c.nome AS text')
            ->from('matricula_turma AS m')
			->innerJoin('curso AS c', 'm.id_curso = c.id_curso')
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
	
	public function actionIncluirSelecao(){
/*		if(!Yii::$app->session->has("TempAlunos")){
			Yii::$app->session["TempAlunos"] = new ArrayDataProvider([
				'key' => 'matricula',
				'allModels' => [['matricula', 'nome']],
				'sort' => [
					'attributes' => ['matricula', 'nome'],
				]
			]);
		}*/
			
		$connection = Yii::$app->getDb();
		$tb = '';
		$condicao = '';
		$comando = "SELECT m.matricula, p.nome
					  FROM matricula_turma m 
					 INNER JOIN aluno a ON a.matricula=m.matricula 
					 INNER JOIN pessoa p ON p.id_pessoa=a.id_pessoa 
					 WHERE 1=0 ";
		
		if(isset($_POST['responsavel'])){
			$condicao = $condicao . (trim($_POST['responsavel']) != '') ? ' OR (a.id_pessoa_responsavel = ' . $_POST["responsavel"] . ') ' : '';
		}
		if(isset($_POST['aluno'])){
			$condicao = $condicao . (trim($_POST["aluno"]) != "") ? " OR (m.matricula = '" . $_POST["aluno"] . "') " : "";
		}
		if(isset($_POST['periodo_letivo'])){
			if(trim($_POST['periodo_letivo']) != ''){
				$condicao = $condicao . ' OR (m.id_periodo_letivo = ' . $_POST["periodo_letivo"];
				if(isset($_POST['nivel'])){
					if((trim($_POST['nivel']) != '0') and (trim($_POST['nivel']) != '')){
						$condicao = $condicao . ' AND id_nivel = ' . $_POST['nivel'];
						if(isset($_POST['turma'])){
							if((trim($_POST['turma']) != '0') and (trim($_POST['turma']) != '')){
								$condicao = $condicao .' AND id_turma = ' . $_POST['turma'];
							}
						}
					}
				}
				$condicao = $condicao . ')';
			}
		}
		$comando = $comando . $condicao;
		//throw new Exception ($comando);
		
		$lines = $connection->createCommand($comando)->queryAll();
		$registros = Yii::$app->session["TempAlunos"]->allModels;
		foreach ($lines as $i => $pessoa) {
			if($registros[0]['matricula'] == ''){
				$registros[0] = ['matricula' => $pessoa['matricula'], 'nome' => $pessoa['nome']];
			} else {
				$registros[] = ['matricula' => $pessoa['matricula'], 'nome' => $pessoa['nome']];
			}
			
		}
		Yii::$app->session["TempAlunos"] = new ArrayDataProvider([
			'key'=>'matricula',
			'allModels' => $registros,
			'sort' => [
				'attributes' => ['matricula', 'nome'],
			],
			'pagination' => false,
		]);    
		return 1;
	}
	
	public function actionLimparAlunosSelecionados(){
		Yii::$app->session->remove('TempAlunos');
		return $this->redirect(['emissao-boleto']);
	}
	
	public function actionCalculaBoleto($ma = null, $pr = null, $di = null, $df = null){
		
		if(is_null($ma) or is_null($pr) or is_null($di) or is_null($df)){
			throw new Exception('Alguma variavel é nula');
			return;
		}
		
		$ma = trim(substr(str_replace("'", "''", $ma),0,10));
		$pr = trim(substr(str_replace("'", "''", $pr),0,1));
		$di = trim(preg_replace("/[^0-9]/", "", $di));
		$di = substr($di,4,4) . '-' . substr($di,2,2) . '-' . substr($di,0,2);
		$df = trim(preg_replace("/[^0-9]/", "", $df));
		$df = substr($df,4,4) . '-' . substr($df,2,2) . '-' . substr($df,0,2);
			
		$comando = "SELECT 
					  c.id_responsavel_financeiro,
					  p.id_parcela,
					  p.data_vencimento,
					  p.valor,
					  pp.id_banco,
					  pp.id_agencia,
					  pp.id_conta_corrente,
					  s.id_servico,
					  pp.carteira
					FROM
					  public.contrato c
					  INNER JOIN public.parcela p ON (c.id_contrato = p.id_contrato)
					  INNER JOIN public.plano_pagamento pp ON (c.id_plano_pagamento = pp.id_plano_pagamento)
					  INNER JOIN public.servico s ON (p.id_servico = s.id_servico)
					WHERE
					  ((p.data_vencimento BETWEEN '{$di}' AND '{$df}' AND 'v' = '{$pr}')
					  OR (p.competencia BETWEEN '{$di}' AND '{$df}' AND 'c' = '{$pr}'))
					  AND c.matricula = '{$ma}'
					  AND not p.cobrada ";

		//throw new Exception($comando);
		$connection = Yii::$app->getDb();
		$linhas = $connection->createCommand($comando)->queryAll();
		$retorno = 'nenhum boleto gerado';
		foreach ($linhas as $i => $registro) {
			$cobranca = new Boleto();
			$cobranca->id_cliente = $registro['id_responsavel_financeiro'];
			$cobranca->status_boleto = 'A'; // em aberto
			$cobranca->numero_documento = substr($di,2,2) . substr($di,5,2) . str_pad(trim((string) $registro['id_responsavel_financeiro']), 6,'0', STR_PAD_LEFT);
			$cobranca->id_conta_corrente = $registro['id_conta_corrente'];
			$cobranca->id_banco = $registro['id_banco'];
			$cobranca->id_agencia = $registro['id_agencia'];
			$cobranca->carteira = $registro['carteira'];
			$cobranca->inserido_em = date('Y-m-d h:i:s');
			$cobranca->inserido_por = 'maurilio';
			$cobranca->data_vencimento = $registro['data_vencimento'];
			if(!$cobranca->save()){
				print_r($cobranca->getErrors());
				return;
			}
			/* inserindo parcelas do contrato */
			/* TODO: IA para agrupar parcelas dos contratos */
			$item_cobranca = new ItemBoleto();
			$item_cobranca->id_boleto = $cobranca->id_boleto;
			$item_cobranca->id_servico = $registro['id_servico'];
			$item_cobranca->valor = $registro['valor'];
			$item_cobranca->id_parcela = $registro['id_parcela'];
			$item_cobranca->inserido_por = 'maurilio';
			$item_cobranca->inserido_em = date('Y-m-d h:i:s');
			if(!$item_cobranca->save()){
				print_r($item_cobranca->getErrors());
				return;
			}
			/* inserindo bolsas */
			/*TODO*/
			
			/* inserindo requerimentos */
			$cobranca->valor_documento = $item_cobranca->valor;
			$cobranca->nosso_numero = str_pad(trim((string) $cobranca->id_boleto), 11, '0', STR_PAD_LEFT);
			
			/* cálculo do DV do NOSSO NÚMERO */
			$mul = 3;
			$tot = 0;
			for($i=0; $i<=12; $i++){
				$tot = $tot + ($mul * (integer) substr(trim($cobranca->carteira).trim($cobranca->nosso_numero), $i, 1));
				$mul = $mul == 2 ? 7 : $mul-1;
			}
			$dv = (($tot % 11)-11) == 1 ? 'P' : ($tot % 11)-11;
			$cobranca->nosso_numero = $cobranca->nosso_numero . $dv;
			
			if(!$cobranca->save()){
				print_r($cobranca->getErrors());
				return;
			}
			$parcela = Parcela::findOne($registro['id_parcela']);
			if($parcela !== null){
				$parcela->cobrada = true;
				if(!$parcela->save()){
					print_r($parcela->getErrors());
					return;
				}
			}
			$retorno = 1;
			
		}
		return $retorno;
	}
	
	public function actionListaAlunosSelecionados(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$saida = ['total' => Yii::$app->session['TempAlunos']->count, 'linhas' => Yii::$app->session['TempAlunos']->models];
		return $saida;
	}

	public function actionBoleto($nosso_numero = null){
		return $this->renderPartial('boleto',[]);
	}
	
	public function actionBoletoPdf($nosso_numero = null){
		Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
		$headers = Yii::$app->response->headers;
		$headers->add('Content-Type', 'application/pdf');

		//$content = $this->renderPartial('boleto',[]);
		$content = $this->renderPartial('boleto',[]);
		$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_CORE, 
			// A4 paper format
			'format' => Pdf::FORMAT_A4, 
			'marginLeft' => 15,
			'marginRight' => 15,
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT, 
			// stream to browser inline
			'destination' => Pdf::DEST_BROWSER, 
			// your html content input
			'content' => $content,  
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting 
			'cssFile' => 'css/boleto.css',
			// any css to be embedded if required
			//'cssInline' => '.kv-heading-1{font-size:18px}', 
			 // set mPDF properties on the fly
			//'options' => ['title' => 'Krajee Report Title'],
			 // call mPDF methods on the fly
			'methods' => [ 
				'SetHeader'=>['Instituto Carioca de Educação'], 
				//'SetFooter'=>['{PAGENO}',''],
			]
		]);
		
		// return the pdf output as per the destination setting
		return $pdf->render(); 
	}
	
}
