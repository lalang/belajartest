<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisataAkta]].
 *
 * @see IzinPariwisataAkta
 */
class IzinPariwisataAktaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisataAkta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisataAkta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}