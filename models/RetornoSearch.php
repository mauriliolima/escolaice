<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Retorno;

/**
 * RetornoSearch represents the model behind the search form about `app\models\Retorno`.
 */
class RetornoSearch extends Retorno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_retorno', 'id_conta_corrente', 'numero_linhas', 'total_registrado', 'total_baixado', 'total_rejeitado', 'id_agencia', 'id_banco'], 'integer'],
            [['nome_arquivo', 'data_retorno', 'inserido_por', 'inserido_em', 'alterado_por', 'alterado_em'], 'safe'],
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
        $query = Retorno::find();

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
            'id_retorno' => $this->id_retorno,
            'id_conta_corrente' => $this->id_conta_corrente,
            'numero_linhas' => $this->numero_linhas,
            'data_retorno' => $this->data_retorno,
            'total_registrado' => $this->total_registrado,
            'total_baixado' => $this->total_baixado,
            'total_rejeitado' => $this->total_rejeitado,
            'id_agencia' => $this->id_agencia,
            'id_banco' => $this->id_banco,
            'inserido_em' => $this->inserido_em,
            'alterado_em' => $this->alterado_em,
        ]);

        $query->andFilterWhere(['like', 'nome_arquivo', $this->nome_arquivo])
            ->andFilterWhere(['like', 'inserido_por', $this->inserido_por])
            ->andFilterWhere(['like', 'alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
