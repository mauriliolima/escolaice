<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Retorno]].
 *
 * @see Retorno
 */
class RetornoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Retorno[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Retorno|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}