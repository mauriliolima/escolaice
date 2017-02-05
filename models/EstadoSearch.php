<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estado;

/**
 * EstadoSearch represents the model behind the search form about `app\models\Estado`.
 */
class EstadoSearch extends Estado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'id_estado'], 'integer'],
            [['nome', 'sigla'], 'safe'],
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
        $query = Estado::find();

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
            'id_pais' => $this->id_pais,
            'id_estado' => $this->id_estado,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sigla', $this->sigla]);

        return $dataProvider;
    }
}
