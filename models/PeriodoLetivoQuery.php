<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PeriodoLetivo]].
 *
 * @see PeriodoLetivo
 */
class PeriodoLetivoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PeriodoLetivo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PeriodoLetivo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}