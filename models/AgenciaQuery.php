<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Agencia]].
 *
 * @see Agencia
 */
class AgenciaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Agencia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Agencia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}