<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Negara]].
 *
 * @see Negara
 */
class NegaraQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Negara[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Negara|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}