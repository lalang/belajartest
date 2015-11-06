<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[StatusPerusahaan]].
 *
 * @see StatusPerusahaan
 */
class StatusPerusahaanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return StatusPerusahaan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StatusPerusahaan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}