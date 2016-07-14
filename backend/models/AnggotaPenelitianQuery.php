<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[AnggotaPenelitian]].
 *
 * @see AnggotaPenelitian
 */
class AnggotaPenelitianQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return AnggotaPenelitian[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AnggotaPenelitian|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}