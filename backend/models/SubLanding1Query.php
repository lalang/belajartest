<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SubLanding1]].
 *
 * @see SubLanding1
 */
class SubLanding1Query extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return SubLanding1[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SubLanding1|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}