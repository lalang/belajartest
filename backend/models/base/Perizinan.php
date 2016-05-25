<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "perizinan".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $pemohon_id
 * @property integer $pengesah_id
 * @property integer $id_groupizin
 * @property integer $izin_id
 * @property integer $no_urut
 * @property string $tanggal_mohon
 * @property string $no_izin
 * @property string $berkas_noizin
 * @property string $tanggal_izin
 * @property string $tanggal_expired
 * @property string $status
 * @property string $aktif
 * @property string $registrasi_urutan
 * @property string $nomor_sp_rt_rw
 * @property string $tanggal_sp_rt_rw
 * @property string $peruntukan
 * @property string $nama_perusahaan
 * @property string $tanggal_cek_lapangan
 * @property string $petugas_cek
 * @property string $status_daftar
 * @property integer $petugas_daftar_id
 * @property integer $lokasi_izin_id
 * @property integer $lokasi_pengambilan_id
 * @property integer $status_id
 * @property string $keterangan
 * @property string $qr_code
 * @property string $tanggal_pertemuan
 * @property string $pengambilan_tanggal
 * @property string $pengambilan_sesi
  * @property integer $zonasi_id
 * @property string $zonasi_sesuai
 * @property string $pengambil_nik
 * @property string $pengambil_nama
 * @property string $pengambil_telepon
 * @property string $alamat_valid
 *
 * @property \backend\models\IzinSiup[] $izinSiups
 * @property \backend\models\User $pemohon
 * @property \backend\models\User $petugasDaftar
 * @property \backend\models\Izin $izin
 * @property \backend\models\Perizinan $parent
 * @property \backend\models\Perizinan[] $perizinans
 * @property \backend\models\PerizinanProses[] $perizinanProses
 */
class Perizinan extends \yii\db\ActiveRecord {

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'perizinan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode_registrasi' => Yii::t('app', 'Kode Registrasi'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'pemohon_id' => Yii::t('app', 'Pemohon ID'),
            'id_groupizin' => Yii::t('app', 'Id Groupizin'),
            'referrer_id' => Yii::t('app', 'Referrer ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'no_urut' => Yii::t('app', 'No Urut'),
            'tanggal_mohon' => Yii::t('app', 'Tanggal Mohon'),
            'no_izin' => Yii::t('app', 'No Izin'),
            'jumlah_tahap' => Yii::t('app', 'Jumlah Tahap'),
            'berkas_noizin' => Yii::t('app', 'Berkas Noizin'),
            'tanggal_izin' => Yii::t('app', 'Tanggal Izin'),
            'tanggal_expired' => Yii::t('app', 'Tanggal Expired'),
            'status' => Yii::t('app', 'Status'),
            'aktif' => Yii::t('app', 'Aktif'),
            'registrasi_urutan' => Yii::t('app', 'Registrasi Urutan'),
            'nomor_sp_rt_rw' => Yii::t('app', 'Nomor Sp Rt Rw'),
            'tanggal_sp_rt_rw' => Yii::t('app', 'Tanggal Sp Rt Rw'),
            'peruntukan' => Yii::t('app', 'Peruntukan'),
            'nama_perusahaan' => Yii::t('app', 'Nama Perusahaan'),
            'tanggal_cek_lapangan' => Yii::t('app', 'Tanggal Cek Lapangan'),
            'petugas_cek' => Yii::t('app', 'Petugas Cek'),
            'status_daftar' => Yii::t('app', 'Status Daftar'),
            'petugas_daftar_id' => Yii::t('app', 'Petugas Daftar'),
            'lokasi_izin_id' => Yii::t('app', 'Lokasi Izin'),
            'lokasi_pengambilan_id' => Yii::t('app', 'Lokasi Pengambilan'),
            'status_id' => Yii::t('app', 'Status ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'alasan_penolakan' => Yii::t('app', 'Alasan Penolakan'),
            'qr_code' => Yii::t('app', 'Qr Code'),
            'tanggal_pertemuan' => Yii::t('app', 'Tanggal Pertemuan'),
            'pengambilan_tanggal' => Yii::t('app', 'Pengambilan Tanggal'),
            'pengambilan_sesi' => Yii::t('app', 'Pengambilan Sesi'),
            'pengambil_nik' => Yii::t('app', 'NIK Pengambil'),
            'pengambil_nama' => Yii::t('app', 'Nama Pengambil'),
            'pengambil_telepon' => Yii::t('app', 'Telepon Pengambil'),
            'zonasi_id' => Yii::t('app', 'Zonasi'),
            'zonasi_sesuai' => Yii::t('app', 'Kesesuaian Zonasi'),
            'alamat_valid' => Yii::t('app', 'Alamat Valid'),
            'pengesah_id' => Yii::t('app', 'Pengesah ID'),
            'plh_id' => Yii::t('app', 'PLH ID'),
            'file_bapl' => Yii::t('app', 'File BAPL'),
            'fileBAPL' => Yii::t('app', 'File BAPL'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinSiups() {
        return $this->hasMany(\backend\models\IzinSiup::className(), ['perizinan_id' => 'id']);
    }

     public function getStatus()
    {
        return $this->hasOne(\backend\models\Status::className(), ['id' => 'status_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemohon() {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'pemohon_id']);
    }
    
    public function getPemohonProfile() {
        return $this->hasOne(\dektrium\user\models\Profile::className(), ['user_id' => 'pemohon_id']);
    }
    
    public function getPlh() {
        return $this->hasOne(\backend\models\HistoryPlh::className(), ['id' => 'plh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetugasDaftar() {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'petugas_daftar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin() {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
    }

    public function getLokasiPengambilan() {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_pengambilan_id']);
    }

    public function getLokasiIzin() {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinans() {
        return $this->hasMany(\backend\models\Perizinan::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanProses() {
        return $this->hasMany(\backend\models\PerizinanProses::className(), ['perizinan_id' => 'id'])->orderBy('urutan');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentProcess() {
        return $this->hasOne(\backend\models\PerizinanProses::className(), ['perizinan_id' => 'id'])->andWhere(['active' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanDokumen() {
        return $this->hasMany(\backend\models\PerizinanDokumen::className(), ['perizinan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanBerkas() {
        return $this->hasMany(\backend\models\PerizinanBerkas::className(), ['perizinan_id' => 'id'])->orderBy('urutan');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZonasi()
    {
        return $this->hasOne(\backend\models\Zonasi::className(), ['id' => 'zonasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSop()
    {
        return $this->hasOne(\backend\models\Sop::className(), ['izin_id' => 'izin_id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\PerizinanQuery the active query used by this AR class.
     */
    public static function find() {
        return new \backend\models\PerizinanQuery(get_called_class());
    }

}
