<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[FasilitasKamar]].
 *
 * @see FasilitasKamar
 */
class FasilitasKamarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return FasilitasKamar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FasilitasKamar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}