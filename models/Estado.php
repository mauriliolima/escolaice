<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id_pais
 * @property integer $id_estado
 * @property string $nome
 *
 * @property Cidade[] $cidades
 * @property Pais $idPais
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'id_estado', 'nome'], 'required'],
            [['id_pais', 'id_estado'], 'integer'],
            [['nome'], 'string', 'max' => 20]
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
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidades()
    {
        return $this->hasMany(Cidade::className(), ['id_pais' => 'id_pais', 'id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais()
    {
        return $this->hasOne(Pais::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @inheritdoc
     * @return EstadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstadoQuery(get_called_class());
    }
}
