<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TipeKamar]].
 *
 * @see TipeKamar
 */
class TipeKamarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TipeKamar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipeKamar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}