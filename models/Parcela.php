<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parcela".
 *
 * @property string $id_parcela
 * @property string $id_contrato
 * @property string $data_vencimento
 * @property string $competencia
 * @property string $valor
 * @property integer $id_servico
 * @property integer $numero_parcela
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 * @property boolean $cobrada
 *
 * @property ItemBoleto[] $itemBoletos
 * @property Contrato $idContrato
 * @property Servico $idServico
 */
class Parcela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parcela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contrato', 'data_vencimento', 'competencia', 'valor', 'id_servico', 'numero_parcela'], 'required'],
            [['id_contrato', 'id_servico', 'numero_parcela'], 'integer'],
            [['data_vencimento', 'competencia', 'inserido_em', 'alterado_em'], 'safe'],
            [['valor'], 'number'],
            [['cobrada'], 'boolean'],
            [['inserido_por', 'alterado_por'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_parcela' => 'Id Parcela',
            'id_contrato' => 'Id Contrato',
            'data_vencimento' => 'Data Vencimento',
            'competencia' => 'Competencia',
            'valor' => 'Valor',
            'id_servico' => 'Id Servico',
            'numero_parcela' => 'Numero Parcela',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
            'cobrada' => 'Cobrada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemBoletos()
    {
        return $this->hasMany(ItemBoleto::className(), ['id_parcela' => 'id_parcela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContrato()
    {
        return $this->hasOne(Contrato::className(), ['id_contrato' => 'id_contrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdServico()
    {
        return $this->hasOne(Servico::className(), ['id_servico' => 'id_servico']);
    }

    /**
     * @inheritdoc
     * @return ParcelaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParcelaQuery(get_called_class());
    }
}
