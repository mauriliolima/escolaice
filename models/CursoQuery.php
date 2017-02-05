<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Curso]].
 *
 * @see Curso
 */
class CursoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Curso[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Curso|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}