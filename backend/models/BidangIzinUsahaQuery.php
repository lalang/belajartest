<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BidangIzinUsaha]].
 *
 * @see BidangIzinUsaha
 */
class BidangIzinUsahaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BidangIzinUsaha[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BidangIzinUsaha|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}