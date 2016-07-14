<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TitleSubLanding]].
 *
 * @see TitleSubLanding
 */
class TitleSubLandingQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return TitleSubLanding[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TitleSubLanding|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}