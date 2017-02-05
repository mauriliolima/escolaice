<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banco_layout".
 *
 * @property integer $id_banco
 * @property integer $header_cod_banco_ini
 * @property integer $header_data_baixa_ini
 * @property integer $header_data_baixa_cmp
 * @property string $header_data_baixa_formato
 * @property integer $header_data_compensacao_ini
 * @property integer $header_data_compensacao_cmp
 * @property string $header_data_compensacao_formato
 * @property integer $nosso_numero_ini
 * @property integer $nosso_numero_cmp
 * @property integer $numero_documento_ini
 * @property integer $numero_documento_cmp
 * @property integer $data_pagamento_ini
 * @property integer $data_pagamento_cmp
 * @property string $data_pagamento_formato
 * @property integer $data_baixa_ini
 * @property integer $data_baixa_cmp
 * @property string $data_baixa_formato
 * @property integer $id_banco_cobrador_ini
 * @property integer $id_banco_cobrador_cmp
 * @property integer $agencia_cobradora_ini
 * @property integer $agencia_cobradora_cmp
 * @property integer $valor_despesas_cobranca_ini
 * @property integer $valor_despesas_cobranca_cmp
 * @property integer $valor_documento_ini
 * @property integer $valor_documento_cmp
 * @property integer $valor_pago_ini
 * @property integer $valor_pago_cmp
 * @property integer $valor_abatimento_ini
 * @property integer $valor_abatimento_cmp
 * @property integer $valor_juros_ini
 * @property integer $valor_juros_cmp
 * @property integer $valor_multa_ini
 * @property integer $valor_multa_cmp
 * @property integer $valor_desconto_ini
 * @property integer $valor_desconto_cmp
 * @property integer $codigo_ocorrencia_1_ini
 * @property integer $codigo_ocorrencia_1_cmp
 * @property integer $codigo_ocorrencia_2_ini
 * @property integer $codigo_ocorrencia_2_cmp
 * @property integer $codigo_ocorrencia_3_ini
 * @property integer $codigo_ocorrencia_3_cmp
 * @property string $identificador_linha_header
 * @property string $identificador_linha_registro
 * @property string $identificador_linha_trailler
 * @property integer $identificador_tipo_linha_ini
 * @property integer $identificador_tipo_linha_cmp
 *
 * @property Banco $idBanco
 */
