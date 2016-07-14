<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpPemegang]].
 *
 * @see IzinTdpPemegang
 */
class IzinTdpPemegangQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return IzinTdpPemegang[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpPemegang|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}