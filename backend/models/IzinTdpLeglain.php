<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpLeglain as BaseIzinTdpLeglain;

/**
 * This is the model class for table "izin_tdp_leglain".
 */
class IzinTdpLeglain extends BaseIzinTdpLeglain {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['izin_tdp_id', 'izin_tdp_leglain_nama_petugas'], 'required'],
            [['izin_tdp_id'], 'integer'],
            [['izin_tdp_leglain_nama_petugas'], 'string', 'max' => 200],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

}
