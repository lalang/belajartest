<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpPimpinan]].
 *
 * @see IzinTdpPimpinan
 */
class IzinTdpPimpinanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinTdpPimpinan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpPimpinan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}