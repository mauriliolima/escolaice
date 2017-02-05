<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property string $matricula
 * @property integer $id_pessoa
 * @property integer $id_usuario
 * @property string $data_inclusao
 * @property string $usuario_inclusao
 * @property string $data_alteracao
 * @property string $usuario_alteracao
 * @property integer $id_pessoa_responsavel
 * @property integer $id_pessoa_responsavel_financeiro
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'id_pessoa', 'usuario_inclusao', 'id_pessoa_responsavel', 'id_pessoa_responsavel_financeiro'], 'required'],
            [['id_pessoa', 'id_usuario', 'id_pessoa_responsavel', 'id_pessoa_responsavel_financeiro'], 'integer'],
            [['data_inclusao', 'data_alteracao'], 'safe'],
            [['matricula'], 'string', 'max' => 10],
            [['usuario_inclusao', 'usuario_alteracao'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'matricula' => 'Matricula',
            'id_pessoa' => 'Id Pessoa',
            'id_usuario' => 'Id Usuario',
            'data_inclusao' => 'Data Inclusao',
            'usuario_inclusao' => 'Usuario Inclusao',
            'data_alteracao' => 'Data Alteracao',
            'usuario_alteracao' => 'Usuario Alteracao',
            'id_pessoa_responsavel' => 'Id Pessoa Responsavel',
            'id_pessoa_responsavel_financeiro' => 'Id Pessoa Responsavel Financeiro',
        ];
    }

    /**
     * @inheritdoc
     * @return AlunoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlunoQuery(get_called_class());
    }
}
