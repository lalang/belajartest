<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata".
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
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenkel
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property integer $propinsi_id
 * @property integer $wilayah_id
 * @property integer $kecamatan_id
 * @property integer $kelurahan_id
 * @property string $kodepos
 * @property string $email
 * @property string $telepon
 * @property integer $kewarganegaraan_id
 * @property string $kitas
 * @property string $passport
 * @property string $npwp_perusahaan
 * @property string $nama_perusahaan
 * @property string $nama_gedung_perusahaan
 * @property string $blok_perusahaan
 * @property string $alamat_perusahaan
 * @property integer $propinsi_id_perusahaan
 * @property integer $wilayah_id_perusahaan
 * @property integer $kecamatan_id_perusahaan
 * @property integer $kelurahan_id_perusahaan
 * @property string $kodepos_perusahaan
 * @property string $telpon_perusahaan
 * @property string $fax_perusahaan
 * @property string $email_perusahaan
 * @property string $nomor_akta_pendirian
 * @property string $tanggal_pendirian
 * @property string $nama_notaris_pendirian
 * @property string $nomor_sk_pengesahan
 * @property string $tanggal_pengesahan
 * @property string $nomor_akta_cabang
 * @property string $tanggal_cabang
 * @property string $nama_notaris_cabang
 * @property string $keputusan_cabang
 * @property string $tanggal_keputusan_cabang
 * @property string $identitas_sama
 * @property string $nik_penanggung_jawab
 * @property string $nama_penanggung_jawab
 * @property string $tempat_lahir_penanggung_jawab
 * @property string $tanggal_lahir_penanggung_jawab
 * @property string $jenkel_penanggung_jawab
 * @property string $alamat_penanggung_jawab
 * @property string $rt_penanggung_jawab
 * @property string $rw_penanggung_jawab
 * @property integer $propinsi_id_penanggung_jawab
 * @property integer $wilayah_id_penanggung_jawab
 * @property integer $kecamatan_id_penanggung_jawab
 * @property integer $kelurahan_id_penanggung_jawab
 * @property string $kodepos_penanggung_jawab
 * @property string $telepon_penanggung_jawab
 * @property integer $kewarganegaraan_id_penanggung_jawab
 * @property string $kitas_penanggung_jawab
 * @property string $passport_penanggung_jawab
 * @property string $no_tdup
 * @property string $tanggal_tdup
 * @property string $merk_nama_usaha
 * @property string $titik_koordinat
 * @property string $latitude
 * @property string $longitude
 * @property string $nama_gedung_usaha
 * @property string $blok_usaha
 * @property string $alamat_usaha
 * @property string $rt_usaha
 * @property string $rw_usaha
 * @property integer $wilayah_id_usaha
 * @property integer $kecamatan_id_usaha
 * @property integer $kelurahan_id_usaha
 * @property string $kodepos_usaha
 * @property string $telpon_usaha
 * @property string $fax_usaha
 * @property string $nomor_objek_pajak_usaha
 * @property integer $jumlah_karyawan
 * @property string $npwpd
 * @property integer $intensitas_jasa_perjalanan
 * @property integer $kapasitas_penyedia_akomodasi
 * @property integer $jum_kursi_jasa_manum
 * @property integer $jum_stand_jasa_manum
 * @property integer $jum_pack_jasa_manum
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Lokasi $lokasi
 * @property \backend\models\Negara $kewarganegaraan
 * @property \backend\models\Negara $kewarganegaraanIdPenanggungJawab
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Status $status
 * @property \backend\models\User $user
 * @property \backend\models\IzinPariwisataAkta[] $izinPariwisataAktas
 * @property \backend\models\IzinPariwisataFasilitas[] $izinPariwisataFasilitas
 * @property \backend\models\IzinPariwisataJenisManum[] $izinPariwisataJenisManums
 * @property \backend\models\IzinPariwisataKapasitasAkomodasi[] $izinPariwisataKapasitasAkomodasis
 * @property \backend\models\IzinPariwisataKapasitasTransport[] $izinPariwisataKapasitasTransports
 * @property \backend\models\IzinPariwisataKbli[] $izinPariwisataKblis
 * @property \backend\models\IzinPariwisataTeknis[] $izinPariwisataTeknis
 * @property \backend\models\IzinPariwisataTujuanWisata[] $izinPariwisataTujuanWisatas
 */
