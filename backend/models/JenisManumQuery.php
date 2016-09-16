<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[JenisManum]].
 *
 * @see JenisManum
 */
class JenisManumQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return JenisManum[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return JenisManum|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}