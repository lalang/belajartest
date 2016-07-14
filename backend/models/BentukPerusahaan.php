<?php

namespace backend\models;

use Yii;
use \backend\models\base\BentukPerusahaan as BaseBentukPerusahaan;

/**
 * This is the model class for table "bentuk_perusahaan".
 */
class BentukPerusahaan extends BaseBentukPerusahaan {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['urutan'], 'integer'],
            [['type', 'publish'], 'string'],
            [['nama'], 'string', 'max' => 100]
        ];
    }

}
