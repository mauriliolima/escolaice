<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MatriculaTurma]].
 *
 * @see MatriculaTurma
 */
class MatriculaTurmaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MatriculaTurma[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MatriculaTurma|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}