<?php

namespace app\models;

use Yii;

/**
 * This is the ActiveQuery class for [[Estado]].
 *
 * @see Estado
 */
class TempAlunosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/
	
    /**
     * @inheritdoc
     * @return Estado[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Estado|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}