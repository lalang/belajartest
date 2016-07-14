<?php

namespace backend\models;

use Yii;
use \backend\models\base\BentukKerjasama as BaseBentukKerjasama;

/**
 * This is the model class for table "bentuk_kerjasama".
 */
class BentukKerjasama extends BaseBentukKerjasama {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 200]
        ];
    }

}
