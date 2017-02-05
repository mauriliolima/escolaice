<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Banco]].
 *
 * @see Banco
 */
class BancoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Banco[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Banco|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}