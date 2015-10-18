<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kantor]].
 *
 * @see Kantor
 */
class KantorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kantor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kantor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}