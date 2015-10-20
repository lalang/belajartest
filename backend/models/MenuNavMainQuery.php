<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MenuNavMain]].
 *
 * @see MenuNavMain
 */
class MenuNavMainQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MenuNavMain[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuNavMain|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}