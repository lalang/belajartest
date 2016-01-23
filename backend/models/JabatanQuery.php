<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Jabatan]].
 *
 * @see Jabatan
 */
class JabatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Jabatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Jabatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}