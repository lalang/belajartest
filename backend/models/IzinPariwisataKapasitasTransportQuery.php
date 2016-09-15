<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisataKapasitasTransport]].
 *
 * @see IzinPariwisataKapasitasTransport
 */
class IzinPariwisataKapasitasTransportQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisataKapasitasTransport[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisataKapasitasTransport|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}