<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpPimpinan as BaseIzinTdpPimpinan;

/**
 * This is the model class for table "izin_tdp_pimpinan".
 */
class IzinTdpPimpinan extends BaseIzinTdpPimpinan {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['izin_tdp_id'], 'required'],
            [['izin_tdp_id', 'jabatan_id', 'kewarganegaraan_id', 'jabatan_lain_id', 'jml_lbr_saham'], 'integer'],
            [['tgllahir', 'mulai_jabat'], 'safe'],
            [['jml_rp_modal'], 'number'],
            [['nama_lengkap', 'tmplahir', 'alamat_lengkap', 'telepon'], 'string', 'max' => 200],
            [['kodepos'], 'string', 'max' => 10]
        ];
    }

}
