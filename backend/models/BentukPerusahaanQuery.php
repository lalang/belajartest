<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BentukPerusahaan]].
 *
 * @see BentukPerusahaan
 */
class BentukPerusahaanQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return BentukPerusahaan[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BentukPerusahaan|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}