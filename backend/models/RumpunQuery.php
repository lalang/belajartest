<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Rumpun]].
 *
 * @see Rumpun
 */
class RumpunQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Rumpun[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rumpun|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}