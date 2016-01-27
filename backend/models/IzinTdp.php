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
    public function rules()
    {
        return [
            [['bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id',  
              'i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_2_pemilik_tgl_lahir', 'i_3_pemilik_alamat', 
              'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'i_6_pemilik_kewarganegaraan', 'ii_1_perusahaan_nama', 
              'ii_2_perusahaan_alamat', 'ii_2_perusahaan_kodepos', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 
              'ii_2_perusahaan_email', 'iii_4_bank_utama_1', 'iii_4_jumlah_bank', 
              'iii_5_npwp', 'iii_6_status_perusahaan_id', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 
              'iv_a1_nomor', 'iv_a1_tanggal', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 
              'iv_a1_telpon', 'iv_a2_nomor', 'iv_a2_tanggal', 'iv_a2_notaris', 'iv_a3_nomor', 'iv_a3_tanggal', 'iv_a4_nomor', 
              'iv_a4_tanggal', 'iv_a5_nomor', 'iv_a5_tanggal', 'iv_a6_nomor', 'iv_a6_tanggal', 'v_jumlah_dirut', 
              'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 
              'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham', 
              'vii_b_omset', 'vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal', 
              'vii_c6_aktif', 'vii_c7_pasif', 'vii_d_totalaset', 'vii_e_wni', 'vii_e_wna', 'vii_f_matarantai', 'vii_fa_jumlah', 
              'vii_fa_satuan', 'viii_jenis_perusahaan', 'create_by', 'create_date', 'update_by', 'update_date'], 'required'],
            
            [['i_3_pemilik_propinsi', 'i_3_pemilik_kabupaten', 'i_3_pemilik_kecamatan', 'i_3_pemilik_kelurahan', 
              'ii_2_perusahaan_propinsi', 'ii_2_perusahaan_kabupaten', 'ii_2_perusahaan_kecamatan', 'ii_2_perusahaan_kelurahan',
              'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 
              'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten',
              'iii_4_bank_utama_2', 'vii_fb_jumlah', 'vii_fb_satuan', 'vii_fc_lokal', 'vii_fc_impor', 'vii_f_pengecer', 
              'iii_3_lokasi_unit_produksi', 'perpanjangan_ke', 'iii_1_nama_kelompok', 'iii_8_bentuk_kerjasama_pihak3',
             ], 'safe'],
            [['bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'perpanjangan_ke', 'i_3_pemilik_propinsi', 'i_3_pemilik_kabupaten', 'i_3_pemilik_kecamatan', 'i_3_pemilik_kelurahan', 'i_6_pemilik_kewarganegaraan', 'ii_2_perusahaan_propinsi', 'ii_2_perusahaan_kabupaten', 'ii_2_perusahaan_kecamatan', 'ii_2_perusahaan_kelurahan', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_4_jumlah_bank', 'iii_6_status_perusahaan_id', 'iii_8_bentuk_kerjasama_pihak3', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham', 'vii_e_wni', 'vii_e_wna', 'vii_f_matarantai', 'vii_fa_satuan', 'vii_fb_satuan', 'viii_jenis_perusahaan', 'create_by', 'update_by','vii_3_koperasi_anggota'], 'integer'],
            [['i_2_pemilik_tgl_lahir', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'iv_a1_tanggal', 'iv_a2_tanggal', 'iv_a3_tanggal', 'iv_a4_tanggal', 'iv_a5_tanggal', 'iv_a6_tanggal', 'create_date', 'update_date'], 'safe'],
            [['iii_2_status_prsh', 'vii_f_pengecer','vii_1_koperasi_bentuk','vii_2_koperasi_jenis', 'iii_9a_merek_dagang_nama'
              , 'iii_9a_merek_dagang_nomor', 'iii_9b_hak_paten_nama', 'iii_9b_hak_paten_nomor', 'iii_9c_hak_cipta_nama', 'iii_9c_hak_cipta_nomor'
             ], 'string'],
            [['vii_b_omset', 'vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal', 'vii_c6_aktif', 'vii_c7_pasif', 'vii_d_totalaset', 'vii_fa_jumlah', 'vii_fb_jumlah', 'vii_fc_lokal', 'vii_fc_impor'], 'number'],
            [['i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_3_pemilik_alamat', 'i_5_pemilik_no_ktp', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_1_nama_kelompok', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_9a_merek_dagang_nama', 'iii_9a_merek_dagang_nomor', 'iii_9b_hak_paten_nama', 'iii_9b_hak_paten_nomor', 'iii_9c_hak_cipta_nama', 'iii_9c_hak_cipta_nomor', 'iv_a1_nomor', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_nomor', 'iv_a2_notaris', 'iv_a3_nomor', 'iv_a4_nomor', 'iv_a5_nomor', 'iv_a6_nomor', 'vii_b_terbilang'], 'string', 'max' => 200],
            [['ii_2_perusahaan_kodepos', 'iii_5_npwp','no_sk_siup','no_pembukuan'], 'string', 'max' => 50],
            [['i_4_pemilik_telepon'], 'string', 'max' => 15]
        ];
    }
	
}
