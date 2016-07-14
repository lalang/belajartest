<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Popup]].
 *
 * @see Popup
 */
class PopupQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Popup[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Popup|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}