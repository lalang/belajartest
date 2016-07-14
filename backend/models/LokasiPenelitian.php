<?php

namespace backend\models;

use Yii;
use \backend\models\base\LokasiPenelitian as BaseLokasiPenelitian;

/**
 * This is the model class for table "lokasi_penelitian".
 */
class LokasiPenelitian extends BaseLokasiPenelitian {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['penelitian_id', 'lokasi_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

}
