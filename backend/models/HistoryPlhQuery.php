<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[HistoryPlh]].
 *
 * @see HistoryPlh
 */
class HistoryPlhQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HistoryPlh[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HistoryPlh|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
}