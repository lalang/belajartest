<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinTdpLegal]].
 *
 * @see IzinTdpLegal
 */
class IzinTdpLegalQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return IzinTdpLegal[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinTdpLegal|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}