<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SubLanding3]].
 *
 * @see SubLanding3
 */
class SubLanding3Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SubLanding3[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SubLanding3|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}