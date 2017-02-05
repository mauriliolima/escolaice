<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo_letivo_documentos".
 *
 * @property integer $id_periodo_letivo
 * @property integer $id_documento
 * @property string $obrigatorio
 * @property integer $quantidade
 */
class PeriodoLetivoDocumentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodo_letivo_documentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo_letivo', 'id_documento'], 'required'],
            [['id_periodo_letivo', 'id_documento', 'quantidade'], 'integer'],
            [['obrigatorio'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_periodo_letivo' => 'Período Letivo',
            'id_documento' => 'Documento',
            'obrigatorio' => 'Obrigatório',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * @inheritdoc
     * @return PeriodoLetivoDocumentosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PeriodoLetivoDocumentosQuery(get_called_class());
    }
}
