<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinKesehatanJadwalDua]].
 *
 * @see IzinKesehatanJadwalDua
 */
class IzinKesehatanJadwalDuaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinKesehatanJadwalDua[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinKesehatanJadwalDua|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}