class IzinPariwisata extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata';
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
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenkel' => Yii::t('app', 'Jenis Kelamin'),
            'alamat' => Yii::t('app', 'Alamat'),
            'rt' => Yii::t('app', 'RT'),
            'rw' => Yii::t('app', 'RW'),
            'propinsi_id' => Yii::t('app', 'Provinsi'),
            'wilayah_id' => Yii::t('app', 'Wilayah'),
            'kecamatan_id' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id' => Yii::t('app', 'Kelurahan '),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'email' => Yii::t('app', 'Email'),
            'telepon' => Yii::t('app', 'Telepon'),
            'kewarganegaraan_id' => Yii::t('app', 'Kewarganegaraan'),
            'kitas' => Yii::t('app', 'Kitas'),
            'passport' => Yii::t('app', 'Passport'),
            'npwp_perusahaan' => Yii::t('app', 'NPWP Perusahaan'),
            'nama_perusahaan' => Yii::t('app', 'Nama Perusahaan'),
            'nama_gedung_perusahaan' => Yii::t('app', 'Nama Gedung Perusahaan'),
            'blok_perusahaan' => Yii::t('app', 'Blok Perusahaan'),
            'alamat_perusahaan' => Yii::t('app', 'Alamat Perusahaan'),
            'propinsi_id_perusahaan' => Yii::t('app', 'Provinsi Perusahaan'),
            'wilayah_id_perusahaan' => Yii::t('app', 'Wilayah Perusahaan'),
            'kecamatan_id_perusahaan' => Yii::t('app', 'Kecamatan Perusahaan'),
            'kelurahan_id_perusahaan' => Yii::t('app', 'Kelurahan Perusahaan'),
            'kodepos_perusahaan' => Yii::t('app', 'Kodepos Perusahaan'),
            'telpon_perusahaan' => Yii::t('app', 'Telepon Perusahaan'),
            'fax_perusahaan' => Yii::t('app', 'Fax Perusahaan'),
            'email_perusahaan' => Yii::t('app', 'Email Perusahaan'),
            'nomor_akta_pendirian' => Yii::t('app', 'Nomor Akta Pendirian'),
            'tanggal_pendirian' => Yii::t('app', 'Tanggal Pendirian'),
            'nama_notaris_pendirian' => Yii::t('app', 'Nama Notaris Pendirian'),
            'nomor_sk_pengesahan' => Yii::t('app', 'Nomor SK Pengesahan'),
            'tanggal_pengesahan' => Yii::t('app', 'Tanggal Pengesahan'),
            'nomor_akta_cabang' => Yii::t('app', 'Nomor Akta Cabang'),
            'tanggal_cabang' => Yii::t('app', 'Tanggal Akta Cabang'),
            'nama_notaris_cabang' => Yii::t('app', 'Nama Notaris Cabang'),
            'keputusan_cabang' => Yii::t('app', 'Keputusan Cabang'),
            'tanggal_keputusan_cabang' => Yii::t('app', 'Tanggal Keputusan Cabang'),
            'identitas_sama' => Yii::t('app', 'Identitas sama dengan Pemilik'),
            'nik_penanggung_jawab' => Yii::t('app', 'NIK Penanggung Jawab'),
            'nama_penanggung_jawab' => Yii::t('app', 'Nama Penanggung Jawab'),
            'tempat_lahir_penanggung_jawab' => Yii::t('app', 'Tempat Lahir Penanggung Jawab'),
            'tanggal_lahir_penanggung_jawab' => Yii::t('app', 'Tanggal Lahir Penanggung Jawab'),
            'jenkel_penanggung_jawab' => Yii::t('app', 'Jenis Kelamin Penanggung Jawab'),
            'alamat_penanggung_jawab' => Yii::t('app', 'Alamat Penanggung Jawab'),
            'rt_penanggung_jawab' => Yii::t('app', 'RT'),
            'rw_penanggung_jawab' => Yii::t('app', 'RW'),
            'propinsi_id_penanggung_jawab' => Yii::t('app', 'Provinsi'),
            'wilayah_id_penanggung_jawab' => Yii::t('app', 'Wilayah Penanggung Jawab'),
            'kecamatan_id_penanggung_jawab' => Yii::t('app', 'Kecamatan'),
            'kelurahan_id_penanggung_jawab' => Yii::t('app', 'Kelurahan'),
            'kodepos_penanggung_jawab' => Yii::t('app', 'Kodepos'),
            'telepon_penanggung_jawab' => Yii::t('app', 'Telepon Penanggung Jawab'),
            'kewarganegaraan_id_penanggung_jawab' => Yii::t('app', 'Kewarganegaraan Penanggung Jawab'),
            'kitas_penanggung_jawab' => Yii::t('app', 'Kitas Penanggung Jawab'),
            'passport_penanggung_jawab' => Yii::t('app', 'Passport Penanggung Jawab'),
            'no_tdup' => Yii::t('app', 'Nomor TDUP'),
            'tanggal_tdup' => Yii::t('app', 'Tanggal TDUP'),
            'merk_nama_usaha' => Yii::t('app', 'Merk / Nama Usaha'),
            'titik_koordinat' => Yii::t('app', 'Titik Koordinat'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longtitude'),
            'nama_gedung_usaha' => Yii::t('app', 'Nama Gedung Usaha'),
            'blok_usaha' => Yii::t('app', 'Blok Usaha'),
            'alamat_usaha' => Yii::t('app', 'Alamat Usaha'),
            'rt_usaha' => Yii::t('app', 'RT'),
            'rw_usaha' => Yii::t('app', 'RW'),
            'wilayah_id_usaha' => Yii::t('app', 'Kota / Kabupaten'),
            'kecamatan_id_usaha' => Yii::t('app', 'Kecamatan Usaha'),
            'kelurahan_id_usaha' => Yii::t('app', 'Kelurahan Usaha'),
            'kodepos_usaha' => Yii::t('app', 'Kodepos Usaha'),
            'telpon_usaha' => Yii::t('app', 'Telepon Usaha'),
            'fax_usaha' => Yii::t('app', 'Fax Usaha'),
            'nomor_objek_pajak_usaha' => Yii::t('app', 'Nomor Objek Pajak Usaha'),
            'jumlah_karyawan' => Yii::t('app', 'Jumlah Karyawan'),
            'npwpd' => Yii::t('app', 'NPWPD'),
            'intensitas_jasa_perjalanan' => Yii::t('app', 'Intensitas Jasa Perjalanan'),
            'kapasitas_penyedia_akomodasi' => Yii::t('app', 'Kapasitas Penyedia Akomodasi'),
            'jum_kursi_jasa_manum' => Yii::t('app', 'Jum Kursi Jasa Manum'),
            'jum_stand_jasa_manum' => Yii::t('app', 'Jum Stand Jasa Manum'),
            'jum_pack_jasa_manum' => Yii::t('app', 'Jum Pack Jasa Manum'),
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
    public function getKewarganegaraanIdPenanggungJawab()
    {
        return $this->hasOne(\backend\models\Negara::className(), ['id' => 'kewarganegaraan_id_penanggung_jawab']);
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
    public function getIzinPariwisataAktas()
    {
        return $this->hasMany(\backend\models\IzinPariwisataAkta::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataFasilitas()
    {
        return $this->hasMany(\backend\models\IzinPariwisataFasilitas::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataJenisManums()
    {
        return $this->hasMany(\backend\models\IzinPariwisataJenisManum::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataKapasitasAkomodasis()
    {
        return $this->hasMany(\backend\models\IzinPariwisataKapasitasAkomodasi::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataKapasitasTransports()
    {
        return $this->hasMany(\backend\models\IzinPariwisataKapasitasTransport::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataKblis()
    {
        return $this->hasMany(\backend\models\IzinPariwisataKbli::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataTeknis()
    {
        return $this->hasMany(\backend\models\IzinPariwisataTeknis::className(), ['izin_pariwisata_id' => 'id']);
    }
	
	 public function getIzinPariwisataTekniss()
    {
        return $this->hasMany(\backend\models\IzinPariwisataTeknis::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataTujuanWisatas()
    {
        return $this->hasMany(\backend\models\IzinPariwisataTujuanWisata::className(), ['izin_pariwisata_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataQuery(get_called_class());
    }
}
