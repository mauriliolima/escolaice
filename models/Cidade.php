<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cidade".
 *
 * @property integer $id_pais
 * @property integer $id_estado
 * @property integer $id_cidade
 * @property string $codigo_ibge
 * @property string $nome
 *
 * @property Estado $idPais
 * @property Pessoa[] $pessoas
 */
class Cidade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cidade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'id_estado', 'nome'], 'required'],
            [['id_pais', 'id_estado'], 'integer'],
            [['codigo_ibge'], 'string', 'max' => 10],
            [['nome'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pais' => 'Id Pais',
            'id_estado' => 'Id Estado',
            'id_cidade' => 'Id Cidade',
            'codigo_ibge' => 'Codigo Ibge',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais()
    {
        return $this->hasOne(Estado::className(), ['id_pais' => 'id_pais', 'id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(Pessoa::className(), ['id_cidade' => 'id_cidade', 'id_estado' => 'id_estado', 'id_pais' => 'id_pais']);
    }

    /**
     * @inheritdoc
     * @return CidadeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CidadeQuery(get_called_class());
    }
}
