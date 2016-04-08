<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdg".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $status_id
 * @property string $tipe
 * @property string $pemilik_nik
 * @property string $pemilik_pengenal
 * @property string $pemilik_nama
 * @property string $pemilik_alamat
 * @property string $pemilik_rt
 * @property string $pemilik_rw
 * @property string $pemilik_propinsi
 * @property string $pemilik_kabupaten
 * @property string $pemilik_kecamatan
 * @property string $pemilik_kelurahan
 * @property string $pemilik_kodepos
 * @property string $pemilik_telepon
 * @property string $pemilik_fax
 * @property string $pemilik_email
 * @property string $perusahaan_npwp
 * @property string $perusahaan_nama
 * @property string $perusahaan_namagedung
 * @property string $perusahaan_blok_lantai
 * @property string $perusahaan_namajalan
 * @property string $perusahaan_propinsi
 * @property string $perusahaan_kabupaten
 * @property string $perusahaan_kecamatan
 * @property string $perusahaan_kelurahan
 * @property string $perusahaan_kodepos
 * @property string $perusahaan_fax
 * @property string $perusahaan_email
 * @property string $gudang_koordinat_1
 * @property string $gudang_koordinat_2
 * @property string $gudang_blok_lantai
 * @property string $gudang_namajalan
 * @property string $gudang_propinsi
 * @property string $gudang_kabupaten
 * @property string $gudang_kecamatan
 * @property string $gudang_kelurahan
 * @property string $gudang_kodepos
 * @property string $gudang_telepon
 * @property string $gudang_fax
 * @property string $gudang_email
 * @property string $gudang_luas
 * @property string $gudang_kapasitas
 * @property string $gudang_kapasitas_satuan
 * @property string $gudang_nilai
 * @property string $gudang_komposisi_nasional
 * @property string $gudang_komposisi_asing
 * @property string $gudang_kelengkapan
 * @property string $gudang_sarana_listrik
 * @property string $gudang_sarana_air
 * @property string $gudang_sarana_pendingin
 * @property integer $gudang_sarana_forklif
 * @property integer $gudang_sarana_komputer
 * @property string $gudang_kepemilikan
 * @property string $gudang_imb_nomor
 * @property string $gudang_imb_tanggal
 * @property string $gudang_uug_nomor
 * @property string $gudang_uug_tanggal
 * @property string $gudang_uug_berlaku
 * @property string $gudang_isi
 * @property string $hs_koordinat_1
 * @property string $hs_koordinat_2
 * @property string $hs_namagedung
 * @property string $hs_blok_lantai
 * @property string $hs_namajalan
 * @property string $hs_rt
 * @property string $hs_rw
 * @property string $hs_propinsi
 * @property string $hs_kabupaten
 * @property string $hs_kecamatan
 * @property string $hs_kelurahan
 * @property string $hs_kodepos
 * @property string $hs_telepon
 * @property string $hs_fax
 * @property string $hs_email
 * @property string $hs_luas
 * @property string $hs_kapasitas
 * @property string $hs_kapasitas_satuan
 * @property string $hs_nilai
 * @property string $hs_komposisi_nasional
 * @property string $hs_komposisi_asing
 * @property string $hs_kelengkapan
 * @property string $hs_sarana_listrik
 * @property string $hs_sarana_air
 * @property string $hs_sarana_pendingin
 * @property integer $hs_sarana_forklif
 * @property integer $hs_sarana_komputer
 * @property string $hs_kepemilikan
 * @property string $hs_imb_nomor
 * @property string $hs_imb_tanggal
 * @property string $hs_uug_nomor
 * @property string $hs_uug_tanggal
 * @property string $hs_isi
 * @property string $bapl_file
 * @property string $catatan_tambahan
 * @property integer $create_by
 * @property string $create_date
 * @property integer $update_by
 * @property string $update_date
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Status $status
 */
