<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SubLanding2]].
 *
 * @see SubLanding2
 */
class SubLanding2Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SubLanding2[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SubLanding2|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}