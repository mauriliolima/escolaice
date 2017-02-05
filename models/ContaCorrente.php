<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conta_corrente".
 *
 * @property integer $id_banco
 * @property integer $id_agencia
 * @property integer $id_conta_corrente
 * @property string $numero
 * @property string $digito
 * @property string $convenio_cobranca
 * @property string $convenio_pagamento
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 *
 * @property Agencia $idBanco
 */
class ContaCorrente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conta_corrente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco', 'id_agencia', 'numero', 'digito', 'inserido_em'], 'required'],
            [['id_banco', 'id_agencia'], 'integer'],
            [['inserido_em', 'alterado_em'], 'safe'],
            [['numero', 'convenio_cobranca', 'convenio_pagamento'], 'string', 'max' => 10],
            [['digito'], 'string', 'max' => 1],
            [['inserido_por', 'alterado_por'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id Banco',
            'id_agencia' => 'Id Agencia',
            'id_conta_corrente' => 'Id Conta Corrente',
            'numero' => 'Numero',
            'digito' => 'Digito',
            'convenio_cobranca' => 'Convenio Cobranca',
            'convenio_pagamento' => 'Convenio Pagamento',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBanco()
    {
        return $this->hasOne(Agencia::className(), ['id_banco' => 'id_banco', 'id_agencia' => 'id_agencia']);
    }

    /**
     * @inheritdoc
     * @return ContaCorrenteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContaCorrenteQuery(get_called_class());
    }
}
