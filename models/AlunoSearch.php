<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aluno;

/**
 * AlunoSearch represents the model behind the search form about `app\models\Aluno`.
 */
class AlunoSearch extends Aluno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'data_inclusao', 'usuario_inclusao', 'data_alteracao', 'usuario_alteracao'], 'safe'],
            [['id_pessoa', 'id_usuario', 'id_pessoa_responsavel', 'id_pessoa_responsavel_financeiro'], 'integer'],
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
        $query = Aluno::find();

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
            'id_usuario' => $this->id_usuario,
            'data_inclusao' => $this->data_inclusao,
            'data_alteracao' => $this->data_alteracao,
            'id_pessoa_responsavel' => $this->id_pessoa_responsavel,
            'id_pessoa_responsavel_financeiro' => $this->id_pessoa_responsavel_financeiro,
        ]);

        $query->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'usuario_inclusao', $this->usuario_inclusao])
            ->andFilterWhere(['like', 'usuario_alteracao', $this->usuario_alteracao]);

        return $dataProvider;
    }
}
