<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[KbliIzin]].
 *
 * @see KbliIzin
 */
class KbliIzinQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return KbliIzin[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KbliIzin|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}