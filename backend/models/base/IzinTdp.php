<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp".
 *
 * @property string $id
 * @property string $bentuk_perusahaan
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property string $tipe
 * @property integer $perpanjangan_ke
 * @property string $iii_1_nama_kelompok
 * @property string $iii_2_status_prsh
 * @property string $iii_2_induk_nama_prsh
 * @property string $iii_2_induk_nomor_tdp
 * @property string $iii_2_induk_alamat
 * @property integer $iii_2_induk_propinsi
 * @property integer $iii_2_induk_kabupaten
 * @property integer $iii_2_induk_kecamatan
 * @property integer $iii_2_induk_kelurahan
 * @property string $iii_3_lokasi_unit_produksi
 * @property integer $iii_3_lokasi_unit_produksi_propinsi
 * @property integer $iii_3_lokasi_unit_produksi_kabupaten
 * @property string $iii_4_bank_utama_1
 * @property string $iii_4_bank_utama_2
 * @property integer $iii_4_jumlah_bank
 * @property string $iii_7b_tgl_mulai_kegiatan
 * @property string $iii_8_bentuk_kerjasama_pihak3
 * @property string $iii_9a_merek_dagang_nama
 * @property string $iii_9a_merek_dagang_nomor
 * @property string $iii_9b_hak_paten_nama
 * @property string $iii_9b_hak_paten_nomor
 * @property string $iii_9c_hak_cipta_nama
 * @property string $iii_9c_hak_cipta_nomor
 * @property string $iv_a1_notaris_nama
 * @property string $iv_a1_notaris_alamat
 * @property string $iv_a1_telpon
 * @property string $iv_a2_notaris
 * @property string $iv_a4_nomor
 * @property string $iv_a4_tanggal
 * @property string $iv_a5_nomor
 * @property string $iv_a5_tanggal
 * @property string $iv_a6_nomor
 * @property string $iv_a6_tanggal
 * @property integer $v_jumlah_dirut
 * @property integer $v_jumlah_direktur
 * @property integer $v_jumlah_komisaris
 * @property integer $vi_jumlah_pemegang_saham
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Status $status
 * @property \backend\models\User $user
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bentuk_perusahaan' => 'Bentuk Perusahaan',
            'perizinan_id' => 'Perizinan ID',
            'izin_id' => 'Izin ID',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
            'tipe' => 'Tipe',
            'perpanjangan_ke' => 'Perpanjangan Ke',
            'iii_1_nama_kelompok' => 'Nama Kelompok',
            'iii_2_status_prsh' => 'Status Perusahaan',
            'iii_2_induk_nama_prsh' => 'Induk Nama Perusahaan',
            'iii_2_induk_nomor_tdp' => 'Induk Nomor TDP',
            'iii_2_induk_alamat' => 'Induk Alamat',
            'iii_2_induk_propinsi' => 'Induk Propinsi',
            'iii_2_induk_kabupaten' => 'Induk Kabupaten',
            'iii_2_induk_kecamatan' => 'Induk Kecamatan',
            'iii_2_induk_kelurahan' => 'Induk Kelurahan',
            'iii_3_lokasi_unit_produksi' => 'Lokasi Unit Produksi',
            'iii_3_lokasi_unit_produksi_propinsi' => 'Lokasi Unit Produksi Propinsi',
            'iii_3_lokasi_unit_produksi_kabupaten' => 'Lokasi Unit Produksi Kabupaten',
            'iii_4_bank_utama_1' => 'Bank Utama 1',
            'iii_4_bank_utama_2' => 'Bank Utama 2',
            'iii_4_jumlah_bank' => 'Jumlah Bank',
            'iii_7b_tgl_mulai_kegiatan' => 'Tgl Mulai Kegiatan',
            'iii_8_bentuk_kerjasama_pihak3' => 'Bentuk Kerjasama Pihak3',
            'iii_9a_merek_dagang_nama' => 'Merek Dagang Nama',
            'iii_9a_merek_dagang_nomor' => 'Merek Dagang Nomor',
            'iii_9b_hak_paten_nama' => 'Hak Paten Nama',
            'iii_9b_hak_paten_nomor' => 'Hak Paten Nomor',
            'iii_9c_hak_cipta_nama' => 'Hak Cipta Nama',
            'iii_9c_hak_cipta_nomor' => 'Hak Cipta Nomor',
            'iv_a1_notaris_nama' => 'Notaris Nama',
            'iv_a1_notaris_alamat' => 'Notaris Alamat',
            'iv_a1_telpon' => 'Telpon',
            'iv_a2_notaris' => 'Notaris',
            'iv_a4_nomor' => 'Nomor',
            'iv_a4_tanggal' => 'Tanggal',
            'iv_a5_nomor' => 'Nomor',
            'iv_a5_tanggal' => 'Tanggal',
            'iv_a6_nomor' => 'Nomor',
            'iv_a6_tanggal' => 'Tanggal',
            'v_jumlah_dirut' => 'Jumlah Dirut',
            'v_jumlah_direktur' => 'Jumlah Direktur',
            'v_jumlah_komisaris' => 'Jumlah Komisaris',
            'vi_jumlah_pemegang_saham' => 'Jumlah Pemegang Saham',
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
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
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
