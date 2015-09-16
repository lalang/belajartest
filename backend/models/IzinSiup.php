<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinSiup as BaseIzinSiup;
use backend\models\Perizinan;
use backend\models\Lokasi;

/**
 * This is the model class for table "izin_siup".
 */
class IzinSiup extends BaseIzinSiup {

    public $kabupaten_kota;
    public $kecamatan;
    public $kelembagaan;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $id_kelurahan;
    public $id_kecamatan;
    public $id_kabkota;
    public $propinsi = 'DKI Jakarta';
    public $teks_validasi;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'ktp', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'npwp_perusahaan', 'nama_perusahaan', 'alamat_perusahaan', 'kelurahan_id', 'status_perusahaan', 'kode_pos', 'bentuk_perusahaan', 'akta_pendirian_no', 'akta_pendirian_tanggal', 'akta_pengesahan_no', 'akta_pengesahan_tanggal', 'no_sk', 'no_daftar', 'tanggal_pengesahan', 'modal', 'barang_jasa_dagangan', 'tanggal_neraca', 'aktiva_lancar_kas', 'aktiva_lancar_bank', 'aktiva_lancar_piutang', 'aktiva_lancar_barang', 'aktiva_lancar_pekerjaan', 'aktiva_tetap_peralatan', 'aktiva_tetap_investasi', 'aktiva_lainnya', 'pasiva_hutang_dagang', 'pasiva_hutang_pajak', 'pasiva_hutang_lainnya', 'hutang_jangka_panjang', 'kekayaan_bersih'], 'required'],
            [['perizinan_id', 'izin_id', 'user_id', 'kelurahan_id'], 'integer'],
            [['ktp', 'telepon', 'fax', 'passport', 'telpon_perusahaan', 'fax_perusahaan', 'kode_pos', 'npwp_perusahaan'], 'number'],
            [['nama', 'tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'nama_perusahaan', 'alamat', 'alamat_perusahaan', 'status_perusahaan', 'bentuk_perusahaan'], 'string'],
            [['nama', 'tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'nama_perusahaan', 'status_perusahaan', 'bentuk_perusahaan'], 'match', 'pattern' => '/^[a-zA-Z ]+$/', 'message' => Yii::t('app', 'Only alphabetic characters allowed')],
            [['tanggal_lahir', 'akta_pendirian_tanggal', 'akta_pengesahan_tanggal', 'tanggal_pengesahan', 'tanggal_neraca'], 'safe'],
            [['modal', 'nilai_saham_pma', 'saham_nasional', 'saham_asing', 'aktiva_lancar_kas', 'aktiva_lancar_bank', 'aktiva_lancar_piutang', 'aktiva_lancar_barang', 'aktiva_lancar_pekerjaan', 'aktiva_tetap_peralatan', 'aktiva_tetap_investasi', 'aktiva_lainnya', 'pasiva_hutang_dagang', 'pasiva_hutang_pajak', 'pasiva_hutang_lainnya', 'hutang_jangka_panjang', 'kekayaan_bersih'], 'number'],
            [['ktp', 'passport', 'status'], 'string', 'max' => 16],
            [['nama', 'nama_perusahaan', 'barang_jasa_dagangan'], 'string', 'max' => 100],
            [['tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'akta_pendirian_no', 'akta_pengesahan_no', 'no_sk', 'no_daftar'], 'string', 'max' => 50],
            [['telepon', 'fax', 'telpon_perusahaan', 'fax_perusahaan'], 'string', 'max' => 12],
            [['npwp_perusahaan'], 'string', 'max' => 15],
            [['kode_pos'], 'string', 'max' => 5, 'min' => 5]
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $pid = Perizinan::addNew($this->izin_id);
            $this->perizinan_id = $pid;
            return true;
        } else {
            return false;
        }
    }

    public function afterFind() {
        parent::afterFind();
        $lokasi = Lokasi::findOne($this->kelurahan_id);
        $this->nama_kelurahan = $lokasi->nama;
        $this->nama_kecamatan = Lokasi::findOne(['substr(kode,1,8)' => substr($lokasi->kode, 0, 8)])->nama;
        $this->nama_kabkota = Lokasi::findOne(['substr(kode,1,5)' => substr($lokasi->kode, 0, 5)])->nama;
        $this->id_kelurahan = $lokasi->id;
        $this->id_kecamatan = Lokasi::findOne(['substr(kode,1,8)' => substr($lokasi->kode, 0, 8)])->id;
        $this->id_kabkota = Lokasi::findOne(['substr(kode,1,5)' => substr($lokasi->kode, 0, 5)])->id;
        if (strpos(strtolower($this->izin->nama), 'besar') !== false)
            $this->kelembagaan = 'Perdagangan Besar';
        else if (strpos(strtolower($this->izin->nama), 'menengah') !== false)
            $this->kelembagaan = 'Perdagangan Menengah';
        else if (strpos(strtolower($this->izin->nama), 'kecil') !== false)
            $this->kelembagaan = 'Perdagangan Kecil';
        else
            $this->kelembagaan = 'Usaha Mikro';
        
        $validasi = $this->izin->teks_validasi;
        $validasi = str_replace('{no_izin}', $this->perizinan->no_izin, $validasi);
        $validasi = str_replace('{tanggal_izin}', $this->perizinan->tanggal_izin, $validasi);
        $validasi = str_replace('{tanggal_expired}', $this->perizinan->tanggal_expired, $validasi);
        $validasi = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $validasi);
        $validasi = str_replace('{npwp_nik}', $this->npwp_perusahaan . '/' . $siup->ktp, $validasi);
        $validasi = str_replace('{nama_izin}', $this->izin->nama, $validasi);

        $kblis = $this->izinSiupKblis;
        $kode_kbli = '';
        $list_kbli = '<ul>';
        foreach ($kblis as $kbli) {
            $kode_kbli .= $kbli->kbli->kode . ', ';
            $list_kbli .= '<li>' . $kbli->kbli->nama . '</li>';
        }

        $validasi = str_replace('{kbli}', $kode_kbli, $validasi);
        $validasi = str_replace('{modal}', $this->modal, $validasi);
        $this->teks_validasi = $validasi;
    }

}
