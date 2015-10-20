<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpPimpinan as BaseIzinTdpPimpinan;

/**
 * This is the model class for table "izin_tdp_pimpinan".
 */
class IzinTdpPimpinan extends BaseIzinTdpPimpinan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'izin_tdp_pimpinan_kedudukan', 'izin_tdp_pimpinan_nama', 'izin_tdp_pimpinan', 'izin_tdp_pimpinan_tmpt_lahir', 'izin_tdp_pimpinan_tgl_lahir', 'izin_tdp_pimpinan_alamat', 'izin_tdp_pimpinan_kodepos', 'izin_tdp_pimpinan_tlpn', 'izin_tdp_pimpinan_kewarganegara', 'izin_tdp_pimpinan_tgl_mulai'], 'required'],
            [['id', 'izin_tdp_id', 'izin_tdp_pimpinan_kedudukan', 'izin_tdp_pimpinan'], 'integer'],
            [['izin_tdp_pimpinan_tgl_lahir', 'izin_tdp_pimpinan_tgl_mulai', 'izin_tdp_pimpinan_tgl_mulai_perusahaan'], 'safe'],
            [['izin_tdp_pimpinan_alamat', 'izin_tdp_pimpinan_alamat_perusahaan'], 'string'],
            [['izin_tdp_pimpinan_jum_modal'], 'number'],
            [['izin_tdp_pimpinan_nama', 'izin_tdp_pimpinan_nama_perusahaan'], 'string', 'max' => 100],
            [['izin_tdp_pimpinan_tmpt_lahir', 'izin_tdp_pimpinan_kewarganegara'], 'string', 'max' => 50],
            [['izin_tdp_pimpinan_kodepos', 'izin_tdp_pimpinan_kodepos_perusahaan'], 'string', 'max' => 5],
            [['izin_tdp_pimpinan_tlpn', 'izin_tdp_pimpinan_tlpn_perusahaan'], 'string', 'max' => 12],
            [['izin_tdp_pimpinan_jum_saham'], 'string', 'max' => 4],
            [['izin_tdp_pimpinan_kedudukan_lain'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
