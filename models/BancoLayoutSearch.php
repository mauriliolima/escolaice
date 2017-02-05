<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BancoLayout;

/**
 * BancoLayoutSearch represents the model behind the search form about `app\models\BancoLayout`.
 */
class BancoLayoutSearch extends BancoLayout
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco', 'header_cod_banco_ini', 'header_data_baixa_ini', 'header_data_baixa_cmp', 'header_data_compensacao_ini', 
			  'header_data_compensacao_cmp', 'nosso_numero_ini', 'nosso_numero_cmp', 'numero_documento_ini', 'numero_documento_cmp', 
			  'data_pagamento_ini', 'data_pagamento_cmp', 'data_baixa_ini', 'data_baixa_cmp', 'id_banco_cobrador_ini', 'id_banco_cobrador_cmp', 
			  'agencia_cobradora_ini', 'agencia_cobradora_cmp', 'valor_despesas_cobranca_ini', 'valor_despesas_cobranca_cmp', 'valor_documento_ini', 
			  'valor_documento_cmp', 'valor_pago_ini', 'valor_pago_cmp', 'valor_abatimento_ini', 'valor_abatimento_cmp', 'valor_juros_ini', 
			  'valor_juros_cmp', 'valor_multa_ini', 'valor_multa_cmp', 'valor_desconto_ini', 'valor_desconto_cmp', 'codigo_ocorrencia_1_ini', 
			  'codigo_ocorrencia_1_cmp', 'codigo_ocorrencia_2_ini', 'codigo_ocorrencia_2_cmp', 'codigo_ocorrencia_3_ini', 
			  'codigo_ocorrencia_3_cmp', 'identificador_tipo_linha_ini', 'identificador_tipo_linha_cmp'], 'integer'],
            [['header_data_baixa_formato', 'header_data_compensacao_formato', 'data_pagamento_formato', 'data_baixa_formato'], 'safe'],
			[['identificador_linha_header', 'identificador_linha_registro', 'identificador_linha_trailler'], 'string'],
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
        $query = BancoLayout::find();

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
            'header_cod_banco_ini' => $this->header_cod_banco_ini,
            'header_data_baixa_ini' => $this->header_data_baixa_ini,
            'header_data_baixa_cmp' => $this->header_data_baixa_cmp,
            'header_data_compensacao_ini' => $this->header_data_compensacao_ini,
            'header_data_compensacao_cmp' => $this->header_data_compensacao_cmp,
            'nosso_numero_ini' => $this->nosso_numero_ini,
            'nosso_numero_cmp' => $this->nosso_numero_cmp,
            'numero_documento_ini' => $this->numero_documento_ini,
            'numero_documento_cmp' => $this->numero_documento_cmp,
            'data_pagamento_ini' => $this->data_pagamento_ini,
            'data_pagamento_cmp' => $this->data_pagamento_cmp,
            'data_baixa_ini' => $this->data_baixa_ini,
            'data_baixa_cmp' => $this->data_baixa_cmp,
            'id_banco_cobrador_ini' => $this->id_banco_cobrador_ini,
            'id_banco_cobrador_cmp' => $this->id_banco_cobrador_cmp,
            'agencia_cobradora_ini' => $this->agencia_cobradora_ini,
            'agencia_cobradora_cmp' => $this->agencia_cobradora_cmp,
            'valor_despesas_cobranca_ini' => $this->valor_despesas_cobranca_ini,
            'valor_despesas_cobranca_cmp' => $this->valor_despesas_cobranca_cmp,
            'valor_documento_ini' => $this->valor_documento_ini,
            'valor_documento_cmp' => $this->valor_documento_cmp,
            'valor_pago_ini' => $this->valor_pago_ini,
            'valor_pago_cmp' => $this->valor_pago_cmp,
            'valor_abatimento_ini' => $this->valor_abatimento_ini,
            'valor_abatimento_cmp' => $this->valor_abatimento_cmp,
            'valor_juros_ini' => $this->valor_juros_ini,
            'valor_juros_cmp' => $this->valor_juros_cmp,
            'valor_multa_ini' => $this->valor_multa_ini,
            'valor_multa_cmp' => $this->valor_multa_cmp,
            'valor_desconto_ini' => $this->valor_desconto_ini,
            'valor_desconto_cmp' => $this->valor_desconto_cmp,
            'codigo_ocorrencia_1_ini' => $this->codigo_ocorrencia_1_ini,
            'codigo_ocorrencia_1_cmp' => $this->codigo_ocorrencia_1_cmp,
            'codigo_ocorrencia_2_ini' => $this->codigo_ocorrencia_2_ini,
            'codigo_ocorrencia_2_cmp' => $this->codigo_ocorrencia_2_cmp,
            'codigo_ocorrencia_3_ini' => $this->codigo_ocorrencia_3_ini,
            'codigo_ocorrencia_3_cmp' => $this->codigo_ocorrencia_3_cmp,
			'identificador_linha_header' => $this->identificador_linha_header, 
			'identificador_linha_registro' => $this->identificador_linha_registro, 
			'identificador_linha_trailler' => $this->identificador_linha_trailler,
			'identificador_tipo_linha_ini' => $this->identificador_tipo_linha_ini, 
			'identificador_tipo_linha_cmp' => $this->identificador_tipo_linha_cmp,
        ]);

        $query->andFilterWhere(['like', 'header_data_baixa_formato', $this->header_data_baixa_formato])
            ->andFilterWhere(['like', 'header_data_compensacao_formato', $this->header_data_compensacao_formato])
            ->andFilterWhere(['like', 'data_pagamento_formato', $this->data_pagamento_formato])
            ->andFilterWhere(['like', 'data_baixa_formato', $this->data_baixa_formato]);

        return $dataProvider;
    }
}
