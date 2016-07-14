<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpKantorcabang]].
 *
 * @see IzinTdpKantorcabang
 */
class IzinTdpKantorcabangQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return IzinTdpKantorcabang[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpKantorcabang|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}