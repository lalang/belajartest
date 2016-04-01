<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[GolonganGudang]].
 *
 * @see GolonganGudang
 */
class GolonganGudangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return GolonganGudang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GolonganGudang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}