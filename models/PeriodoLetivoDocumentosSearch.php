<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PeriodoLetivoDocumentos;

/**
 * PeriodoLetivoDocumentosSearch represents the model behind the search form about `app\models\PeriodoLetivoDocumentos`.
 */
class PeriodoLetivoDocumentosSearch extends PeriodoLetivoDocumentos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo_letivo', 'id_documento', 'quantidade'], 'integer'],
            [['obrigatorio'], 'safe'],
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
        $query = PeriodoLetivoDocumentos::find();

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
            'id_documento' => $this->id_documento,
            'quantidade' => $this->quantidade,
        ]);

        $query->andFilterWhere(['like', 'obrigatorio', $this->obrigatorio]);

        return $dataProvider;
    }
}
