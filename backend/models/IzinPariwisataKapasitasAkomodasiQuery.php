<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisataKapasitasAkomodasi]].
 *
 * @see IzinPariwisataKapasitasAkomodasi
 */
class IzinPariwisataKapasitasAkomodasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisataKapasitasAkomodasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisataKapasitasAkomodasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}