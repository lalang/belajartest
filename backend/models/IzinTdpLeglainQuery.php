<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpLeglain]].
 *
 * @see IzinTdpLeglain
 */
class IzinTdpLeglainQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return IzinTdpLeglain[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpLeglain|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}