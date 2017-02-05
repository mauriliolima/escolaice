<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RelatorioHtml]].
 *
 * @see RelatorioHtml
 */
class RelatorioHtmlQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return RelatorioHtml[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RelatorioHtml|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}