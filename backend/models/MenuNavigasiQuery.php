<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MenuNavigasi]].
 *
 * @see MenuNavigasi
 */
class MenuNavigasiQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return MenuNavigasi[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuNavigasi|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}