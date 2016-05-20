<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pm1".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property string $nik
 * @property string $no_kk
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenkel
 * @property string $alamat
 * @property string $kodepos
 * @property string $pekerjaan
 * @property string $telepon
 * @property integer $wilayah_id
 * @property integer $kecamatan_id
 * @property integer $kelurahan_id
 * @property string $no_surat_pengantar
 * @property string $tanggal_surat
 * @property string $instansi_tujuan
 * @property string $tujuan
 * @property string $keperluan_administrasi
 * @property integer $lokasi_id
 * @property string $nik_orang_lain
 * @property string $no_kk_orang_lain
 * @property string $nama_orang_lain
 * @property string $tempat_lahir_orang_lain
 * @property string $tanggal_lahir_orang_lain
 * @property string $jenkel_orang_lain
 * @property string $alamat_orang_lain
 * @property string $kodepos_orang_lain
 * @property string $pekerjaan_orang_lain
 * @property string $telepon_orang_lain
 * @property integer $wilayah_id_orang_lain
 * @property integer $kecamatan_id_orang_lain
 * @property integer $kelurahan_id_orang_lain
 * @property string $nik_saksi1
 * @property string $no_kk_saksi1
 * @property string $nama_saksi1
 * @property string $tempat_lahir_saksi1
 * @property string $tanggal_lahir_saksi1
 * @property string $jenkel_saksi1
 * @property string $alamat_saksi1
 * @property string $kodepos_saksi1
 * @property string $pekerjaan_saksi1
 * @property string $telepon_saksi1
 * @property integer $wilayah_id_saksi1
 * @property integer $kecamatan_id_saksi1
 * @property integer $kelurahan_id_saksi1
 * @property string $nik_saksi2
 * @property string $no_kk_saksi2
 * @property string $nama_saksi2
 * @property string $tempat_lahir_saksi2
 * @property string $tanggal_lahir_saksi2
 * @property string $jenkel_saksi2
 * @property string $alamat_saksi2
 * @property string $kodepos_saksi2
 * @property string $pekerjaan_saksi2
 * @property string $telepon_saksi2
 * @property integer $wilayah_id_saksi2
 * @property integer $kecamatan_id_saksi2
 * @property integer $kelurahan_id_saksi2
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Status $status
 * @property \backend\models\User $user
 */
class IzinPm1 extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pm1';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perizinan_id' => Yii::t('app', 'Perizinan ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'nik' => Yii::t('app', 'NIK'),
            'no_kk' => Yii::t('app', 'No Kartu Keluarga'),
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenkel' => Yii::t('app', 'Jenis Kelamin'),
            'agama' => Yii::t('app', 'Agama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'pekerjaan' => Yii::t('app', 'Pekerjaan'),
            'telepon' => Yii::t('app', 'Telepon'),
            'wilayah_id' => Yii::t('app', 'Wilayah/Kota'),
            'kecamatan_id' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id' => Yii::t('app', 'Kelurahan'),
            'no_surat_pengantar' => Yii::t('app', 'Nomor Surat Pengantar RT/RW'),
            'tanggal_surat' => Yii::t('app', 'Tanggal Surat Pengantar RT/RW'),
            'instansi_tujuan' => Yii::t('app', 'Instansi Tujuan'),
            'tujuan' => Yii::t('app', 'Tujuan Untuk'),
            'pilihan' => Yii::t('app', 'Pilihan'),
            'keperluan_administrasi' => Yii::t('app', 'Keperluan Administrasi'),
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
            'nik_orang_lain' => Yii::t('app', 'NIK Orang Lain'),
            'no_kk_orang_lain' => Yii::t('app', 'No Kartu Keluarga Orang Lain'),
            'nama_orang_lain' => Yii::t('app', 'Nama Orang Lain'),
            'tempat_lahir_orang_lain' => Yii::t('app', 'Tempat Lahir Orang Lain'),
            'tanggal_lahir_orang_lain' => Yii::t('app', 'Tanggal Lahir Orang Lain'),
            'jenkel_orang_lain' => Yii::t('app', 'Jenis Kelamin Orang Lain'),
            'alamat_orang_lain' => Yii::t('app', 'Alamat Orang Lain'),
            'kodepos_orang_lain' => Yii::t('app', 'Kodepos Orang Lain'),
            'pekerjaan_orang_lain' => Yii::t('app', 'Pekerjaan Orang Lain'),
            'telepon_orang_lain' => Yii::t('app', 'Telepon Orang Lain'),
            'wilayah_id_orang_lain' => Yii::t('app', 'Wilayah/Kota Orang Lain'),
            'kecamatan_id_orang_lain' => Yii::t('app', 'Kecamatan Orang Lain'),
            'kelurahan_id_orang_lain' => Yii::t('app', 'Kelurahan Orang Lain'),
            'nik_saksi1' => Yii::t('app', 'Nik Saksi1'),
            'no_kk_saksi1' => Yii::t('app', 'No Kk Saksi1'),
            'nama_saksi1' => Yii::t('app', 'Nama Saksi1'),
            'tempat_lahir_saksi1' => Yii::t('app', 'Tempat Lahir Saksi1'),
            'tanggal_lahir_saksi1' => Yii::t('app', 'Tanggal Lahir Saksi1'),
            'jenkel_saksi1' => Yii::t('app', 'Jenkel Saksi1'),
            'alamat_saksi1' => Yii::t('app', 'Alamat Saksi1'),
            'kodepos_saksi1' => Yii::t('app', 'Kodepos Saksi1'),
            'pekerjaan_saksi1' => Yii::t('app', 'Pekerjaan Saksi1'),
            'telepon_saksi1' => Yii::t('app', 'Telepon Saksi1'),
            'wilayah_id_saksi1' => Yii::t('app', 'Wilayah/Kota Saksi1'),
            'kecamatan_id_saksi1' => Yii::t('app', 'Kecamatan Saksi1'),
            'kelurahan_id_saksi1' => Yii::t('app', 'Kelurahan Saksi1'),
            'nik_saksi2' => Yii::t('app', 'Nik Saksi2'),
            'no_kk_saksi2' => Yii::t('app', 'No Kk Saksi2'),
            'nama_saksi2' => Yii::t('app', 'Nama Saksi2'),
            'tempat_lahir_saksi2' => Yii::t('app', 'Tempat Lahir Saksi2'),
            'tanggal_lahir_saksi2' => Yii::t('app', 'Tanggal Lahir Saksi2'),
            'jenkel_saksi2' => Yii::t('app', 'Jenkel Saksi2'),
            'alamat_saksi2' => Yii::t('app', 'Alamat Saksi2'),
            'kodepos_saksi2' => Yii::t('app', 'Kodepos Saksi2'),
            'pekerjaan_saksi2' => Yii::t('app', 'Pekerjaan Saksi2'),
            'telepon_saksi2' => Yii::t('app', 'Telepon Saksi2'),
            'wilayah_id_saksi2' => Yii::t('app', 'Wilayah/Kota Saksi2'),
            'kecamatan_id_saksi2' => Yii::t('app', 'Kecamatan Saksi2'),
            'kelurahan_id_saksi2' => Yii::t('app', 'Kelurahan Saksi2'),
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
     * @return \backend\models\IzinPm1Query the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPm1Query(get_called_class());
    }
    
    public static function getDb()
    {
        // use the "db2" application component
        return \Yii::$app->dbTrans;  
    }
}
