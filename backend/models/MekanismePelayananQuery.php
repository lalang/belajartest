<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MekanismePelayanan]].
 *
 * @see MekanismePelayanan
 */
class MekanismePelayananQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MekanismePelayanan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MekanismePelayanan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}