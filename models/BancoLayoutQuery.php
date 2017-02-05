<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BancoLayout]].
 *
 * @see BancoLayout
 */
class BancoLayoutQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BancoLayout[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BancoLayout|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}