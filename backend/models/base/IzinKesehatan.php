<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_kesehatan".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $lokasi_id
 * @property string $tipe
 * @property string $nik
 * @property string $nama
 * @property string $nama_gelar
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenkel
 * @property string $agama
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property integer $propinsi_id
 * @property integer $wilayah_id
 * @property integer $kecamatan_id
 * @property integer $kelurahan_id
 * @property string $kodepos
 * @property string $telepon
 * @property string $email
 * @property string $kitas
 * @property integer $kewarganegaraan_id
 * @property string $status_sip_offline
 * @property integer $jumlah_sip_offline
 * @property string $nomor_str
 * @property string $tanggal_berlaku_str
 * @property string $perguruan_tinggi
 * @property string $tanggal_lulus
 * @property string $nomor_rekomendasi
 * @property integer $kepegawaian_id
 * @property string $nomor_fasilitas_kesehatan
 * @property string $tanggal_fasilitas_kesehatan
 * @property string $nomor_pimpinan
 * @property string $tanggal_pimpinan
 * @property string $npwp_tempat_praktik
 * @property string $nama_tempat_praktik
 * @property string $titik_koordinat
 * @property string $latitude
 * @property string $longitude
 * @property string $nama_gedung_praktik
 * @property string $blok_tempat_praktik
 * @property string $alamat_tempat_praktik
 * @property string $rt_tempat_praktik
 * @property string $rw_tempat_praktik
 * @property integer $wilayah_id_tempat_praktik
 * @property integer $kecamatan_id_tempat_praktik
 * @property integer $kelurahan_id_tempat_praktik
 * @property string $kodepos_tempat_praktik
 * @property string $telpon_tempat_praktik
 * @property string $fax_tempat_praktik
 * @property string $email_tempat_praktik
 * @property string $nomor_izin_kesehatan
 * @property string $jenis_praktik_i
 * @property string $nama_tempat_praktik_i
 * @property string $nomor_sip_i
 * @property string $tanggal_berlaku_sip_i
 * @property string $nama_gedung_praktik_i
 * @property string $blok_tempat_praktik_i
 * @property string $alamat_tempat_praktik_i
 * @property string $rt_tempat_praktik_i
 * @property string $rw_tempat_praktik_i
 * @property integer $propinsi_id_tempat_praktik_i
 * @property integer $wilayah_id_tempat_praktik_i
 * @property integer $kecamatan_id_tempat_praktik_i
 * @property integer $kelurahan_id_tempat_praktik_i
 * @property string $telpon_tempat_praktik_i
 * @property string $jenis_praktik_ii
 * @property string $nama_tempat_praktik_ii
 * @property string $nomor_sip_ii
 * @property string $tanggal_berlaku_sip_ii
 * @property string $nama_gedung_praktik_ii
 * @property string $blok_tempat_praktik_ii
 * @property string $alamat_tempat_praktik_ii
 * @property string $rt_tempat_praktik_ii
 * @property string $rw_tempat_praktik_ii
 * @property integer $propinsi_id_tempat_praktik_ii
 * @property integer $wilayah_id_tempat_praktik_ii
 * @property integer $kecamatan_id_tempat_praktik_ii
 * @property integer $kelurahan_id_tempat_praktik_ii
 * @property string $telpon_tempat_praktik_ii
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Kepegawaian $kepegawaian
 * @property \backend\models\Lokasi $lokasi
 * @property \backend\models\Negara $kewarganegaraan
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Status $status
 * @property \backend\models\User $user
 * @property \backend\models\IzinKesehatanJadwal[] $izinKesehatanJadwals
 * @property \backend\models\IzinKesehatanJadwalDua[] $izinKesehatanJadwalDuas
 * @property \backend\models\IzinKesehatanJadwalSatu[] $izinKesehatanJadwalSatus
 */
