<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cidade;

/**
 * CidadeSearch represents the model behind the search form about `app\models\Cidade`.
 */
class CidadeSearch extends Cidade
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'id_estado', 'id_cidade'], 'integer'],
            [['codigo_ibge', 'nome'], 'safe'],
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
        $query = Cidade::find();

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
            'id_cidade' => $this->id_cidade,
        ]);

        $query->andFilterWhere(['like', 'codigo_ibge', $this->codigo_ibge])
            ->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
