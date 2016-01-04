<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPm1]].
 *
 * @see IzinPm1
 */
class IzinPm1Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPm1[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPm1|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}