class IzinKesehatan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

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
            [['nama','nama_gelar', 'email', 'nama_tempat_praktik', 'nama_gedung_praktik', 'email_tempat_praktik', 'nomor_izin_kesehatan','nama_tempat_praktik_i', 'nama_gedung_praktik_i', 'nama_tempat_praktik_ii', 'nama_gedung_praktik_ii'], 'string', 'max' => 100],
            [['tempat_lahir', 'kitas', 'nomor_str', 'nomor_rekomendasi', 'nomor_fasilitas_kesehatan', 'nomor_pimpinan', 'titik_koordinat', 'latitude', 'longitude', 'blok_tempat_praktik', 'nomor_sip_i', 'blok_tempat_praktik_i', 'nomor_sip_ii', 'blok_tempat_praktik_ii'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'rt_tempat_praktik', 'rw_tempat_praktik', 'kodepos_tempat_praktik', 'rt_tempat_praktik_i', 'rw_tempat_praktik_i', 'rt_tempat_praktik_ii', 'rw_tempat_praktik_ii'], 'string', 'max' => 5],
            [['telepon', 'telpon_tempat_praktik', 'fax_tempat_praktik', 'telpon_tempat_praktik_i', 'telpon_tempat_praktik_ii'], 'string', 'max' => 15],
            [['perguruan_tinggi'], 'string', 'max' => 150],
            [['npwp_tempat_praktik'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_kesehatan';
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
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
            'tipe' => Yii::t('app', 'Tipe'),
            'nik' => Yii::t('app', 'NIK'),
            'nama' => Yii::t('app', 'Nama Lengkap'),
			'nama_gelar' => Yii::t('app', 'Nama Lengkap & Gelar'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenkel' => Yii::t('app', 'Jenis Kelamin'),
            'agama' => Yii::t('app', 'Agama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'rt' => Yii::t('app', 'RT'),
            'rw' => Yii::t('app', 'RW'),
            'propinsi_id' => Yii::t('app', 'Provinsi'),
            'wilayah_id' => Yii::t('app', 'Kota/Kabupaten'),
            'kecamatan_id' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id' => Yii::t('app', 'Kelurahan'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'telepon' => Yii::t('app', 'Telepon'),
            'email' => Yii::t('app', 'Email'),
            'kitas' => Yii::t('app', 'Kitas'),
            'kewarganegaraan_id' => Yii::t('app', 'Kewarganegaraan'),
			'status_sip_offline' => Yii::t('app', 'Adakah Tempat Praktik lain?'),
			'jumlah_sip_offline' => Yii::t('app', 'Jumlah Tempat Praktik'),
            'nomor_str' => Yii::t('app', 'Nomor Surat Tanda Registrasi(STR)'),
            'tanggal_berlaku_str' => Yii::t('app', 'Masa Berlaku STR'),
            'perguruan_tinggi' => Yii::t('app', 'Perguruan Tinggi'),
            'tanggal_lulus' => Yii::t('app', 'Tanggal Lulus'),
            'nomor_rekomendasi' => Yii::t('app', 'Nomor Rekomendasi Organisasi Profesi'),
            'kepegawaian_id' => Yii::t('app', 'Status Kepegawaian'),
            'nomor_fasilitas_kesehatan' => Yii::t('app', 'Nomor Surat'),
            'tanggal_fasilitas_kesehatan' => Yii::t('app', 'Tanggal Surat'),
            'nomor_pimpinan' => Yii::t('app', 'Nomor Surat'),
            'tanggal_pimpinan' => Yii::t('app', 'Tanggal Surat'),
            'npwp_tempat_praktik' => Yii::t('app', 'NPWP Tempat Praktik'),
            'nama_tempat_praktik' => Yii::t('app', 'Nama Tempat Praktik'),
            'titik_koordinat' => Yii::t('app', 'Titik Koordinat'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'nama_gedung_praktik' => Yii::t('app', 'Nama Gedung/Komplek'),
            'blok_tempat_praktik' => Yii::t('app', 'Blok/Lantai'),
            'alamat_tempat_praktik' => Yii::t('app', 'Nama Jalan'),
            'rt_tempat_praktik' => Yii::t('app', 'RT'),
            'rw_tempat_praktik' => Yii::t('app', 'RW'),
            'wilayah_id_tempat_praktik' => Yii::t('app', 'Kota/Kabupaten'),
            'kecamatan_id_tempat_praktik' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id_tempat_praktik' => Yii::t('app', 'Kelurahan'),
            'kodepos_tempat_praktik' => Yii::t('app', 'Kodepos'),
            'telpon_tempat_praktik' => Yii::t('app', 'Telepon'),
            'fax_tempat_praktik' => Yii::t('app', 'Fax'),
            'email_tempat_praktik' => Yii::t('app', 'Email'),
            'nomor_izin_kesehatan' => Yii::t('app', 'Nomor Izin Usaha/Operasional Fasilitas Kesehatan'),
            'jenis_praktik_i' => Yii::t('app', 'Jenis Praktik'),
            'nama_tempat_praktik_i' => Yii::t('app', 'Nama Tempat Praktik/Fasilitas Kesehatan'),
            'nomor_sip_i' => Yii::t('app', 'Nomor Sip'),
            'tanggal_berlaku_sip_i' => Yii::t('app', 'Tanggal Masa Berlaku Sip'),
            'nama_gedung_praktik_i' => Yii::t('app', 'Nama Gedung/Komplek'),
            'blok_tempat_praktik_i' => Yii::t('app', 'Blok/Lantai'),
            'alamat_tempat_praktik_i' => Yii::t('app', 'Nama Jalan'),
            'rt_tempat_praktik_i' => Yii::t('app', 'RT'),
            'rw_tempat_praktik_i' => Yii::t('app', 'RW'),
            'propinsi_id_tempat_praktik_i' => Yii::t('app', 'Provinsi'),
            'wilayah_id_tempat_praktik_i' => Yii::t('app', 'Kota/Kabupaten'),
            'kecamatan_id_tempat_praktik_i' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id_tempat_praktik_i' => Yii::t('app', 'Kelurahan'),
            'telpon_tempat_praktik_i' => Yii::t('app', 'Telepon'),
            'jenis_praktik_ii' => Yii::t('app', 'Jenis Praktik'),
            'nama_tempat_praktik_ii' => Yii::t('app', 'Nama Tempat Praktik/Fasilitas Kesehatan'),
            'nomor_sip_ii' => Yii::t('app', 'Nomor Sip'),
            'tanggal_berlaku_sip_ii' => Yii::t('app', 'Tanggal Masa Berlaku Sip'),
            'nama_gedung_praktik_ii' => Yii::t('app', 'Nama Gedung/Komplek'),
            'blok_tempat_praktik_ii' => Yii::t('app', 'Blok/Lantai'),
            'alamat_tempat_praktik_ii' => Yii::t('app', 'Nama Jalan'),
            'rt_tempat_praktik_ii' => Yii::t('app', 'RT'),
            'rw_tempat_praktik_ii' => Yii::t('app', 'RW'),
            'propinsi_id_tempat_praktik_ii' => Yii::t('app', 'Provinsi'),
            'wilayah_id_tempat_praktik_ii' => Yii::t('app', 'Kota/Kabupaten'),
            'kecamatan_id_tempat_praktik_ii' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id_tempat_praktik_ii' => Yii::t('app', 'Kelurahan'),
            'telpon_tempat_praktik_ii' => Yii::t('app', 'Telepon'),
            'id_izin_parent' => Yii::t('app', 'ID Parent'),
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
    public function getKepegawaian()
    {
        return $this->hasOne(\backend\models\Kepegawaian::className(), ['id' => 'kepegawaian_id']);
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
    public function getIzinKesehatanJadwals()
    {
        return $this->hasMany(\backend\models\IzinKesehatanJadwal::className(), ['izin_kesehatan_id' => 'id'])
                ->orderBy(['id' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinKesehatanJadwalDuas()
    {
        return $this->hasMany(\backend\models\IzinKesehatanJadwalDua::className(), ['izin_kesehatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinKesehatanJadwalSatus()
    {
        return $this->hasMany(\backend\models\IzinKesehatanJadwalSatu::className(), ['izin_kesehatan_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinKesehatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinKesehatanQuery(get_called_class());
    }
}
