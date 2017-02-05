<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Nivel]].
 *
 * @see Nivel
 */
class NivelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Nivel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Nivel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}