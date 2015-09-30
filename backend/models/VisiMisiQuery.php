<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[VisiMisi]].
 *
 * @see VisiMisi
 */
class VisiMisiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return VisiMisi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VisiMisi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}