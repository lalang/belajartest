<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MenuNavigasiMain]].
 *
 * @see MenuNavigasiMain
 */
class MenuNavigasiMainQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return MenuNavigasiMain[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MenuNavigasiMain|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}