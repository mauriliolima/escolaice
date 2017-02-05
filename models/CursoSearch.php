<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;

/**
 * CursoSearch represents the model behind the search form about `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso'], 'integer'],
            [['nome', 'nome_reduzido', 'data_inicio'], 'safe'],
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
        $query = Curso::find();

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
            'id_curso' => $this->id_curso,
            'data_inicio' => $this->data_inicio,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'nome_reduzido', $this->nome_reduzido]);

        return $dataProvider;
    }
}