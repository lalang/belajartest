<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpKantor]].
 *
 * @see IzinTdpKantor
 */
class IzinTdpKantorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinTdpKantor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpKantor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}