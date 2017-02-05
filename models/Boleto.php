<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "boleto".
 *
 * @property string $id_boleto
 * @property string $id_cliente
 * @property string $nosso_numero
 * @property string $numero_documento
 * @property string $id_status_banco
 * @property string $id_status_boleto
 * @property string $data_vencimento
 * @property string $data_emissao
 * @property string $data_pagamento
 * @property string $data_baixa
 * @property string $data_cancelamento
 * @property string $valor_documento
 * @property string $valor_pago
 * @property string $valor_desconto
 * @property string $valor_juros
 * @property string $valor_multa
 * @property string $percentual_juros
 * @property integer $id_local_pagamento
 * @property integer $id_conta_corrente
 * @property string $cod_retorno_banco
 * @property string $cod_autorizacao
 * @property string $nsu
 * @property string $carteira
 * @property string $codigo_barra
 * @property string $linha_digitavel
 * @property integer $id_agencia
 * @property integer $id_banco
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 *
 * @property LocalPagamento $idLocalPagamento
 * @property StatusBoleto $idStatusBoleto
 * @property ItemBoleto[] $itemBoletos
 * @property ItemRemessa[] $itemRemessas
 */
class Boleto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boleto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'status_boleto', 'data_vencimento', 'id_conta_corrente', 'carteira', 'inserido_em'], 'required'],
            [['id_cliente', 'id_local_pagamento', 'id_conta_corrente', 'id_agencia', 'id_banco'], 'integer'],
            [['data_vencimento', 'data_emissao', 'data_pagamento', 'data_baixa', 'data_cancelamento', 'inserido_em', 'alterado_em'], 'safe'],
            [['valor_documento', 'valor_pago', 'valor_desconto', 'valor_juros', 'valor_multa', 'percentual_juros'], 'number'],
            [['nosso_numero'], 'string', 'max' => 20],
            [['numero_documento', 'nsu'], 'string', 'max' => 10],
            [['status_banco', 'status_boleto'], 'string', 'max' => 1],
            [['cod_retorno_banco'], 'string', 'max' => 2],
            [['cod_autorizacao', 'codigo_barra'], 'string', 'max' => 45],
            [['carteira'], 'string', 'max' => 3],
            [['linha_digitavel', 'inserido_por', 'alterado_por'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_boleto' => 'Id Boleto',
            'id_cliente' => 'Id Cliente',
            'nosso_numero' => 'Nosso Numero',
            'numero_documento' => 'Numero Documento',
            'status_banco' => 'Situação no Banco',
            'status_boleto' => 'Situação do Boleto',
            'data_vencimento' => 'Data Vencimento',
            'data_emissao' => 'Data Emissao',
            'data_pagamento' => 'Data Pagamento',
            'data_baixa' => 'Data Baixa',
            'data_cancelamento' => 'Data Cancelamento',
            'valor_documento' => 'Valor Documento',
            'valor_pago' => 'Valor Pago',
            'valor_desconto' => 'Valor Desconto',
            'valor_juros' => 'Valor Juros',
            'valor_multa' => 'Valor Multa',
            'percentual_juros' => 'Percentual Juros',
            'id_local_pagamento' => 'Id Local Pagamento',
            'id_conta_corrente' => 'Id Conta Corrente',
            'cod_retorno_banco' => 'Cod Retorno Banco',
            'cod_autorizacao' => 'Cod Autorizacao',
            'nsu' => 'Nsu',
            'carteira' => 'Carteira',
            'codigo_barra' => 'Codigo Barra',
            'linha_digitavel' => 'Linha Digitavel',
            'id_agencia' => 'Id Agencia',
            'id_banco' => 'Id Banco',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalPagamento()
    {
        return $this->hasOne(LocalPagamento::className(), ['id_local_pagamento' => 'id_local_pagamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemBoletos()
    {
        return $this->hasMany(ItemBoleto::className(), ['id_boleto' => 'id_boleto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemRemessas()
    {
        return $this->hasMany(ItemRemessa::className(), ['id_boleto' => 'id_boleto']);
    }

    /**
     * @inheritdoc
     * @return BoletoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BoletoQuery(get_called_class());
    }
}
