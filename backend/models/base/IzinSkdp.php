<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_skdp".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property string $nik
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenkel
 * @property string $agama
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property integer $wilayah_id
 * @property integer $kecamatan_id
 * @property integer $kelurahan_id
 * @property string $kodepos
 * @property string $telepon
 * @property string $passport
 * @property integer $kewarganegaraan_id
 * @property string $npwp_perusahaan
 * @property string $nama_perusahaan
 * @property string $titik_koordinat
 * @property string $latitude
 * @property string $longtitude
 * @property string $nama_gedung_perusahaan
 * @property string $blok_perusahaan
 * @property string $alamat_perusahaan
 * @property string $rt_perusahaan
 * @property string $rw_perusahaan
 * @property integer $wilayah_id_perusahaan
 * @property integer $kecamatan_id_perusahaan
 * @property integer $kelurahan_id_perusahaan
 * @property string $kodepos_perusahaan
 * @property string $telpon_perusahaan
 * @property string $fax_perusahaan
 * @property string $klarifikasi_usaha
 * @property string $status_kepemilikan
 * @property string $status_kantor
 * @property integer $jumlah_karyawan
 * @property integer $nomor_akta_pendirian
 * @property string $tanggal_pendirian
 * @property string $nama_notaris_pendirian
 * @property integer $nomor_sk_kemenkumham
 * @property string $tanggal_pengesahan
 * @property string $nama_notaris_pengesahan
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Negara $kewarganegaraan
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Status $status
 * @property \backend\models\User $user
 * @property \backend\models\IzinSkdpAkta[] $izinSkdpAktas
 */
class IzinSkdp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'wilayah_id_perusahaan', 'kecamatan_id_perusahaan', 'kelurahan_id_perusahaan', 'jumlah_karyawan', 'nomor_akta_pendirian', 'nomor_sk_kemenkumham'], 'integer'],
            [['tanggal_lahir', 'tanggal_pendirian', 'tanggal_pengesahan'], 'safe'],
            [['tipe', 'jenkel', 'agama', 'alamat', 'alamat_perusahaan', 'status_kepemilikan', 'status_kantor'], 'string'],
            [['nik', 'passport'], 'string', 'max' => 16],
            [['nama', 'nama_perusahaan', 'nama_gedung_perusahaan'], 'string', 'max' => 100],
            [['tempat_lahir', 'titik_koordinat', 'latitude', 'longtitude', 'blok_perusahaan', 'nama_notaris_pendirian', 'nama_notaris_pengesahan'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'rt_perusahaan', 'rw_perusahaan', 'kodepos_perusahaan'], 'string', 'max' => 5],
            [['telepon', 'telpon_perusahaan', 'fax_perusahaan'], 'string', 'max' => 15],
            [['npwp_perusahaan'], 'string', 'max' => 20],
            [['klarifikasi_usaha'], 'string', 'max' => 150]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_skdp';
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
            'tipe' => Yii::t('app', 'Tipe'),
            'nik' => Yii::t('app', 'NIK'),
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenkel' => Yii::t('app', 'Jenis Kelamin'),
            'agama' => Yii::t('app', 'Agama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'rt' => Yii::t('app', 'RT'),
            'rw' => Yii::t('app', 'RW'),
            'propinsi_id' => Yii::t('app', 'Propinsi'),
            'wilayah_id' => Yii::t('app', 'Kabupaten / Kota'),
            'kecamatan_id' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id' => Yii::t('app', 'Kelurahan'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'telepon' => Yii::t('app', 'Telepon'),
            'passport' => Yii::t('app', 'Passport'),
            'kewarganegaraan_id' => Yii::t('app', 'Kewarganegaraan'),
            'npwp_perusahaan' => Yii::t('app', 'NPWP'),
            'nama_perusahaan' => Yii::t('app', 'Nama Perusahaan'),
            'titik_koordinat' => Yii::t('app', 'Titik Koordinat'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longtitude' => Yii::t('app', 'Longtitude'),
            'nama_gedung_perusahaan' => Yii::t('app', 'Nama Gedung / Komplek'),
            'blok_perusahaan' => Yii::t('app', 'Blok / Lantai'),
            'alamat_perusahaan' => Yii::t('app', 'Alamat Perusahaan'),
            'rt_perusahaan' => Yii::t('app', 'RT'),
            'rw_perusahaan' => Yii::t('app', 'RW'),
            'wilayah_id_perusahaan' => Yii::t('app', 'Kabupaten / Kota'),
            'kecamatan_id_perusahaan' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id_perusahaan' => Yii::t('app', 'Kelurahan'),
            'kodepos_perusahaan' => Yii::t('app', 'Kodepos'),
            'telpon_perusahaan' => Yii::t('app', 'Telpon'),
            'fax_perusahaan' => Yii::t('app', 'Fax'),
            'klarifikasi_usaha' => Yii::t('app', 'Klarifikasi Usaha'),
            'status_kepemilikan' => Yii::t('app', 'Status Kepemilikan'),
            'status_kantor' => Yii::t('app', 'Status Kantor'),
            'jumlah_karyawan' => Yii::t('app', 'Jumlah Karyawan'),
            'nomor_akta_pendirian' => Yii::t('app', 'Nomor Akta Pendirian'),
            'tanggal_pendirian' => Yii::t('app', 'Tanggal Pendirian'),
            'nama_notaris_pendirian' => Yii::t('app', 'Nama Notaris Pendirian'),
            'nomor_sk_kemenkumham' => Yii::t('app', 'Nomor SK Pengesahan'),
            'tanggal_pengesahan' => Yii::t('app', 'Tanggal Pengesahan'),
            'nama_notaris_pengesahan' => Yii::t('app', 'Nama Notaris Pengesahan'),
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
    public function getKewarganegaraan()
    {
        return $this->hasOne(\backend\models\Negara::className(), ['id' => 'kewarganegaraan_id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getIzinSkdpAktas()
    {
        return $this->hasMany(\backend\models\IzinSkdpAkta::className(), ['izin_skdp_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinSkdpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinSkdpQuery(get_called_class());
    }
}
