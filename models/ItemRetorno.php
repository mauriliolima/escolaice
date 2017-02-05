<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_retorno".
 *
 * @property integer $id_retorno
 * @property string $id_item_retorno
 * @property string $nosso_numero
 * @property string $numero_documento
 * @property string $data_pagamento
 * @property string $data_baixa
 * @property integer $id_banco_cobrador
 * @property string $agencia_cobradora
 * @property string $valor_despesas_cobranca
 * @property string $valor_documento
 * @property string $valor_pago
 * @property string $valor_abatimento
 * @property string $valor_juros
 * @property string $valor_multa
 * @property string $valor_desconto
 * @property string $codigo_ocorrencia_1
 * @property string $codigo_ocorrencia_2
 * @property string $codigo_ocorrencia_3
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 *
 * @property Banco $idBancoCobrador
 * @property Retorno $idRetorno
 */
class ItemRetorno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_retorno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_retorno', 'inserido_em'], 'required'],
            [['id_retorno', 'id_banco_cobrador'], 'integer'],
            [['data_pagamento', 'data_baixa', 'inserido_em', 'alterado_em'], 'safe'],
            [['valor_despesas_cobranca', 'valor_documento', 'valor_pago', 'valor_abatimento', 'valor_juros', 'valor_multa', 'valor_desconto'], 'number'],
            [['nosso_numero'], 'string', 'max' => 14],
            [['numero_documento'], 'string', 'max' => 10],
            [['agencia_cobradora'], 'string', 'max' => 5],
            [['codigo_ocorrencia_1', 'codigo_ocorrencia_2'], 'string', 'max' => 3],
			[['codigo_ocorrencia_3'], 'string', 'max' => 10],
            [['inserido_por', 'alterado_por'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_retorno' => 'Id Retorno',
            'id_item_retorno' => 'Id Item Retorno',
            'nosso_numero' => 'Nosso Numero',
            'numero_documento' => 'Numero Documento',
            'data_pagamento' => 'Data Pagamento',
            'data_baixa' => 'Data Baixa',
            'id_banco_cobrador' => 'Id Banco Cobrador',
            'agencia_cobradora' => 'Agencia Cobradora',
            'valor_despesas_cobranca' => 'Valor Despesas Cobranca',
            'valor_documento' => 'Valor Documento',
            'valor_pago' => 'Valor Pago',
            'valor_abatimento' => 'Valor Abatimento',
            'valor_juros' => 'Valor Juros',
            'valor_multa' => 'Valor Multa',
            'valor_desconto' => 'Valor Desconto',
            'codigo_ocorrencia_1' => 'Codigo Ocorrencia 1',
            'codigo_ocorrencia_2' => 'Codigo Ocorrencia 2',
            'codigo_ocorrencia_3' => 'Codigo Ocorrencia 3',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBancoCobrador()
    {
        return $this->hasOne(Banco::className(), ['id_banco' => 'id_banco_cobrador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRetorno()
    {
        return $this->hasOne(Retorno::className(), ['id_retorno' => 'id_retorno']);
    }

    /**
     * @inheritdoc
     * @return ItemRetornoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemRetornoQuery(get_called_class());
    }
}
