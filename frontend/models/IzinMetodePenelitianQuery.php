<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[IzinMetodePenelitian]].
 *
 * @see IzinMetodePenelitian
 */
class IzinMetodePenelitianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinMetodePenelitian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinMetodePenelitian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}