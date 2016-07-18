<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Package]].
 *
 * @see Package
 */
class PackageQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Package[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Package|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}