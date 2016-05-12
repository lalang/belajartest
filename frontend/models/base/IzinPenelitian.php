<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_penelitian".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $lokasi_id
 * @property string $nik
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat_pemohon
 * @property string $rt
 * @property string $rw
 * @property integer $kelurahan_pemohon
 * @property integer $kecamatan_pemohon
 * @property integer $kabupaten_pemohon
 * @property integer $provinsi_pemohon
 * @property string $telepon_pemohon
 * @property string $email
 * @property string $kode_pos
 * @property string $pekerjaan_pemohon
 * @property string $npwp
 * @property string $nama_instansi
 * @property string $fakultas
 * @property string $alamat_instansi
 * @property integer $kelurahan_instansi
 * @property integer $kecamatan_instansi
 * @property integer $kabupaten_instansi
 * @property integer $provinsi_instansi
 * @property string $email_instansi
 * @property string $kodepos_instansi
 * @property string $telepon_instansi
 * @property string $fax_instansi
 * @property string $tema
 * @property integer $kab_penelitian
 * @property integer $kec_penelitian
 * @property integer $kel_penelitian
 * @property string $instansi_penelitian
 * @property string $alamat_penelitian
 * @property string $bidang_penelitian
 * @property string $tgl_mulai_penelitian
 * @property string $tgl_akhir_penelitian
 * @property integer $anggota
 *
 * @property \frontend\models\AnggotaPenelitian[] $anggotaPenelitians
 * @property \frontend\models\Izin $izin
 * @property \frontend\models\Lokasi $lokasi
 * @property \frontend\models\Perizinan $perizinan
 * @property \frontend\models\Status $status
 * @property \frontend\models\User $user
 * @property \frontend\models\IzinPenelitianLokasi[] $izinPenelitianLokasis
 * @property \frontend\models\IzinPenelitianMetode[] $izinPenelitianMetodes
 */
class IzinPenelitian extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_penelitian';
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
            'perizinan_id' => 'Perizinan ID',
            'izin_id' => 'Izin ID',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
            'lokasi_id' => 'Lokasi ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat_pemohon' => 'Alamat Pemohon',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'kelurahan_pemohon' => 'Kelurahan Pemohon',
            'kecamatan_pemohon' => 'Kecamatan Pemohon',
            'kabupaten_pemohon' => 'Kabupaten Pemohon',
            'provinsi_pemohon' => 'Provinsi Pemohon',
            'telepon_pemohon' => 'Telepon Pemohon',
            'email' => 'Email',
            'kode_pos' => 'Kode Pos',
            'pekerjaan_pemohon' => 'Pekerjaan Pemohon',
            'npwp' => 'Npwp',
            'nama_instansi' => 'Nama Instansi',
            'fakultas' => 'Fakultas',
            'alamat_instansi' => 'Alamat Instansi',
            'kelurahan_instansi' => 'Kelurahan Instansi',
            'kecamatan_instansi' => 'Kecamatan Instansi',
            'kabupaten_instansi' => 'Kabupaten Instansi',
            'provinsi_instansi' => 'Provinsi Instansi',
            'email_instansi' => 'Email Instansi',
            'kodepos_instansi' => 'Kodepos Instansi',
            'telepon_instansi' => 'Telepon Instansi',
            'fax_instansi' => 'Fax Instansi',
            'tema' => 'Tema',
            'kab_penelitian' => 'Kab Penelitian',
            'kec_penelitian' => 'Kec Penelitian',
            'kel_penelitian' => 'Kel Penelitian',
            'instansi_penelitian' => 'Instansi Penelitian',
            'alamat_penelitian' => 'Alamat Penelitian',
            'bidang_penelitian' => 'Bidang Penelitian',
            'tgl_mulai_penelitian' => 'Tgl Mulai Penelitian',
            'tgl_akhir_penelitian' => 'Tgl Akhir Penelitian',
            'anggota' => 'Anggota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaPenelitians()
    {
        return $this->hasMany(\frontend\models\AnggotaPenelitian::className(), ['penelitian_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\frontend\models\Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(\frontend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinan()
    {
        return $this->hasOne(\frontend\models\Perizinan::className(), ['id' => 'perizinan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\frontend\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\frontend\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPenelitianLokasis()
    {
        return $this->hasMany(\frontend\models\IzinPenelitianLokasi::className(), ['penelitian_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPenelitianMetodes()
    {
        return $this->hasMany(\frontend\models\IzinPenelitianMetode::className(), ['penelitian_id' => 'id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\models\IzinPenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\IzinPenelitianQuery(get_called_class());
    }
}
