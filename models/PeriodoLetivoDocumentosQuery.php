<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PeriodoLetivoDocumentos]].
 *
 * @see PeriodoLetivoDocumentos
 */
class PeriodoLetivoDocumentosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PeriodoLetivoDocumentos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PeriodoLetivoDocumentos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}