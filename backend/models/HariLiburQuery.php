<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[HariLibur]].
 *
 * @see HariLibur
 */
class HariLiburQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HariLibur[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HariLibur|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}