<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[NoPenolakan]].
 *
 * @see NoPenolakan
 */
class NoPenolakanQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return NoPenolakan[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NoPenolakan|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}