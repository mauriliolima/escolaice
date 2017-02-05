<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BancoOcorrencia]].
 *
 * @see BancoOcorrencia
 */
class BancoOcorrenciaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BancoOcorrencia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BancoOcorrencia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}