<?php

namespace backend\models;

use Yii;
use \backend\models\base\SubLanding3 as BaseSubLanding3;

/**
 * This is the model class for table "sub_landing3".
 */
class SubLanding3 extends BaseSubLanding3 {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['info', 'info_en', 'target', 'urutan', 'link'], 'required'],
            [['info', 'info_en', 'target', 'publish'], 'string'],
            [['urutan'], 'integer'],
            [['icon'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 250]
        ];
    }

}
