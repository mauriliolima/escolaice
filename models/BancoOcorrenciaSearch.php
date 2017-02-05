<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BancoOcorrencia;

/**
 * BancoOcorrenciaSearch represents the model behind the search form about `app\models\BancoOcorrencia`.
 */
class BancoOcorrenciaSearch extends BancoOcorrencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco', 'tipo_ocorrencia'], 'integer'],
            [['cod_ocorrencia', 'descricao'], 'safe'],
            [['confirma_baixa', 'confirma_registro', 'confirma_cancelamento', 'confirma_rejeicao', 'verifica_ocorrencia_2', 'verifica_ocorrencia_3'], 'boolean'],
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
        $query = BancoOcorrencia::find();

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
            'tipo_ocorrencia' => $this->tipo_ocorrencia,
            'confirma_baixa' => $this->confirma_baixa,
            'confirma_registro' => $this->confirma_registro,
            'confirma_cancelamento' => $this->confirma_cancelamento,
            'confirma_rejeicao' => $this->confirma_rejeicao,
            'verifica_ocorrencia_2' => $this->verifica_ocorrencia_2,
            'verifica_ocorrencia_3' => $this->verifica_ocorrencia_3,
        ]);

        $query->andFilterWhere(['like', 'cod_ocorrencia', $this->cod_ocorrencia])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
