<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BerkasIzin]].
 *
 * @see BerkasIzin
 */
class BerkasIzinQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return BerkasIzin[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BerkasIzin|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}