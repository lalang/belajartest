<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisata]].
 *
 * @see IzinPariwisata
 */
class IzinPariwisataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}