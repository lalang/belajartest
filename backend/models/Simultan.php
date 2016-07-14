<?php

namespace backend\models;

use Yii;
use \backend\models\base\Simultan as BaseSimultan;

/**
 * This is the model class for table "simultan".
 */
class Simultan extends BaseSimultan {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['perizinan_parent_id', 'perizinan_child_id'], 'required'],
            [['perizinan_parent_id', 'perizinan_child_id'], 'integer']
        ];
    }

}
