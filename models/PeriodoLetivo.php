<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo_letivo".
 *
 * @property integer $id_periodo_letivo
 * @property string $descricao
 * @property string $data_inicio
 * @property string $data_fim
 *
 * @property PlanoPagamento $planoPagamento
 * @property Turma[] $turmas
 */
class PeriodoLetivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodo_letivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao', 'data_inicio'], 'required'],
            [['descricao'], 'string'],
            [['data_inicio', 'data_fim'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_periodo_letivo' => 'Id Periodo Letivo',
            'descricao' => 'Descricao',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoPagamento()
    {
        return $this->hasOne(PlanoPagamento::className(), ['id_periodo_letivo' => 'id_periodo_letivo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmas()
    {
        return $this->hasMany(Turma::className(), ['id_periodo_letivo' => 'id_periodo_letivo']);
    }

    /**
     * @inheritdoc
     * @return PeriodoLetivoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PeriodoLetivoQuery(get_called_class());
    }
}
