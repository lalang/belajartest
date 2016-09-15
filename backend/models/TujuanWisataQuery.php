<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TujuanWisata]].
 *
 * @see TujuanWisata
 */
class TujuanWisataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TujuanWisata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TujuanWisata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}