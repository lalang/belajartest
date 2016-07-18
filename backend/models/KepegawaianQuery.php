<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kepegawaian]].
 *
 * @see Kepegawaian
 */
class KepegawaianQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Kepegawaian[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kepegawaian|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}