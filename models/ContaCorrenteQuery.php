<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ContaCorrente]].
 *
 * @see ContaCorrente
 */
class ContaCorrenteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ContaCorrente[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ContaCorrente|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}