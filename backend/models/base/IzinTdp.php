<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp".
 *
 * @property integer $id
 * @property integer $siup_id
 * @property integer $user_id
 * @property string $tdp_jenis_daftar
 * @property integer $tdp_pembaruan_ke
 * @property string $tdp_nama_kelompok
 * @property string $tdp_status_perusahaan
 * @property integer $tdp_id_perusahaan_induk
 * @property string $tdr_perusahaan_induk_no_tdp
 * @property string $tdp_id_lokasi_produk_unit
 * @property string $tdp_tanggal_mulai
 * @property string $tdp_jangka_waktu_berdiri
 * @property string $tdp_bentuk_kerja_sama
 * @property string $tdp_merek_dagang
 * @property string $tdp_merek_dagang_no
 * @property string $tdp_hak_paten
 * @property string $tdp_hak_paten_no
 * @property string $tdp_hak_cipta
 * @property string $tdp_hak_cipta_no
 * @property integer $izin_tdp_jum_dirut
 * @property integer $izin_tdp_jum_direktur
 * @property integer $izin_tdp_komisaris
 * @property integer $izin_tdp_akta_pendirian_no
 * @property string $izin_tdp_akta_pendirian_nama_notaris
 * @property string $izin_tdp_akta_pendirian_alamat
 * @property string $izin_tdp_akta_pendirian_tlpn
 * @property string $izin_tdp_akta_pendirian_tgl
 * @property integer $izin_tdp_akta_perubahan_no
 * @property string $izin_tdp_akta_perubahan_nama_notaris
 * @property string $izin_tdp_akta_perubahan_tgl
 * @property integer $izin_tdp_pengesahan_menkuham_no
 * @property string $izin_tdp_pengesahan_menkuham_tgl
 * @property integer $izin_tdp_persetujuan_menkuham_no
 * @property string $izin_tdp_persetujuan_menkuham_tgl
 * @property integer $izin_tdp_perubahan_anggaran_no
 * @property string $izin_tdp_perubahan_anggaran_tgl
 * @property integer $izin_tdp_perubahan_direksi_no
 * @property string $izin_tdp_perubahan_direksi_tgl
 * @property integer $izin_tdp_jum_pemegang_saham
 * @property string $izin_tdp_komoditi_pokok
 * @property string $izin_tdp_komoditi_lainsatu
 * @property string $izin_tdp_komoditi_laindua
 * @property double $izin_tdp_omset_pertahun_int
 * @property string $izin_tdp_omset_pertahun_string
 * @property integer $izin_tdp_jum_karyawan_wni
 * @property integer $izin_tdp_jum_karyawan_wna
 * @property string $izin_tdp_bidang_usaha
 * @property integer $izin_tdp_kapasitas_mesin_terpasang
 * @property string $izin_tdp_kapasitas_mesin_terpasang_satuan
 * @property integer $izin_tdp_kapasitas_mesin_produksi
 * @property string $izin_tdp_kapasitas_mesin_produksi_satuan
 * @property integer $izin_tdp_komponen_mesin_lokal
 * @property integer $izin_tdp_komponen_mesin_impor
 * @property string $izin_tdp_jenis_usaha
 * @property string $izin_tdp_jenis_perusahaan
 *
 * @property \backend\models\IzinSiup $siup
 * @property \backend\models\User $user
 * @property \backend\models\IzinTdpKantor[] $izinTdpKantors
 * @property \backend\models\IzinTdpKegiatan[] $izinTdpKegiatans
 * @property \backend\models\IzinTdpLeglain[] $izinTdpLeglains
 * @property \backend\models\IzinTdpPemegang[] $izinTdpPemegangs
 * @property \backend\models\IzinTdpPimpinan[] $izinTdpPimpinans
 */
