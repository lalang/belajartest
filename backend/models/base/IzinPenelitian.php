<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_penelitian".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $lokasi_id
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
 * @property \backend\models\AnggotaPenelitian[] $anggotaPenelitians
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Izin $izin
 * @property \backend\models\User $user
 * @property \backend\models\Status $status
 * @property \backend\models\Lokasi $lokasi
 * @property \backend\models\IzinPenelitianLokasi[] $izinPenelitianLokasis
 * @property \backend\models\IzinPenelitianMetode[] $izinPenelitianMetodes
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
//    public function optimisticLock() {
//        return 'lock';
//    }

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
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'alamat_pemohon' => Yii::t('app', 'Alamat Pemohon'),
            'rt' => Yii::t('app', 'RT'),
            'rw' => Yii::t('app', 'RW'),
            'kelurahan_pemohon' => Yii::t('app', 'Kelurahan Pemohon'),
            'kecamatan_pemohon' => Yii::t('app', 'Kecamatan Pemohon'),
            'kabupaten_pemohon' => Yii::t('app', 'Kabupaten Pemohon'),
            'provinsi_pemohon' => Yii::t('app', 'Provinsi Pemohon'),
            'telepon_pemohon' => Yii::t('app', 'Telepon Pemohon'),
            'email' => Yii::t('app', 'Email'),
            'kode_pos' => Yii::t('app', 'Kode Pos'),
            'pekerjaan_pemohon' => Yii::t('app', 'Pekerjaan Pemohon'),
            'npwp' => Yii::t('app', 'Npwp'),
            'nama_instansi' => Yii::t('app', 'Nama Instansi'),
            'fakultas' => Yii::t('app', 'Fakultas'),
            'alamat_instansi' => Yii::t('app', 'Alamat Instansi'),
            'kelurahan_instansi' => Yii::t('app', 'Kelurahan Instansi'),
            'kecamatan_instansi' => Yii::t('app', 'Kecamatan Instansi'),
            'kabupaten_instansi' => Yii::t('app', 'Kabupaten Instansi'),
            'provinsi_instansi' => Yii::t('app', 'Provinsi Instansi'),
            'email_instansi' => Yii::t('app', 'Email Instansi'),
            'kodepos_instansi' => Yii::t('app', 'Kodepos Instansi'),
            'telepon_instansi' => Yii::t('app', 'Telepon Instansi'),
            'fax_instansi' => Yii::t('app', 'Fax Instansi'),
            'tema' => Yii::t('app', 'Tema'),
            'kab_penelitian' => Yii::t('app', 'Kabupaten Penelitian'),
            'kec_penelitian' => Yii::t('app', 'Kecamatan Penelitian'),
            'kel_penelitian' => Yii::t('app', 'Kelurahan Penelitian'),
            'instansi_penelitian' => Yii::t('app', 'Instansi Penelitian'),
            'alamat_penelitian' => Yii::t('app', 'Alamat Penelitian'),
            'bidang_penelitian' => Yii::t('app', 'Bidang Penelitian'),
            'tgl_mulai_penelitian' => Yii::t('app', 'Tgl Mulai Penelitian'),
            'tgl_akhir_penelitian' => Yii::t('app', 'Tgl Akhir Penelitian'),
            'anggota' => Yii::t('app', 'Jumlah Anggota'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggotaPenelitians()
    {
        return $this->hasMany(\backend\models\AnggotaPenelitian::className(), ['penelitian_id' => 'id']);
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
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
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
    public function getStatus()
    {
        return $this->hasOne(\backend\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPenelitianLokasis()
    {
        return $this->hasMany(\backend\models\IzinPenelitianLokasi::className(), ['penelitian_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPenelitianMetodes()
    {
        return $this->hasMany(\backend\models\IzinPenelitianMetode::className(), ['penelitian_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPenelitianQuery(get_called_class());
    }
}
