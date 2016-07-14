<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpSaham as BaseIzinTdpSaham;

/**
 * This is the model class for table "izin_tdp_saham".
 */
class IzinTdpSaham extends BaseIzinTdpSaham {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['izin_tdp_id'], 'required'],
            [['izin_tdp_id', 'kewarganegaraan'], 'integer'],
            [['jumlah_saham', 'jumlah_modal'], 'number'],
            [['nama_lengkap', 'alamat'], 'string', 'max' => 200],
            [['kodepos'], 'string', 'max' => 10],
            [['no_telp', 'npwp'], 'string', 'max' => 50]
        ];
    }

}
