<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPariwisataKbli]].
 *
 * @see IzinPariwisataKbli
 */
class IzinPariwisataKbliQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPariwisataKbli[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPariwisataKbli|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}