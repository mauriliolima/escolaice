<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plano_pagamento_curso_serie".
 *
 * @property string $id_plano_pagamento_curso_serie
 * @property integer $id_plano_pagamento
 * @property integer $id_curso
 * @property integer $id_nivel
 *
 * @property PlanoPagamento $idPlanoPagamento
 */
class PlanoPagamentoCursoSerie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plano_pagamento_curso_serie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plano_pagamento', 'id_curso', 'id_nivel'], 'required'],
            [['id_plano_pagamento', 'id_curso', 'id_nivel'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_plano_pagamento_curso_serie' => 'Id Plano Pagamento Curso Serie',
            'id_plano_pagamento' => 'Id Plano Pagamento',
            'id_curso' => 'Id Curso',
            'id_nivel' => 'Id Nivel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlanoPagamento()
    {
        return $this->hasOne(PlanoPagamento::className(), ['id_plano_pagamento' => 'id_plano_pagamento']);
    }

    /**
     * @inheritdoc
     * @return PlanoPagamentoCursoSerieQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlanoPagamentoCursoSerieQuery(get_called_class());
    }
}
