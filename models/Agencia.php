<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agencia".
 *
 * @property integer $id_banco
 * @property integer $id_agencia
 * @property string $codigo_agencia
 * @property string $digito_agencia
 * @property string $nome
 * @property string $logradouro
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property integer $id_cidade
 * @property integer $id_estado
 * @property string $telefone1
 * @property string $telefone2
 * @property string $telefone3
 * @property string $email
 * @property string $inserido_por
 * @property string $inserido_em
 * @property string $alterado_por
 * @property string $alterado_em
 *
 * @property Banco $idBanco
 * @property ContaCorrente[] $contaCorrentes
 */
class Agencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco', 'codigo_agencia', 'digito_agencia', 'inserido_em'], 'required'],
            [['id_banco', 'id_cidade', 'id_estado'], 'integer'],
            [['inserido_em', 'alterado_em'], 'safe'],
            [['codigo_agencia'], 'string', 'max' => 5],
            [['digito_agencia'], 'string', 'max' => 1],
            [['nome', 'bairro'], 'string', 'max' => 45],
            [['logradouro', 'email'], 'string', 'max' => 100],
            [['numero'], 'string', 'max' => 10],
            [['complemento', 'inserido_por', 'alterado_por'], 'string', 'max' => 50],
            [['telefone1', 'telefone2', 'telefone3'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id Banco',
            'id_agencia' => 'Id Agencia',
            'codigo_agencia' => 'Codigo Agencia',
            'digito_agencia' => 'Digito Agencia',
            'nome' => 'Nome',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'id_cidade' => 'Id Cidade',
            'id_estado' => 'Id Estado',
            'telefone1' => 'Telefone1',
            'telefone2' => 'Telefone2',
            'telefone3' => 'Telefone3',
            'email' => 'Email',
            'inserido_por' => 'Inserido Por',
            'inserido_em' => 'Inserido Em',
            'alterado_por' => 'Alterado Por',
            'alterado_em' => 'Alterado Em',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBanco()
    {
        return $this->hasOne(Banco::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContaCorrentes()
    {
        return $this->hasMany(ContaCorrente::className(), ['id_banco' => 'id_banco', 'id_agencia' => 'id_agencia']);
    }

    /**
     * @inheritdoc
     * @return AgenciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgenciaQuery(get_called_class());
    }
}
