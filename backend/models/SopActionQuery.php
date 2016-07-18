<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SopAction]].
 *
 * @see SopAction
 */
class SopActionQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return SopAction[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SopAction|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}