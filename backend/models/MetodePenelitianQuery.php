<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MetodePenelitian]].
 *
 * @see MetodePenelitian
 */
class MetodePenelitianQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return MetodePenelitian[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MetodePenelitian|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}