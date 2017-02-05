<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PlanoPagamentoCursoSerie]].
 *
 * @see PlanoPagamentoCursoSerie
 */
class PlanoPagamentoCursoSerieQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PlanoPagamentoCursoSerie[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PlanoPagamentoCursoSerie|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}