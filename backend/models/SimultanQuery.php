<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Simultan]].
 *
 * @see Simultan
 */
class SimultanQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Simultan[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Simultan|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}