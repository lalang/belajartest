<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Sop]].
 *
 * @see Sop
 */
class SopQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Sop[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sop|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}