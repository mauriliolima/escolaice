<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banco".
 *
 * @property integer $id_banco
 * @property string $numero_febraban
 * @property string $nome
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 *
 * @property Agencia[] $agencias
 * @property BancoLayout $bancoLayout
 * @property ItemRetorno[] $itemRetornos
 */
class Banco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero_febraban', 'nome', 'inserido_em'], 'required'],
            [['inserido_em', 'alterado_em'], 'safe'],
            [['numero_febraban'], 'string', 'max' => 3],
            [['nome'], 'string', 'max' => 45],
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
            'numero_febraban' => 'Numero Febraban',
            'nome' => 'Nome',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgencias()
    {
        return $this->hasMany(Agencia::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBancoLayout()
    {
        return $this->hasOne(BancoLayout::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemRetornos()
    {
        return $this->hasMany(ItemRetorno::className(), ['id_banco_cobrador' => 'id_banco']);
    }

    /**
     * @inheritdoc
     * @return BancoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BancoQuery(get_called_class());
    }
}
