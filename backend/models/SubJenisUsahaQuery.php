<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SubJenisUsaha]].
 *
 * @see SubJenisUsaha
 */
class SubJenisUsahaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SubJenisUsaha[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SubJenisUsaha|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}