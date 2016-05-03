<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinPenelitianLokasi]].
 *
 * @see IzinPenelitianLokasi
 */
class IzinPenelitianLokasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPenelitianLokasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPenelitianLokasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}