class IzinTdg extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdg';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perizinan_id' => 'Perizinan ID',
            'izin_id' => 'Izin ID',
            'status_id' => 'Status ID',
            'tipe' => 'Tipe',
            'pemilik_nik' => 'NIK',
			'pemilik_kitas' => 'Kitas',
            'pemilik_paspor' => 'Paspor',
            'pemilik_nama' => 'Nama',
            'pemilik_alamat' => 'Alamat',
            'pemilik_rt' => 'RT',
            'pemilik_rw' => 'RW',
            'pemilik_propinsi' => 'Propinsi',
            'pemilik_kabupaten' => 'Kabupaten/ Kota',
            'pemilik_kecamatan' => 'Kecamatan',
            'pemilik_kelurahan' => 'Kelurahan',
            'pemilik_kodepos' => 'Kodepos',
            'pemilik_telepon' => 'Telepon',
            'pemilik_fax' => 'Fax',
            'pemilik_email' => 'Email',
            'perusahaan_npwp' => 'NPWP Perusahaan',
            'perusahaan_nama' => 'Nama Perusahaan',
            'perusahaan_namagedung' => 'Nama Gedung',
            'perusahaan_blok_lantai' => 'Blok Lantai',
            'perusahaan_namajalan' => 'Nama Jalan',
            'perusahaan_propinsi' => 'Propinsi',
            'perusahaan_kabupaten' => 'Kabupaten/ Kota',
            'perusahaan_kecamatan' => 'Kecamatan',
            'perusahaan_kelurahan' => 'Kelurahan',
            'perusahaan_kodepos' => 'Kodepos',
			'perusahaan_telepon' => 'Telepon',
            'perusahaan_fax' => 'Fax',
            'perusahaan_email' => 'Email',
            'gudang_koordinat_1' => 'Titik Koordinat',
            'gudang_koordinat_2' => 'Titik Koordinat',            
			'gudang_namagedung' => 'Nama Gedung/ Komplek',
			'gudang_blok_lantai' => 'Blok/ Lantai',
            'gudang_namajalan' => 'Nama Jalan',
			'gudang_rt' => 'RT',
            'gudang_rw' => 'RW',
            'gudang_propinsi' => 'Propinsi',
            'gudang_kabupaten' => 'Kabupaten/ Kota',
            'gudang_kecamatan' => 'Kecamatan',
            'gudang_kelurahan' => 'Kelurahan',
            'gudang_kodepos' => 'Kodepos',
            'gudang_telepon' => 'Telepon',
            'gudang_fax' => 'Fax',
            'gudang_email' => 'Email',
            'gudang_luas' => 'Luas Gudang',
            'gudang_kapasitas' => 'Kapasitas Gudang',
            'gudang_kapasitas_satuan' => 'Kapasitas Satuan Gudang',
            'gudang_nilai' => 'Nilai Gudang',
            'gudang_komposisi_nasional' => 'Komposisi Kepemilikan Nasional',
            'gudang_komposisi_asing' => 'Komposisi Kepemilikan Asing',
            'gudang_kelengkapan' => 'Kelengkapan Gudang',
            'gudang_sarana_listrik' => 'Sarana Listrik Gudang',
            'gudang_sarana_air' => 'Sarana Air',
            'gudang_sarana_pendingin' => 'Fasilitas Pendingin',
            'gudang_sarana_forklif' => 'Forklif',
            'gudang_sarana_komputer' => 'Komputer',
            'gudang_kepemilikan' => 'Gudang Kepemilikan',
            'gudang_imb_nomor' => 'Nomor IMB',
            'gudang_imb_tanggal' => 'Tanggal SK IMB',
            'gudang_uug_nomor' => 'Nomor UUG',
            'gudang_uug_tanggal' => 'Tanggal SK UUG',
            'gudang_uug_berlaku' => 'Tanggal Masa Berlaku UUG',
            'gudang_isi' => 'Macam dan jenis isi Gudang',
			'hs_per_namagedung' => 'Nama Gedung',
            'hs_per_blok_lantai' => 'Blok/ Lantai',
            'hs_per_namajalan' => 'Nama Jalan',
            'hs_per_propinsi' => 'Propinsi',
            'hs_per_kabupaten' => 'Kota/ Kabupaten',
            'hs_per_kecamatan' => 'Kecamatan',
            'hs_per_kelurahan' => 'Kelurahan',
            'hs_per_kodepos' => 'Kodepos',		
            'hs_koordinat_1' => 'Koordinat 1',
            'hs_koordinat_2' => 'Koordinat 2',
            'hs_namagedung' => 'Nama Gedung',
            'hs_blok_lantai' => 'Blok Lantai',
            'hs_namajalan' => 'Namajalan',
			'hs_rt' => 'RT',
			'hs_rw' => 'RW',
            'hs_propinsi' => 'Propinsi',
            'hs_kabupaten' => 'Kabupaten/ Kabupaten',
            'hs_kecamatan' => 'Kecamatan',
            'hs_kelurahan' => 'Kelurahan',
            'hs_kodepos' => 'Kodepos',
            'hs_telepon' => 'Telepon',
            'hs_fax' => 'Fax',
            'hs_email' => 'Email',
            'hs_luas' => 'Luas',
            'hs_kapasitas' => 'Kapasitas',
            'hs_kapasitas_satuan' => 'Kapasitas Satuan',
            'hs_nilai' => 'Nilai',
            'hs_komposisi_nasional' => 'Komposisi Nasional',
            'hs_komposisi_asing' => 'Komposisi Asing',
            'hs_kelengkapan' => 'Kelengkapan',
            'hs_sarana_listrik' => 'Sarana Listrik',
            'hs_sarana_air' => 'Sarana Air',
            'hs_sarana_pendingin' => 'Sarana Pendingin',
            'hs_sarana_forklif' => 'Sarana Forklif',
            'hs_sarana_komputer' => 'Sarana Komputer',
            'hs_kepemilikan' => 'Kepemilikan',
            'hs_imb_nomor' => 'IMB Nomor',
            'hs_imb_tanggal' => 'IMB Tanggal',
            'hs_uug_nomor' => 'UUG Nomor',
            'hs_uug_tanggal' => 'UUG Tanggal',
            'hs_isi' => 'Isi',
            'bapl_file' => 'Bapl File',
            'catatan_tambahan' => 'Catatan Tambahan',
            'create_by' => 'Create By',
            'create_date' => 'Create Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinan()
    {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'perizinan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\backend\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdgQuery(get_called_class());
    }
}
