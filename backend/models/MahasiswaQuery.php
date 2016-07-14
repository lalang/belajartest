<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Mahasiswa]].
 *
 * @see Mahasiswa
 */
class MahasiswaQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Mahasiswa[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Mahasiswa|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}