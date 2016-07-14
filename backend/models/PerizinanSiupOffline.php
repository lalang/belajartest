<?php

namespace backend\models;

use Yii;
use \backend\models\base\PerizinanSiupOffline as BasePerizinanSiupOffline;

/**
 * This is the model class for table "perizinan_siup_offline".
 */
class PerizinanSiupOffline extends BasePerizinanSiupOffline {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['no_izin'], 'required'],
            [['pemilik_tanggal_lahir', 'created_date', 'updated_date'], 'safe'],
            [['no_izin', 'pemilik_nama', 'pemilik_tempat_lahir', 'pemilik_alamat_rumah', 'pemilik_propinsi', 'pemilik_kabupaten', 'pemilik_kecamatan', 'pemilik_kelurahan', 'pemilik_no_telpon', 'pemilik_no_ktp', 'pemilik_kewarganegaraan', 'perusahaan_nama', 'perusahaan_alamat', 'perusahaan_propinsi', 'perusahaan_kabupaten', 'perusahaan_kecamatan', 'perusahaan_kelurahan', 'perusahaan_kodepos', 'perusahaan_no_telpon', 'perusahaan_no_fax', 'perusahaan_email', 'created_by', 'updated_by'], 'string', 'max' => 200],
            [['no_izin'], 'unique']
        ];
    }

}
