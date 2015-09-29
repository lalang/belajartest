<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PerizinanBerkas]].
 *
 * @see PerizinanBerkas
 */
class PerizinanBerkasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PerizinanBerkas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PerizinanBerkas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}