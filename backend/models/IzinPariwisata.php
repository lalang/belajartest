<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisata as BaseIzinPariwisata;

/**
 * This is the model class for table "izin_pariwisata".
 */
class IzinPariwisata extends BaseIzinPariwisata
{
	    public $teks_preview;
    public $preview_data;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $nama_propinsi;
    public $nama_propinsi_pt;
    public $nama_kabkota_pt;
    public $nama_kelurahan_pt;
    public $nama_kecamatan_pt;
    public $nama_propinsi_owner;
    public $nama_kabkota_owner;
    public $nama_kelurahan_owner;
    public $nama_kecamatan_owner;
    public $nama_kelurahan_usaha;
    public $nama_kecamatan_usaha;
    public $nama_kabkota_usaha;
    public $nama_negara;
    public $teks_sk;
    public $teks_penolakan;
    public $surat_pengurusan;
    public $surat_kuasa;
    public $teks_validasi;
    public $form_bapl;
    public $tanda_register;
    public $kode;
    public $nama_izin;
    public $url_back;
    public $perizinan_proses_id;
    public $nama_pegawai;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'propinsi_id_perusahaan', 'wilayah_id_perusahaan', 'kecamatan_id_perusahaan', 'kelurahan_id_perusahaan', 'propinsi_id_penanggung_jawab', 'wilayah_id_penanggung_jawab', 'kecamatan_id_penanggung_jawab', 'kelurahan_id_penanggung_jawab', 'kewarganegaraan_id_penanggung_jawab', 'wilayah_id_usaha', 'kecamatan_id_usaha', 'kelurahan_id_usaha', 'jumlah_karyawan', 'intensitas_jasa_perjalanan', 'kapasitas_penyedia_akomodasi', 'jum_kursi_jasa_manum', 'jum_stand_jasa_manum', 'jum_pack_jasa_manum'], 'integer'],
            [['tipe'], 'required'],
            [['tipe', 'jenkel', 'alamat', 'alamat_perusahaan', 'identitas_sama', 'jenkel_penanggung_jawab', 'alamat_penanggung_jawab', 'alamat_usaha'], 'string'],
            [['tanggal_lahir', 'tanggal_pendirian', 'tanggal_pengesahan', 'tanggal_cabang', 'tanggal_keputusan_cabang', 'tanggal_lahir_penanggung_jawab', 'tanggal_tdup'], 'safe'],
            [['nik', 'passport', 'nik_penanggung_jawab', 'passport_penanggung_jawab'], 'string', 'max' => 16],
            [['nama', 'email', 'nama_perusahaan', 'nama_gedung_perusahaan', 'email_perusahaan', 'nama_penanggung_jawab', 'no_tdup', 'nama_gedung_usaha'], 'string', 'max' => 100],
            [['tempat_lahir', 'kitas', 'blok_perusahaan', 'nomor_akta_pendirian', 'nama_notaris_pendirian', 'nomor_sk_pengesahan', 'nomor_akta_cabang', 'nama_notaris_cabang', 'keputusan_cabang', 'tempat_lahir_penanggung_jawab', 'kitas_penanggung_jawab', 'titik_koordinat', 'latitude', 'longitude', 'blok_usaha', 'nomor_objek_pajak_usaha', 'npwpd'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'kodepos_perusahaan', 'rt_penanggung_jawab', 'rw_penanggung_jawab', 'kodepos_penanggung_jawab', 'rt_usaha', 'rw_usaha', 'kodepos_usaha'], 'string', 'max' => 5],
            [['telepon', 'telpon_perusahaan', 'fax_perusahaan', 'telepon_penanggung_jawab', 'telpon_usaha', 'fax_usaha'], 'string', 'max' => 15],
            [['npwp_perusahaan'], 'string', 'max' => 20],
            [['merk_nama_usaha'], 'string', 'max' => 150]
        ]);
    }
	
}
