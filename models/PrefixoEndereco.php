<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prefixo_endereco".
 *
 * @property integer $id_prefixo_endereco
 * @property string $descricao
 *
 * @property Pessoa[] $pessoas
 */
class PrefixoEndereco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prefixo_endereco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prefixo_endereco' => 'Id Prefixo Endereco',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(Pessoa::className(), ['id_prefixo_endereco' => 'id_prefixo_endereco']);
    }

    /**
     * @inheritdoc
     * @return PrefixoEnderecoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrefixoEnderecoQuery(get_called_class());
    }
}
