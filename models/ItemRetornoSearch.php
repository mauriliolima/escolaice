<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemRetorno;

/**
 * ItemRetornoSearch represents the model behind the search form about `app\models\ItemRetorno`.
 */
class ItemRetornoSearch extends ItemRetorno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_retorno', 'id_item_retorno', 'id_banco_cobrador'], 'integer'],
            [['nosso_numero', 'numero_documento', 'data_pagamento', 'data_baixa', 'agencia_cobradora', 'codigo_ocorrencia_1', 'codigo_ocorrencia_2', 'codigo_ocorrencia_3', 'inserido_por', 'inserido_em', 'alterado_por', 'alterado_em'], 'safe'],
            [['valor_despesas_cobranca', 'valor_documento', 'valor_pago', 'valor_abatimento', 'valor_juros', 'valor_multa', 'valor_desconto'], 'number'],
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
        $query = ItemRetorno::find();

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
            'id_item_retorno' => $this->id_item_retorno,
            'data_pagamento' => $this->data_pagamento,
            'data_baixa' => $this->data_baixa,
            'id_banco_cobrador' => $this->id_banco_cobrador,
            'valor_despesas_cobranca' => $this->valor_despesas_cobranca,
            'valor_documento' => $this->valor_documento,
            'valor_pago' => $this->valor_pago,
            'valor_abatimento' => $this->valor_abatimento,
            'valor_juros' => $this->valor_juros,
            'valor_multa' => $this->valor_multa,
            'valor_desconto' => $this->valor_desconto,
            'inserido_em' => $this->inserido_em,
            'alterado_em' => $this->alterado_em,
        ]);

        $query->andFilterWhere(['like', 'nosso_numero', $this->nosso_numero])
            ->andFilterWhere(['like', 'numero_documento', $this->numero_documento])
            ->andFilterWhere(['like', 'agencia_cobradora', $this->agencia_cobradora])
            ->andFilterWhere(['like', 'codigo_ocorrencia_1', $this->codigo_ocorrencia_1])
            ->andFilterWhere(['like', 'codigo_ocorrencia_2', $this->codigo_ocorrencia_2])
            ->andFilterWhere(['like', 'codigo_ocorrencia_3', $this->codigo_ocorrencia_3])
            ->andFilterWhere(['like', 'inserido_por', $this->inserido_por])
            ->andFilterWhere(['like', 'alterado_por', $this->alterado_por]);

        return $dataProvider;
    }
}
