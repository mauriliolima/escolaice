<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Documento]].
 *
 * @see Documento
 */
class DocumentoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Documento[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Documento|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}