class BancoLayout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banco_layout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco'], 'required'],
            [['id_banco', 'header_cod_banco_ini', 'header_cod_banco_cmp', 'header_data_baixa_ini', 'header_data_baixa_cmp', 
				'header_data_compensacao_ini', 'header_data_compensacao_cmp', 'nosso_numero_ini', 'nosso_numero_cmp', 'numero_documento_ini', 
				'numero_documento_cmp', 'data_pagamento_ini', 'data_pagamento_cmp', 'data_baixa_ini', 'data_baixa_cmp', 'id_banco_cobrador_ini', 
				'id_banco_cobrador_cmp', 'agencia_cobradora_ini', 'agencia_cobradora_cmp', 'valor_despesas_cobranca_ini', 'valor_despesas_cobranca_cmp', 
				'valor_documento_ini', 'valor_documento_cmp', 'valor_pago_ini', 'valor_pago_cmp', 'valor_abatimento_ini', 'valor_abatimento_cmp', 
				'valor_juros_ini', 'valor_juros_cmp', 'valor_multa_ini', 'valor_multa_cmp', 'valor_desconto_ini', 'valor_desconto_cmp', 
				'codigo_ocorrencia_1_ini', 'codigo_ocorrencia_1_cmp', 'codigo_ocorrencia_2_ini', 'codigo_ocorrencia_2_cmp', 'codigo_ocorrencia_3_ini', 
				'codigo_ocorrencia_3_cmp', 'identificador_tipo_linha_ini', 'identificador_tipo_linha_cmp'], 'integer'],
            [['header_data_baixa_formato', 'header_data_compensacao_formato', 'data_pagamento_formato', 'data_baixa_formato'], 'string', 'max' => 8],
			[['identificador_linha_header', 'identificador_linha_registro', 'identificador_linha_trailler'], 'string', 'max' => 1],
            [['id_banco'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id Banco',
            'header_cod_banco_ini' => 'Header Cod Banco Inicio',
            'header_cod_banco_cmp' => 'Header Cod Banco Comprimento',
            'header_data_baixa_ini' => 'Header Data Baixa Ini',
            'header_data_baixa_cmp' => 'Header Data Baixa Comprimento',
            'header_data_baixa_formato' => 'Header Data Baixa Formato',
            'header_data_compensacao_ini' => 'Header Data Compensacao Ini',
            'header_data_compensacao_cmp' => 'Header Data Compensacao Comprimento',
            'header_data_compensacao_formato' => 'Header Data Compensacao Formato',
            'nosso_numero_ini' => 'Nosso Numero Ini',
            'nosso_numero_cmp' => 'Nosso Numero Comprimento',
            'numero_documento_ini' => 'Numero Documento Ini',
            'numero_documento_cmp' => 'Numero Documento Comprimento',
            'data_pagamento_ini' => 'Data Pagamento Ini',
            'data_pagamento_cmp' => 'Data Pagamento Comprimento',
            'data_pagamento_formato' => 'Data Pagamento Formato',
            'data_baixa_ini' => 'Data Baixa Ini',
            'data_baixa_cmp' => 'Data Baixa Comprimento',
            'data_baixa_formato' => 'Data Baixa Formato',
            'id_banco_cobrador_ini' => 'Id Banco Cobrador Ini',
            'id_banco_cobrador_cmp' => 'Id Banco Cobrador Comprimento',
            'agencia_cobradora_ini' => 'Agencia Cobradora Ini',
            'agencia_cobradora_cmp' => 'Agencia Cobradora Comprimento',
            'valor_despesas_cobranca_ini' => 'Valor Despesas Cobranca Ini',
            'valor_despesas_cobranca_cmp' => 'Valor Despesas Cobranca Comprimento',
            'valor_documento_ini' => 'Valor Documento Ini',
            'valor_documento_cmp' => 'Valor Documento Comprimento',
            'valor_pago_ini' => 'Valor Pago Ini',
            'valor_pago_cmp' => 'Valor Pago Comprimento',
            'valor_abatimento_ini' => 'Valor Abatimento Ini',
            'valor_abatimento_cmp' => 'Valor Abatimento Comprimento',
            'valor_juros_ini' => 'Valor Juros Ini',
            'valor_juros_cmp' => 'Valor Juros Comprimento',
            'valor_multa_ini' => 'Valor Multa Ini',
            'valor_multa_cmp' => 'Valor Multa Comprimento',
            'valor_desconto_ini' => 'Valor Desconto Ini',
            'valor_desconto_cmp' => 'Valor Desconto Comprimento',
            'codigo_ocorrencia_1_ini' => 'Codigo Ocorrencia 1 Ini',
            'codigo_ocorrencia_1_cmp' => 'Codigo Ocorrencia 1 Comprimento',
            'codigo_ocorrencia_2_ini' => 'Codigo Ocorrencia 2 Ini',
            'codigo_ocorrencia_2_cmp' => 'Codigo Ocorrencia 2 Comprimento',
            'codigo_ocorrencia_3_ini' => 'Codigo Ocorrencia 3 Ini',
            'codigo_ocorrencia_3_cmp' => 'Codigo Ocorrencia 3 Comprimento',
			'identificador_tipo_linha_ini' => 'Identificador de tipo de linha inicio', 
			'identificador_tipo_linha_cmp' => 'Identificador de tipo de linha Comprimento' ,
			'identificador_linha_header'=> 'Identificador de linha Header', 
			'identificador_linha_registro'=> 'Identificador de linha Registro', 
			'identificador_linha_trailler'=> 'Identificador de linha Trailler',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBanco()
    {
        return $this->hasOne(Banco::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @inheritdoc
     * @return BancoLayoutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BancoLayoutQuery(get_called_class());
    }
}
