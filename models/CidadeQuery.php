<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cidade]].
 *
 * @see Cidade
 */
class CidadeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Cidade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cidade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}