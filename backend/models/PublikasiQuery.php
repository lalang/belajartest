<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Publikasi]].
 *
 * @see Publikasi
 */
class PublikasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Publikasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Publikasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}