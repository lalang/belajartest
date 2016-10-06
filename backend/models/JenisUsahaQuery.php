<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[JenisUsaha]].
 *
 * @see JenisUsaha
 */
class JenisUsahaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return JenisUsaha[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return JenisUsaha|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}