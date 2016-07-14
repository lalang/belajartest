<?php

namespace backend\models;

use Yii;
use \backend\models\base\NoIzin as BaseNoIzin;

/**
 * This is the model class for table "no_izin".
 */
class NoIzin extends BaseNoIzin {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['tahun', 'lokasi_id', 'izin_id', 'no_izin'], 'required'],
            [['tahun'], 'safe'],
            [['lokasi_id', 'izin_id', 'no_izin'], 'integer'],
                //[['lock'], 'default', 'value' => '0'],
                //[['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

}
