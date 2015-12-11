<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdp as BaseIzinTdp;

/**
 * This is the model class for table "izin_tdp".
 */
class IzinTdp extends BaseIzinTdp
{
    
    /**
     * @inheritdoc
     */
	public $cek_unit_produksi;
    public function rules()
    {
        return [
            [['nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'propinsi', 'kota', 'kecamatan','kelurahan', 'telepon', 'ktp', 'kewarganegaraan', 
			'bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'tipe', 'perpanjangan_ke', 'iii_1_nama_kelompok', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_4_jumlah_bank', 'iii_7b_tgl_mulai_kegiatan', 'iii_9a_merek_dagang_nama', 'iii_9a_merek_dagang_nomor', 'iii_9b_hak_paten_nama', 'iii_9b_hak_paten_nomor', 'iii_9c_hak_cipta_nama', 'iii_9c_hak_cipta_nomor', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_notaris', 'iv_a4_nomor', 'iv_a4_tanggal', 'iv_a5_nomor', 'iv_a5_tanggal', 'iv_a6_nomor', 'iv_a6_tanggal', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'vi_jumlah_pemegang_saham'], 'required'],
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'perpanjangan_ke', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_jumlah_bank', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'vi_jumlah_pemegang_saham'], 'integer'],
            [['tipe', 'iii_2_status_prsh', 'iii_8_bentuk_kerjasama_pihak3'], 'string'],
            [['iii_7b_tgl_mulai_kegiatan', 'iv_a4_tanggal', 'iv_a5_tanggal', 'iv_a6_tanggal'], 'safe'],
            [['bentuk_perusahaan'], 'string', 'max' => 150],
            [['iii_1_nama_kelompok', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_9a_merek_dagang_nama', 'iii_9a_merek_dagang_nomor', 'iii_9b_hak_paten_nama', 'iii_9b_hak_paten_nomor', 'iii_9c_hak_cipta_nama', 'iii_9c_hak_cipta_nomor', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_notaris', 'iv_a4_nomor', 'iv_a5_nomor', 'iv_a6_nomor'], 'string', 'max' => 200],
			[['cek_unit_produksi'], 'string',]
        ];
    }
	
}
