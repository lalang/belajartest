<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[IzinKbli]].
 *
 * @see IzinKbli
 */
class IzinKbliQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return IzinKbli[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinKbli|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}