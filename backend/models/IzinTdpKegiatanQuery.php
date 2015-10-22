<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpKegiatan]].
 *
 * @see IzinTdpKegiatan
 */
class IzinTdpKegiatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinTdpKegiatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpKegiatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}