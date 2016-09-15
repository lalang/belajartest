<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisataJenisManum]].
 *
 * @see IzinPariwisataJenisManum
 */
class IzinPariwisataJenisManumQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisataJenisManum[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisataJenisManum|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}