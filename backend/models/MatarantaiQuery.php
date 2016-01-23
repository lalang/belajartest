<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Matarantai]].
 *
 * @see Matarantai
 */
class MatarantaiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Matarantai[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Matarantai|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}