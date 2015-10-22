<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MenuHome]].
 *
 * @see MenuHome
 */
class MenuHomeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MenuHome[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuHome|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}