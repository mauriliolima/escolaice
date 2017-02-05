<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matricula_turma".
 *
 * @property string $matricula
 * @property integer $id_turma
 * @property integer $id_curso
 * @property integer $id_periodo_letivo
 * @property string $id_disciplina
 * @property integer $id_nivel
 * @property string $nota
 * @property integer $faltas
 * @property string $id_situacao
 * @property integer $id_curriculo
 *
 * @property Avaliacao[] $avaliacaos
 * @property Aluno $matricula0
 * @property Situacao $idSituacao
 * @property TurmaDisciplina $idTurma
 */
class MatriculaTurma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matricula_turma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'id_turma', 'id_curso', 'id_periodo_letivo', 'id_disciplina', 'id_nivel', 'id_situacao', 'id_curriculo'], 'required'],
            [['id_turma', 'id_curso', 'id_periodo_letivo', 'id_disciplina', 'id_nivel', 'faltas', 'id_situacao', 'id_curriculo'], 'integer'],
            [['nota'], 'number'],
            [['matricula'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'matricula' => 'Matricula',
            'id_turma' => 'Id Turma',
            'id_curso' => 'Id Curso',
            'id_periodo_letivo' => 'Id Periodo Letivo',
            'id_disciplina' => 'Id Disciplina',
            'id_nivel' => 'Id Nivel',
            'nota' => 'Nota',
            'faltas' => 'Faltas',
            'id_situacao' => 'Id Situacao',
            'id_curriculo' => 'Id Curriculo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaos()
    {
        return $this->hasMany(Avaliacao::className(), ['matricula' => 'matricula', 'id_turma' => 'id_turma', 'id_curso' => 'id_curso', 'id_periodo_letivo' => 'id_periodo_letivo', 'id_disciplina' => 'id_disciplina', 'id_nivel' => 'id_nivel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatricula0()
    {
        return $this->hasOne(Aluno::className(), ['matricula' => 'matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSituacao()
    {
        return $this->hasOne(Situacao::className(), ['id_situacao' => 'id_situacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurma()
    {
        return $this->hasOne(TurmaDisciplina::className(), ['id_turma' => 'id_turma', 'id_curso' => 'id_curso', 'id_periodo_letivo' => 'id_periodo_letivo', 'id_disciplina' => 'id_disciplina', 'id_nivel' => 'id_nivel', 'id_curriculo' => 'id_curriculo']);
    }

    /**
     * @inheritdoc
     * @return MatriculaTurmaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MatriculaTurmaQuery(get_called_class());
    }
}
