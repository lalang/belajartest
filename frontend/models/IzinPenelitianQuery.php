<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[IzinPenelitian]].
 *
 * @see IzinPenelitian
 */
class IzinPenelitianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPenelitian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPenelitian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}