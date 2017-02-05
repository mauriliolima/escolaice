<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Parcela]].
 *
 * @see Parcela
 */
class ParcelaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Parcela[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Parcela|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}