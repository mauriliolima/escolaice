<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PrefixoEndereco]].
 *
 * @see PrefixoEndereco
 */
class PrefixoEnderecoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PrefixoEndereco[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PrefixoEndereco|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}