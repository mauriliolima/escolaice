<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Parametro]].
 *
 * @see Parametro
 */
class ParametroQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Parametro[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Parametro|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}