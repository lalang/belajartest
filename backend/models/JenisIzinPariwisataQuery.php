<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[JenisIzinPariwisata]].
 *
 * @see JenisIzinPariwisata
 */
class JenisIzinPariwisataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return JenisIzinPariwisata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return JenisIzinPariwisata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}