<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\IzinPenelitian as BaseIzinPenelitian;

/**
 * This is the model class for table "izin_penelitian".
 */
class IzinPenelitian extends BaseIzinPenelitian
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'kelurahan_pemohon', 'kecamatan_pemohon', 'kabupaten_pemohon', 'provinsi_pemohon', 'kelurahan_instansi', 'kecamatan_instansi', 'kabupaten_instansi', 'provinsi_instansi', 'kab_penelitian', 'kec_penelitian', 'kel_penelitian', 'anggota'], 'integer'],
            [['user_id', 'status_id', 'lokasi_id', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat_pemohon', 'rt', 'rw', 'kelurahan_pemohon', 'kecamatan_pemohon', 'kabupaten_pemohon', 'telepon_pemohon', 'email', 'kode_pos', 'pekerjaan_pemohon', 'npwp', 'nama_instansi', 'fakultas', 'alamat_instansi', 'kelurahan_instansi', 'kecamatan_instansi', 'kabupaten_instansi', 'email_instansi', 'kodepos_instansi', 'telepon_instansi', 'fax_instansi', 'tema', 'kab_penelitian', 'kec_penelitian', 'kel_penelitian', 'instansi_penelitian', 'alamat_penelitian', 'bidang_penelitian', 'tgl_mulai_penelitian', 'tgl_akhir_penelitian', 'anggota'], 'required'],
            [['tanggal_lahir', 'tgl_mulai_penelitian', 'tgl_akhir_penelitian'], 'safe'],
            [['nik'], 'string', 'max' => 16],
            [['nama', 'tempat_lahir', 'email', 'pekerjaan_pemohon', 'email_instansi'], 'string', 'max' => 200],
            [['alamat_pemohon', 'nama_instansi', 'fakultas', 'alamat_instansi', 'tema', 'instansi_penelitian', 'alamat_penelitian', 'bidang_penelitian'], 'string', 'max' => 255],
            [['rt', 'rw', 'kode_pos', 'kodepos_instansi'], 'string', 'max' => 5],
            [['telepon_pemohon', 'telepon_instansi', 'fax_instansi'], 'string', 'max' => 15],
            [['npwp'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
