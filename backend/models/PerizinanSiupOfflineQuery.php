<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PerizinanSiupOffline]].
 *
 * @see PerizinanSiupOffline
 */
class PerizinanSiupOfflineQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PerizinanSiupOffline[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PerizinanSiupOffline|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}