<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property string $id_pessoa
 * @property string $tipo_pessoa
 * @property string $cpf_cnpj
 * @property string $nome
 * @property string $nome_fantasia
 * @property string $logradouro
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cep
 * @property string $numero_identidade
 * @property string $orgao_identidade
 * @property string $emissao_identidade
 * @property string $data_inclusao
 * @property string $usuario_inclusao
 * @property string $data_alteracao
 * @property string $usuario_alteracao
 * @property string $id_pessoa_pai
 * @property string $id_pessoa_mae
 * @property string $data_nascimento
 * @property integer $id_cidade
 * @property integer $id_estado
 * @property integer $id_pais
 * @property string $email
 * @property string $cobranca_numero
 * @property string $cobranca_logradouro
 * @property string $cobranca_complemento
 * @property string $cobranca_bairro
 * @property string $cobranca_cep
 * @property integer $cobranca_id_cidade
 * @property integer $cobranca_id_estado
 * @property integer $cobranca_id_pais
 * @property boolean $cobranca_mesmo_endereco
 *
 * @property Aluno[] $alunos
 * @property Aluno[] $alunos0
 * @property Aluno[] $alunos1
 * @property Funcionario[] $funcionarios
 * @property Cidade $idCidade
 * @property Pessoa $idPessoaPai
 * @property Pessoa[] $pessoas
 * @property Pessoa $idPessoaMae
 * @property Pessoa[] $pessoas0
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pessoa';
    }


const SCENARIO_ALUNO = 'aluno';
	const SCENARIO_RESPONSAVEL = 'responsavel';
	
	public function scenarios()
	{
		return[
			self::SCENARIO_ALUNO => ['bairro', 'cep', 'cobranca_bairro', 'cobranca_cep', 'cobranca_complemento', 'cobranca_id_cidade', 'cobranca_id_estado', 'cobranca_id_pais', 'cobranca_logradouro', 'cobranca_mesmo_endereco', 'cobranca_numero', 'complemento', 'cpf_cnpj', 'data_alteracao', 'data_inclusao', 'data_nascimento', 'email', 'emissao_identidade', 'id_cidade', 'id_estado', 'id_pais', 'id_pessoa_mae', 'id_pessoa_pai', 'logradouro', 'nome', 'nome_fantasia', 'numero', 'numero_identidade', 'orgao_identidade', 'tipo_pessoa', 'usuario_alteracao'],
			self::SCENARIO_RESPONSAVEL => ['bairro', 'cep', 'cobranca_bairro', 'cobranca_cep', 'cobranca_complemento', 'cobranca_id_cidade', 'cobranca_id_estado', 'cobranca_id_pais', 'cobranca_logradouro', 'cobranca_mesmo_endereco', 'cobranca_numero', 'complemento', 'cpf_cnpj', 'data_alteracao', 'data_inclusao', 'data_nascimento', 'email', 'emissao_identidade', 'id_cidade', 'id_estado', 'id_pais', 'id_pessoa_mae', 'id_pessoa_pai', 'logradouro', 'nome', 'nome_fantasia', 'numero', 'numero_identidade', 'orgao_identidade', 'tipo_pessoa', 'usuario_alteracao'],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_pessoa', 'nome', 'usuario_inclusao', 'id_pessoa_mae', 'id_cidade', 'id_estado', 'id_pais', 'data_nascimento', 'logradouro', 'bairro', 'numero', 'cep' ], 'required', 'message' => '{attribute} é obrigatório', 'on' => self::SCENARIO_ALUNO],
            [['tipo_pessoa', 'nome', 'usuario_inclusao', 'cpf_cnpj', 'id_cidade', 'id_estado', 'id_pais', 'logradouro', 'bairro', 'numero', 'cep' ], 'required', 'message' => '{attribute} é obrigatório', 'on' => self::SCENARIO_RESPONSAVEL],
            [['emissao_identidade', 'data_inclusao', 'data_alteracao', 'data_nascimento'], 'safe'],
            [['id_pessoa_pai', 'id_pessoa_mae', 'id_cidade', 'id_estado', 'id_pais', 'cobranca_id_cidade', 'cobranca_id_estado', 'cobranca_id_pais'], 'integer'],
            [['cobranca_mesmo_endereco'], 'boolean'],
            [['tipo_pessoa'], 'string', 'max' => 1],
            [['cpf_cnpj'], 'string', 'max' => 18],
            [['nome', 'nome_fantasia'], 'string', 'max' => 150],
            [['logradouro', 'complemento', 'bairro', 'cobranca_logradouro', 'cobranca_complemento', 'cobranca_bairro'], 'string', 'max' => 50],
            [['numero', 'numero_identidade', 'orgao_identidade', 'usuario_inclusao', 'usuario_alteracao', 'cobranca_numero'], 'string', 'max' => 20],
            [['cep', 'cobranca_cep'], 'string', 'max' => 9],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pessoa' => 'Id Pessoa',
            'tipo_pessoa' => 'Pessoa',
            'cpf_cnpj' => 'Cpf Cnpj',
            'nome' => 'Nome',
            'nome_fantasia' => 'Nome Fantasia',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cep' => 'Cep',
            'numero_identidade' => 'Numero da Identidade',
            'orgao_identidade' => 'Orgão Emissor',
            'emissao_identidade' => 'Data de Emissao',
            'data_inclusao' => 'Data Inclusao',
            'usuario_inclusao' => 'Usuario Inclusao',
            'data_alteracao' => 'Data Alteracao',
            'usuario_alteracao' => 'Usuario Alteracao',
            'id_pessoa_pai' => 'Pai',
            'id_pessoa_mae' => 'Mae',
            'data_nascimento' => 'Data Nascimento',
            'id_cidade' => 'Cidade',
            'id_estado' => 'Estado',
            'id_pais' => 'País',
            'email' => 'Email',
            'cobranca_numero' => 'Cobranca Numero',
            'cobranca_logradouro' => 'Cobranca Logradouro',
            'cobranca_complemento' => 'Cobranca Complemento',
            'cobranca_bairro' => 'Cobranca Bairro',
            'cobranca_cep' => 'Cobranca Cep',
            'cobranca_id_cidade' => 'Cobranca Id Cidade',
            'cobranca_id_estado' => 'Cobranca Id Estado',
            'cobranca_id_pais' => 'Cobranca Id Pais',
            'cobranca_mesmo_endereco' => 'Cobranca Mesmo Endereco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos()
    {
        return $this->hasMany(Aluno::className(), ['id_pessoa' => 'id_pessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos0()
    {
        return $this->hasMany(Aluno::className(), ['id_pessoa_responsavel' => 'id_pessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunos1()
    {
        return $this->hasMany(Aluno::className(), ['id_pessoa_responsavel_financeiro' => 'id_pessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['id_pessoa' => 'id_pessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCidade()
    {
        return $this->hasOne(Cidade::className(), ['id_cidade' => 'id_cidade', 'id_estado' => 'id_estado', 'id_pais' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPessoaPai()
    {
        return $this->hasOne(Pessoa::className(), ['id_pessoa' => 'id_pessoa_pai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(Pessoa::className(), ['id_pessoa_pai' => 'id_pessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPessoaMae()
    {
        return $this->hasOne(Pessoa::className(), ['id_pessoa' => 'id_pessoa_mae']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas0()
    {
        return $this->hasMany(Pessoa::className(), ['id_pessoa_mae' => 'id_pessoa']);
    }

    /**
     * @inheritdoc
     * @return PessoaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PessoaQuery(get_called_class());
    }
}
