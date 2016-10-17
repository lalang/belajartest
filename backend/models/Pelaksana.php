<?php

namespace backend\models;

use Yii;
use \backend\models\base\Pelaksana as BasePelaksana;

/**
 * This is the model class for table "pelaksana".
 */
class Pelaksana extends BasePelaksana {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nama', 'warna', 'aktif', 'flag_ubah_tgl_exp', 'cetak_ulang_sk', 'cetak_batal',
            'cek_brankas', 'view_history','digital_signature'], 'required'],
            [['nama'], 'string', 'max' => 100],
            [['warna', 'aktif'], 'string', 'max' => 15]
        ];
    }

}
