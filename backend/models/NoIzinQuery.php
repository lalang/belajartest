<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[NoIzin]].
 *
 * @see NoIzin
 */
class NoIzinQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return NoIzin[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NoIzin|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}