<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contrato".
 *
 * @property string $id_contrato
 * @property string $data_assinatura
 * @property string $data_matricula
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 * @property string $matricula
 * @property integer $id_plano_pagamento
 * @property integer $id_periodo_letivo
 * @property string $id_responsavel_financeiro
 *
 * @property Aluno $matricula0
 * @property PeriodoLetivo $idPeriodoLetivo
 * @property Pessoa $idResponsavelFinanceiro
 * @property PlanoPagamento $idPlanoPagamento
 * @property Parcela[] $parcelas
 */
class Contrato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contrato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_assinatura', 'data_matricula', 'inserido_em', 'alterado_em'], 'safe'],
            [['inserido_em', 'matricula', 'id_plano_pagamento', 'id_periodo_letivo', 'id_responsavel_financeiro'], 'required'],
            [['id_plano_pagamento', 'id_periodo_letivo', 'id_responsavel_financeiro'], 'integer'],
            [['inserido_por', 'alterado_por'], 'string', 'max' => 50],
            [['matricula'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contrato' => 'Id Contrato',
            'data_assinatura' => 'Data Assinatura',
            'data_matricula' => 'Data Matricula',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
            'matricula' => 'Matricula',
            'id_plano_pagamento' => 'Id Plano Pagamento',
            'id_periodo_letivo' => 'Id Periodo Letivo',
            'id_responsavel_financeiro' => 'Id Responsavel Financeiro',
        ];
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
    public function getIdPeriodoLetivo()
    {
        return $this->hasOne(PeriodoLetivo::className(), ['id_periodo_letivo' => 'id_periodo_letivo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdResponsavelFinanceiro()
    {
        return $this->hasOne(Pessoa::className(), ['id_pessoa' => 'id_responsavel_financeiro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlanoPagamento()
    {
        return $this->hasOne(PlanoPagamento::className(), ['id_plano_pagamento' => 'id_plano_pagamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParcelas()
    {
        return $this->hasMany(Parcela::className(), ['id_contrato' => 'id_contrato']);
    }

    /**
     * @inheritdoc
     * @return ContratoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContratoQuery(get_called_class());
    }
}
