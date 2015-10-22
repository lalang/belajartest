<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MenuNavigasiSub]].
 *
 * @see MenuNavigasiSub
 */
class MenuNavigasiSubQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MenuNavigasiSub[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuNavigasiSub|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}