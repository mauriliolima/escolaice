<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivel".
 *
 * @property integer $id_curso
 * @property integer $id_nivel
 * @property string $nome
 * @property integer $ordem
 *
 * @property CurriculoItem[] $curriculoItems
 * @property Curso $idCurso
 */
class Nivel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso', 'nome', 'ordem'], 'required'],
            [['id_curso', 'ordem'], 'integer'],
            [['nome'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'id_nivel' => 'Id Nivel',
            'nome' => 'Nome',
            'ordem' => 'Ordem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurriculoItems()
    {
        return $this->hasMany(CurriculoItem::className(), ['id_curso' => 'id_curso', 'id_nivel' => 'id_nivel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @inheritdoc
     * @return NivelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NivelQuery(get_called_class());
    }
}
