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
            [['siup_id', 'user_id', 'tdp_jenis_daftar', 'tdp_pembaruan_ke', 'tdp_status_perusahaan', 'tdp_tanggal_mulai', 'tdp_jangka_waktu_berdiri', 'tdp_bentuk_kerja_sama', 'izin_tdp_akta_pendirian_no', 'izin_tdp_akta_pendirian_nama_notaris', 'izin_tdp_akta_pendirian_alamat', 'izin_tdp_akta_pendirian_tlpn', 'izin_tdp_akta_pendirian_tgl', 'izin_tdp_akta_perubahan_no', 'izin_tdp_akta_perubahan_nama_notaris', 'izin_tdp_akta_perubahan_tgl', 'izin_tdp_pengesahan_menkuham_no', 'izin_tdp_pengesahan_menkuham_tgl', 'izin_tdp_persetujuan_menkuham_no', 'izin_tdp_persetujuan_menkuham_tgl', 'izin_tdp_perubahan_anggaran_no', 'izin_tdp_perubahan_anggaran_tgl', 'izin_tdp_perubahan_direksi_no', 'izin_tdp_perubahan_direksi_tgl', 'izin_tdp_jum_pemegang_saham', 'izin_tdp_komoditi_pokok', 'izin_tdp_omset_pertahun_int', 'izin_tdp_omset_pertahun_string', 'izin_tdp_jum_karyawan_wni', 'izin_tdp_bidang_usaha', 'izin_tdp_jenis_perusahaan'], 'required'],
            [['siup_id', 'user_id', 'tdp_pembaruan_ke', 'tdp_id_perusahaan_induk', 'izin_tdp_jum_dirut', 'izin_tdp_jum_direktur', 'izin_tdp_komisaris', 'tdp_jangka_waktu_berdiri', 'izin_tdp_akta_pendirian_no', 'izin_tdp_akta_perubahan_no', 'izin_tdp_pengesahan_menkuham_no', 'izin_tdp_persetujuan_menkuham_no', 'izin_tdp_perubahan_anggaran_no', 'izin_tdp_perubahan_direksi_no', 'izin_tdp_jum_pemegang_saham', 'izin_tdp_jum_karyawan_wni', 'izin_tdp_jum_karyawan_wna', 'izin_tdp_kapasitas_mesin_terpasang', 'izin_tdp_kapasitas_mesin_produksi', 'izin_tdp_komponen_mesin_lokal', 'izin_tdp_komponen_mesin_impor'], 'integer'],
            [['tdp_jenis_daftar', 'tdp_status_perusahaan', 'tdp_bentuk_kerja_sama', 'izin_tdp_akta_pendirian_alamat', 'izin_tdp_bidang_usaha', 'izin_tdp_jenis_usaha', 'izin_tdp_jenis_perusahaan'], 'string'],
            [['tdp_tanggal_mulai', 'tdp_jangka_waktu_berdiri', 'izin_tdp_akta_pendirian_tgl', 'izin_tdp_akta_perubahan_tgl', 'izin_tdp_pengesahan_menkuham_tgl', 'izin_tdp_persetujuan_menkuham_tgl', 'izin_tdp_perubahan_anggaran_tgl', 'izin_tdp_perubahan_direksi_tgl'], 'safe'],
            [['izin_tdp_omset_pertahun_int'], 'number'],
            [['tdp_jangka_waktu_berdiri'], 'string', 'max' => 4],
            [['tdp_nama_kelompok', 'izin_tdp_omset_pertahun_string'], 'string', 'max' => 250],
            [['tdr_perusahaan_induk_no_tdp', 'tdp_merek_dagang_no', 'tdp_hak_paten_no', 'tdp_hak_cipta_no', 'izin_tdp_akta_pendirian_nama_notaris', 'izin_tdp_akta_perubahan_nama_notaris'], 'string', 'max' => 50],
            [['tdp_id_lokasi_produk_unit', 'tdp_merek_dagang', 'tdp_hak_paten', 'tdp_hak_cipta', 'izin_tdp_komoditi_pokok', 'izin_tdp_komoditi_lainsatu', 'izin_tdp_komoditi_laindua'], 'string', 'max' => 100],
            [['izin_tdp_akta_pendirian_tlpn'], 'string', 'max' => 12],
            [['izin_tdp_kapasitas_mesin_terpasang_satuan', 'izin_tdp_kapasitas_mesin_produksi_satuan'], 'string', 'max' => 15],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
