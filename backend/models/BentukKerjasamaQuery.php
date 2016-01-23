<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BentukKerjasama]].
 *
 * @see BentukKerjasama
 */
class BentukKerjasamaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BentukKerjasama[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BentukKerjasama|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}