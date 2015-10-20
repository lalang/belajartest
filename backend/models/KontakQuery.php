<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kontak]].
 *
 * @see Kontak
 */
class KontakQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Kontak[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kontak|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}