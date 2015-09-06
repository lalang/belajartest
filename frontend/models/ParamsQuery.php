<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Params]].
 *
 * @see \app\models\Params
 */
class ParamsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Params[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Params|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}