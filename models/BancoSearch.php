<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Banco;

/**
 * BancoSearch represents the model behind the search form about `app\models\Banco`.
 */
class BancoSearch extends Banco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco'], 'integer'],
            [['numero_febraban', 'nome', 'inserido_por', 'inserido_em', 'alterado_por', 'alterado_em'], 'safe'],
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
        $query = Banco::find();

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
            'id_banco' => $this->id_banco,
            'inserido_em' => $this->inserido_em,
            'alterado_em' => $this->alterado_em,
        ]);

        $query->andFilterWhere(['like', 'numero_febraban', $this->numero_febraban])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'inserido_por', $this->inserido_por])
            ->andFilterWhere(['like', 'alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
