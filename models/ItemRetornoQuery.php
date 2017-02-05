<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ItemRetorno]].
 *
 * @see ItemRetorno
 */
class ItemRetornoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ItemRetorno[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemRetorno|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}