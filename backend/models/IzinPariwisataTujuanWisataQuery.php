<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisataTujuanWisata]].
 *
 * @see IzinPariwisataTujuanWisata
 */
class IzinPariwisataTujuanWisataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisataTujuanWisata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisataTujuanWisata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}