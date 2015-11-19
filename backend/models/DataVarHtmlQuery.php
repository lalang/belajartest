<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[DataVarHtml]].
 *
 * @see DataVarHtml
 */
class DataVarHtmlQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DataVarHtml[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DataVarHtml|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}