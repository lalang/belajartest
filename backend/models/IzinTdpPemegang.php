<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpPemegang as BaseIzinTdpPemegang;

/**
 * This is the model class for table "izin_tdp_pemegang".
 */
class IzinTdpPemegang extends BaseIzinTdpPemegang {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['izin_tdp_id', 'izin_tdp_pemegang_nama', 'izin_tdp_pemegang_alamat', 'izin_tdp_pemegang_kodepos', 'izin_tdp_pemegang_tlpn', 'izin_tdp_pemegang_kewarganegaraan', 'izin_tdp_pemegang_npwp', 'izin_tdp_pemegang_jum_saham', 'izin_tdp_pemegang_jum_modal'], 'required'],
            [['izin_tdp_id', 'izin_tdp_pemegang_jum_saham'], 'integer'],
            [['izin_tdp_pemegang_alamat'], 'string'],
            [['izin_tdp_pemegang_jum_modal'], 'number'],
            [['izin_tdp_pemegang_nama'], 'string', 'max' => 100],
            [['izin_tdp_pemegang_kodepos'], 'string', 'max' => 5],
            [['izin_tdp_pemegang_tlpn'], 'string', 'max' => 12],
            [['izin_tdp_pemegang_kewarganegaraan'], 'string', 'max' => 50],
            [['izin_tdp_pemegang_npwp'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

}
