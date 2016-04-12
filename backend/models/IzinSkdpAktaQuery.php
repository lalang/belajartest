<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinSkdpAkta]].
 *
 * @see IzinSkdpAkta
 */
class IzinSkdpAktaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinSkdpAkta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinSkdpAkta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}