class IzinTdp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'siup_id' => 'Nama Perusahaan yang Ingin Didaftarkan',
            'user_id' => 'User ID',
            'tdp_jenis_daftar' => 'Pendaftaran',
            'tdp_pembaruan_ke' => 'Pembaharuan/Perpanjangan ke-',
            'tdp_nama_kelompok' => 'Nama Kelompok Perusahaan/Group',
            'tdp_status_perusahaan' => 'Status Perusahaan',
            'tdp_id_perusahaan_induk' => 'Nama Perusahaan Induk',
            'tdr_perusahaan_induk_no_tdp' => 'No TDP Perusahaan Induk',
            'tdp_id_lokasi_produk_unit' => 'Lokasi Unit Produksi',
            'tdp_tanggal_mulai' => 'Tanggal Mulai Kegiatan',
            'tdp_jangka_waktu_berdiri' => 'Jangka Waktu Berdirinya Perusahaan',
            'tdp_bentuk_kerja_sama' => 'Bentuk Kerja Sama',
            'tdp_merek_dagang' => 'Merek Dagang',
            'tdp_merek_dagang_no' => 'Merek Dagang No',
            'tdp_hak_paten' => 'Pemegang Hak Paten',
            'tdp_hak_paten_no' => 'Pemegang Hak Paten No',
            'tdp_hak_cipta' => 'Pemegang Hak Cipta',
            'tdp_hak_cipta_no' => 'Pemegang Hak Cipta No',
            'izin_tdp_jum_dirut' => 'Jumlah Dirut',
            'izin_tdp_jum_direktur' => 'Jumlah Direktur',
            'izin_tdp_komisaris' => 'Jumlah Komisaris',
            'izin_tdp_akta_pendirian_no' => 'Izin Tdp Akta Pendirian No',
            'izin_tdp_akta_pendirian_nama_notaris' => 'Izin Tdp Akta Pendirian Nama Notaris',
            'izin_tdp_akta_pendirian_alamat' => 'Izin Tdp Akta Pendirian Alamat',
            'izin_tdp_akta_pendirian_tlpn' => 'Izin Tdp Akta Pendirian Tlpn',
            'izin_tdp_akta_pendirian_tgl' => 'Izin Tdp Akta Pendirian Tgl',
            'izin_tdp_akta_perubahan_no' => 'Izin Tdp Akta Perubahan No',
            'izin_tdp_akta_perubahan_nama_notaris' => 'Izin Tdp Akta Perubahan Nama Notaris',
            'izin_tdp_akta_perubahan_tgl' => 'Izin Tdp Akta Perubahan Tgl',
            'izin_tdp_pengesahan_menkuham_no' => 'Izin Tdp Pengesahan Menkuham No',
            'izin_tdp_pengesahan_menkuham_tgl' => 'Izin Tdp Pengesahan Menkuham Tgl',
            'izin_tdp_persetujuan_menkuham_no' => 'Izin Tdp Persetujuan Menkuham No',
            'izin_tdp_persetujuan_menkuham_tgl' => 'Izin Tdp Persetujuan Menkuham Tgl',
            'izin_tdp_perubahan_anggaran_no' => 'Izin Tdp Perubahan Anggaran No',
            'izin_tdp_perubahan_anggaran_tgl' => 'Izin Tdp Perubahan Anggaran Tgl',
            'izin_tdp_perubahan_direksi_no' => 'Izin Tdp Perubahan Direksi No',
            'izin_tdp_perubahan_direksi_tgl' => 'Izin Tdp Perubahan Direksi Tgl',
            'izin_tdp_jum_pemegang_saham' => 'Izin Tdp Jum Pemegang Saham',
            'izin_tdp_komoditi_pokok' => 'Izin Tdp Komoditi Pokok',
            'izin_tdp_komoditi_lainsatu' => 'Izin Tdp Komoditi Lainsatu',
            'izin_tdp_komoditi_laindua' => 'Izin Tdp Komoditi Laindua',
            'izin_tdp_omset_pertahun_int' => 'Izin Tdp Omset Pertahun Int',
            'izin_tdp_omset_pertahun_string' => 'Izin Tdp Omset Pertahun String',
            'izin_tdp_jum_karyawan_wni' => 'Izin Tdp Jum Karyawan Wni',
            'izin_tdp_jum_karyawan_wna' => 'Izin Tdp Jum Karyawan Wna',
            'izin_tdp_bidang_usaha' => 'Izin Tdp Bidang Usaha',
            'izin_tdp_kapasitas_mesin_terpasang' => 'Izin Tdp Kapasitas Mesin Terpasang',
            'izin_tdp_kapasitas_mesin_terpasang_satuan' => 'Izin Tdp Kapasitas Mesin Terpasang Satuan',
            'izin_tdp_kapasitas_mesin_produksi' => 'Izin Tdp Kapasitas Mesin Produksi',
            'izin_tdp_kapasitas_mesin_produksi_satuan' => 'Izin Tdp Kapasitas Mesin Produksi Satuan',
            'izin_tdp_komponen_mesin_lokal' => 'Izin Tdp Komponen Mesin Lokal',
            'izin_tdp_komponen_mesin_impor' => 'Izin Tdp Komponen Mesin Impor',
            'izin_tdp_jenis_usaha' => 'Izin Tdp Jenis Usaha',
            'izin_tdp_jenis_perusahaan' => 'Izin Tdp Jenis Perusahaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiup()
    {
        return $this->hasOne(\backend\models\IzinSiup::className(), ['id' => 'siup_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpKantors()
    {
        return $this->hasMany(\backend\models\IzinTdpKantor::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpKegiatans()
    {
        return $this->hasMany(\backend\models\IzinTdpKegiatan::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpLeglains()
    {
        return $this->hasMany(\backend\models\IzinTdpLeglain::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpPemegangs()
    {
        return $this->hasMany(\backend\models\IzinTdpPemegang::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpPimpinans()
    {
        return $this->hasMany(\backend\models\IzinTdpPimpinan::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpQuery(get_called_class());
    }
}
