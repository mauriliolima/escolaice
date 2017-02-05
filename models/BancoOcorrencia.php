<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banco_ocorrencia".
 *
 * @property integer $id_banco
 * @property integer $tipo_ocorrencia
 * @property string $cod_ocorrencia
 * @property string $descricao
 * @property boolean $confirma_baixa
 * @property boolean $confirma_registro
 * @property boolean $confirma_cancelamento
 * @property boolean $confirma_rejeicao
 * @property boolean $verifica_ocorrencia_2
 * @property boolean $verifica_ocorrencia_3
 */
class BancoOcorrencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banco_ocorrencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco', 'tipo_ocorrencia', 'cod_ocorrencia'], 'required'],
            [['id_banco', 'tipo_ocorrencia'], 'integer'],
            [['confirma_baixa', 'confirma_registro', 'confirma_cancelamento', 'confirma_rejeicao', 'verifica_ocorrencia_2', 'verifica_ocorrencia_3'], 'boolean'],
            [['cod_ocorrencia'], 'string', 'max' => 10],
            [['descricao'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id Banco',
            'tipo_ocorrencia' => 'Tipo Ocorrencia',
            'cod_ocorrencia' => 'Cod Ocorrencia',
            'descricao' => 'Descricao',
            'confirma_baixa' => 'Confirma Baixa',
            'confirma_registro' => 'Confirma Registro',
            'confirma_cancelamento' => 'Confirma Cancelamento',
            'confirma_rejeicao' => 'Confirma Rejeicao',
            'verifica_ocorrencia_2' => 'Verifica Ocorrencia 2',
            'verifica_ocorrencia_3' => 'Verifica Ocorrencia 3',
        ];
    }

    /**
     * @inheritdoc
     * @return BancoOcorrenciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BancoOcorrenciaQuery(get_called_class());
    }
}
