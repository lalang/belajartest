<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdp]].
 *
 * @see IzinTdp
 */
class IzinTdpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinTdp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}