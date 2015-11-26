<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[DocUserMan]].
 *
 * @see DocUserMan
 */
class DocUserManQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DocUserMan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DocUserMan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}