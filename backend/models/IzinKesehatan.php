<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKesehatan as BaseIzinKesehatan;

/**
 * This is the model class for table "izin_kesehatan".
 */
class IzinKesehatan extends BaseIzinKesehatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'jumlah_sip_offline', 'kepegawaian_id', 'wilayah_id_tempat_praktik', 'kecamatan_id_tempat_praktik', 'kelurahan_id_tempat_praktik', 'propinsi_id_tempat_praktik_i', 'wilayah_id_tempat_praktik_i', 'kecamatan_id_tempat_praktik_i', 'kelurahan_id_tempat_praktik_i', 'propinsi_id_tempat_praktik_ii', 'wilayah_id_tempat_praktik_ii', 'kecamatan_id_tempat_praktik_ii', 'kelurahan_id_tempat_praktik_ii'], 'integer'],
            [['tipe'], 'required'],
            [['tipe', 'jenkel', 'agama', 'alamat', 'status_sip_offline', 'alamat_tempat_praktik', 'jenis_praktik_i', 'alamat_tempat_praktik_i', 'jenis_praktik_ii', 'alamat_tempat_praktik_ii'], 'string'],
            [['tanggal_lahir', 'tanggal_berlaku_str', 'tanggal_lulus', 'tanggal_fasilitas_kesehatan', 'tanggal_pimpinan', 'tanggal_berlaku_sip_i', 'tanggal_berlaku_sip_ii'], 'safe'],
            [['nik'], 'string', 'max' => 16],
            [['nama', 'email', 'nama_tempat_praktik', 'nama_gedung_praktik', 'email_tempat_praktik', 'nomor_izin_kesehatan', 'nama_tempat_praktik_i', 'nama_gedung_praktik_i', 'nama_tempat_praktik_ii', 'nama_gedung_praktik_ii'], 'string', 'max' => 100],
            [['tempat_lahir', 'kitas', 'nomor_str', 'nomor_rekomendasi', 'nomor_fasilitas_kesehatan', 'nomor_pimpinan', 'titik_koordinat', 'latitude', 'longtitude', 'blok_tempat_praktik', 'nomor_sip_i', 'blok_tempat_praktik_i', 'nomor_sip_ii', 'blok_tempat_praktik_ii'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'rt_tempat_praktik', 'rw_tempat_praktik', 'kodepos_tempat_praktik', 'rt_tempat_praktik_i', 'rw_tempat_praktik_i', 'rt_tempat_praktik_ii', 'rw_tempat_praktik_ii'], 'string', 'max' => 5],
            [['telepon', 'telpon_tempat_praktik', 'fax_tempat_praktik', 'telpon_tempat_praktik_i', 'telpon_tempat_praktik_ii'], 'string', 'max' => 15],
            [['perguruan_tinggi'], 'string', 'max' => 150],
            [['npwp_tempat_praktik'], 'string', 'max' => 20]
        ];
    }
	
}
