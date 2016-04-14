<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinSkdp]].
 *
 * @see IzinSkdp
 */
class IzinSkdpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinSkdp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinSkdp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}