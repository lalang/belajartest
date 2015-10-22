<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MenuNavSub]].
 *
 * @see MenuNavSub
 */
class MenuNavSubQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MenuNavSub[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuNavSub|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}