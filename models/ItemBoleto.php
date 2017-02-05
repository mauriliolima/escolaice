<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_boleto".
 *
 * @property string $id_item_boleto
 * @property string $id_boleto
 * @property integer $id_servico
 * @property string $valor
 * @property string $id_parcela
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 *
 * @property Boleto $idBoleto
 * @property Parcela $idParcela
 * @property Servico $idServico
 */
class ItemBoleto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_boleto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_boleto', 'id_servico', 'valor', 'inserido_em'], 'required'],
            [['id_boleto', 'id_servico', 'id_parcela'], 'integer'],
            [['valor'], 'number'],
            [['inserido_em', 'alterado_em'], 'safe'],
            [['inserido_por', 'alterado_por'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_item_boleto' => 'Id Item Boleto',
            'id_boleto' => 'Id Boleto',
            'id_servico' => 'Id Servico',
            'valor' => 'Valor',
            'id_parcela' => 'Id Parcela',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBoleto()
    {
        return $this->hasOne(Boleto::className(), ['id_boleto' => 'id_boleto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdParcela()
    {
        return $this->hasOne(Parcela::className(), ['id_parcela' => 'id_parcela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdServico()
    {
        return $this->hasOne(Servico::className(), ['id_servico' => 'id_servico']);
    }

    /**
     * @inheritdoc
     * @return ItemBoletoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemBoletoQuery(get_called_class());
    }
}
