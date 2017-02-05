<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MatriculaTurma;

/**
 * MatriculaTurmaSearch represents the model behind the search form about `app\models\MatriculaTurma`.
 */
class MatriculaTurmaSearch extends MatriculaTurma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula'], 'safe'],
            [['id_turma', 'id_curso', 'id_periodo_letivo', 'id_disciplina', 'id_nivel', 'faltas', 'id_situacao', 'id_curriculo'], 'integer'],
            [['nota'], 'number'],
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
        $query = MatriculaTurma::find();

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
            'id_turma' => $this->id_turma,
            'id_curso' => $this->id_curso,
            'id_periodo_letivo' => $this->id_periodo_letivo,
            'id_disciplina' => $this->id_disciplina,
            'id_nivel' => $this->id_nivel,
            'nota' => $this->nota,
            'faltas' => $this->faltas,
            'id_situacao' => $this->id_situacao,
            'id_curriculo' => $this->id_curriculo,
        ]);

        $query->andFilterWhere(['like', 'matricula', $this->matricula]);

        return $dataProvider;
    }
}
