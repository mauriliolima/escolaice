<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PeriodoLetivo;

/**
 * PeriodoLetivoSearch represents the model behind the search form about `app\models\PeriodoLetivo`.
 */
class PeriodoLetivoSearch extends PeriodoLetivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo_letivo'], 'integer'],
            [['descricao', 'data_inicio', 'data_fim'], 'safe'],
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
        $query = PeriodoLetivo::find();

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
            'id_periodo_letivo' => $this->id_periodo_letivo,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
