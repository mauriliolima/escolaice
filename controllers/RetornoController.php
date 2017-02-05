<?php

namespace app\controllers;

use Yii;
use app\models\Retorno;
use app\models\RetornoSearch;
use app\models\ItemRetorno;
use app\models\BancoLayout;
use app\models\BancoLayoutSearch;
use app\models\Banco;
use app\models\BancoSearch;
use app\models\UploadForm;

use yii\base\Exception;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;

/**
 * RetornoController implements the CRUD actions for Retorno model.
 */
class RetornoController extends Controller
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
     * Lists all Retorno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RetornoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Retorno model.
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
     * Creates a new Retorno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Retorno();
        
        $upload = new UploadForm();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if (Yii::$app->request->isPost){
            $upload->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            if ($upload->upload()){
                $model->load(Yii::$app->request->post());
                $model->nome_arquivo =  $upload->imageFile->baseName . '.' . $upload->imageFile->extension;
                if(!$model->save()){
                    //throw new Exception('Erro ao salvar');
                    print_r($model->getErrors());
                }
                
                $handle = fopen("../uploads/arquivos-retorno/" . $model->nome_arquivo, "r");
                if ($handle) {
                    //todo: verificando qual é o banco no arquivo
                    $layout = BancoLayout::findOne(Banco::find()->where(['numero_febraban' => '237'])->one()->id_banco);
                    $contador = 0;    
                    while (($line = fgets($handle)) !== false) {
                    
						// Linha header
						if (substr($line, $layout->identificador_tipo_linha_ini-1, $layout->identificador_tipo_linha_cmp) == $layout->identificador_linha_header){
								$model->data_retorno = date_format(date_create_from_format(trim($layout->header_data_baixa_formato), substr($line, $layout->header_data_baixa_ini-1, $layout->header_data_baixa_cmp)), "Y-m-d");
								$model->id_banco = $layout->id_banco;
						}
						
						// Linha Registro
						if (substr($line, $layout->identificador_tipo_linha_ini-1, $layout->identificador_tipo_linha_cmp) == $layout->identificador_linha_header){
							$itemRetorno = new ItemRetorno();
							$itemRetorno->id_retorno = $model->id_retorno;
							$itemRetorno->nosso_numero = substr($line, $layout->nosso_numero_ini-1, $layout->nosso_numero_cmp);
							$itemRetorno->numero_documento = substr($line, $layout->numero_documento_ini-1, $layout->numero_documento_cmp);
							$itemRetorno->data_pagamento = date_format(date_create_from_format(trim($layout->data_pagamento_formato), substr($line, $layout->data_pagamento_ini-1, $layout->data_pagamento_cmp)), "Y-m-d");
							
							if (trim(substr($line, $layout->data_baixa_ini-1, $layout->data_baixa_cmp)) != '') {
								$itemRetorno->data_baixa = date_format(date_create_from_format(trim($layout->data_baixa_formato), substr($line, $layout->data_baixa_ini-1, $layout->data_baixa_cmp)), "Y-m-d");
							}
							//$itemRetorno->id_banco_cobrador = substr($line, $layout->_ini-1, $layout->_cmp);
							$itemRetorno->id_banco_cobrador = 19;
							$itemRetorno->agencia_cobradora = substr($line, $layout->agencia_cobradora_ini-1, $layout->agencia_cobradora_cmp);
							$itemRetorno->valor_despesas_cobranca = floatval(substr($line, $layout->valor_despesas_cobranca_ini-1, $layout->valor_despesas_cobranca_cmp))/100;
							$itemRetorno->valor_documento = floatval(substr($line, $layout->valor_documento_ini-1, $layout->valor_documento_cmp))/100;
							$itemRetorno->valor_pago = floatval(substr($line, $layout->valor_pago_ini-1, $layout->valor_pago_cmp))/100;
							$itemRetorno->valor_abatimento = floatval(substr($line, $layout->valor_abatimento_ini-1, $layout->valor_abatimento_cmp))/100;
							$itemRetorno->valor_juros = floatval(substr($line, $layout->valor_juros_ini-1, $layout->valor_juros_cmp))/100;
							//$itemRetorno->valor_multa = floatval(substr($line, $layout->valor_multa_ini-1, $layout->valor_multa_cmp))/100;
							$itemRetorno->valor_multa = 0;                        
							$itemRetorno->valor_desconto = floatval(substr($line, $layout->valor_desconto_ini-1, $layout->valor_desconto_cmp))/100;
							$itemRetorno->codigo_ocorrencia_1 = substr($line, $layout->codigo_ocorrencia_1_ini-1, $layout->codigo_ocorrencia_1_cmp);
							$itemRetorno->codigo_ocorrencia_2 = substr($line, $layout->codigo_ocorrencia_2_ini-1, $layout->codigo_ocorrencia_2_cmp);
							$itemRetorno->codigo_ocorrencia_3 = substr($line, $layout->codigo_ocorrencia_3_ini-1, $layout->codigo_ocorrencia_3_cmp);
							$itemRetorno->inserido_por = 'maurilio';
							$itemRetorno->inserido_em = date('Y-m-d h:i:s');
							if(!$itemRetorno->save()){
								print_r($itemRetorno->getErrors());
							}         
						}
                        $contador++;
                    }
                    $model->numero_linhas = $contador;
                    $model->save();
                }
                fclose($handle);
                
            } else {
                    throw new \yii\base\Exception( 'Não foi possível realizar o upload' );
            } 
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Retorno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_retorno]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Retorno model.
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
     * Finds the Retorno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Retorno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Retorno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
