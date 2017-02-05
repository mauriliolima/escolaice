<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Aluno]].
 *
 * @see Aluno
 */
class AlunoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Aluno[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Aluno|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}