<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property integer $id_pais
 * @property string $nome
 *
 * @property Estado[] $estados
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'nome'], 'required'],
            [['id_pais'], 'integer'],
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
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstados()
    {
        return $this->hasMany(Estado::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @inheritdoc
     * @return PaisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaisQuery(get_called_class());
    }
}
