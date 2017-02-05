<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property string $id_curso
 * @property string $nome
 * @property string $nome_reduzido
 * @property string $data_inicio
 *
 * @property Turma[] $turmas
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome', 'nome_reduzido'], 'string'],
            [['data_inicio'], 'safe'],
			[['data_inicio'], 'date', 'format' => 'd-M-yyyy']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'nome' => 'Nome',
            'nome_reduzido' => 'Nome Reduzido',
            'data_inicio' => 'Data Inicio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmas()
    {
        return $this->hasMany(Turma::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @inheritdoc
     * @return CursoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CursoQuery(get_called_class());
    }
}
