<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpSaham]].
 *
 * @see IzinTdpSaham
 */
class IzinTdpSahamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinTdpSaham[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpSaham|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}