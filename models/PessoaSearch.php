<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pessoa;

/**
 * PessoaSearch represents the model behind the search form about `app\models\Pessoa`.
 */
class PessoaSearch extends Pessoa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pessoa', 'id_pessoa_pai', 'id_pessoa_mae', 'id_cidade', 'id_estado', 'id_pais', 'cobranca_id_cidade', 'cobranca_id_estado', 'cobranca_id_pais'], 'integer'],
            [['tipo_pessoa', 'cpf_cnpj', 'nome', 'nome_fantasia', 'logradouro', 'numero', 'complemento', 'bairro', 'cep', 'numero_identidade', 'orgao_identidade', 'emissao_identidade', 'data_inclusao', 'usuario_inclusao', 'data_alteracao', 'usuario_alteracao', 'data_nascimento', 'email', 'cobranca_numero', 'cobranca_logradouro', 'cobranca_complemento', 'cobranca_bairro', 'cobranca_cep'], 'safe'],
            [['cobranca_mesmo_endereco'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pessoa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_pessoa' => $this->id_pessoa,
            'emissao_identidade' => $this->emissao_identidade,
            'data_inclusao' => $this->data_inclusao,
            'data_alteracao' => $this->data_alteracao,
            'id_pessoa_pai' => $this->id_pessoa_pai,
            'id_pessoa_mae' => $this->id_pessoa_mae,
            'data_nascimento' => $this->data_nascimento,
            'id_cidade' => $this->id_cidade,
            'id_estado' => $this->id_estado,
            'id_pais' => $this->id_pais,
            'cobranca_id_cidade' => $this->cobranca_id_cidade,
            'cobranca_id_estado' => $this->cobranca_id_estado,
            'cobranca_id_pais' => $this->cobranca_id_pais,
            'cobranca_mesmo_endereco' => $this->cobranca_mesmo_endereco,
        ]);

        $query->andFilterWhere(['like', 'tipo_pessoa', $this->tipo_pessoa])
            ->andFilterWhere(['like', 'cpf_cnpj', $this->cpf_cnpj])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'nome_fantasia', $this->nome_fantasia])
            ->andFilterWhere(['like', 'logradouro', $this->logradouro])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'complemento', $this->complemento])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'numero_identidade', $this->numero_identidade])
            ->andFilterWhere(['like', 'orgao_identidade', $this->orgao_identidade])
            ->andFilterWhere(['like', 'usuario_inclusao', $this->usuario_inclusao])
            ->andFilterWhere(['like', 'usuario_alteracao', $this->usuario_alteracao])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cobranca_numero', $this->cobranca_numero])
            ->andFilterWhere(['like', 'cobranca_logradouro', $this->cobranca_logradouro])
            ->andFilterWhere(['like', 'cobranca_complemento', $this->cobranca_complemento])
            ->andFilterWhere(['like', 'cobranca_bairro', $this->cobranca_bairro])
            ->andFilterWhere(['like', 'cobranca_cep', $this->cobranca_cep]);

        return $dataProvider;
    }
}
