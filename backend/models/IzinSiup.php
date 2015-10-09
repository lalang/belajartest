<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinSiup as BaseIzinSiup;
use backend\models\Perizinan;
use backend\models\Lokasi;
use backend\models\Izin;

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
    public $teks_sk;
    public $teks_preview;
    public $teks_penolakan;
    public $total_aktiva;
    public $total_aktiva_tetap;
    public $total_aktiva_lainnya;
    public $total_hutang;
    public $total_kekayaan;

    /**
     * @inheritdoc
     */
    public function rules() {
        //required = 'akta_pengesahan_no', 'akta_pengesahan_tanggal', 'no_daftar', 'barang_jasa_dagangan',
        return [
            [['user_id', 'ktp', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'npwp_perusahaan', 'nama_perusahaan', 'alamat_perusahaan', 'kelurahan_id', 'status_perusahaan', 'kode_pos', 'bentuk_perusahaan', 'akta_pendirian_no', 'akta_pendirian_tanggal', 'no_sk', 'tanggal_pengesahan', 'modal', 'tanggal_neraca', 'aktiva_lancar_kas', 'aktiva_lancar_bank', 'aktiva_lancar_piutang', 'aktiva_lancar_barang', 'aktiva_lancar_pekerjaan', 'aktiva_tetap_peralatan', 'aktiva_tetap_investasi', 'aktiva_lainnya', 'pasiva_hutang_dagang', 'pasiva_hutang_pajak', 'pasiva_hutang_lainnya', 'hutang_jangka_panjang', 'kekayaan_bersih'], 'required'],
            [['perizinan_id', 'izin_id', 'user_id', 'kelurahan_id'], 'integer'],
            [['ktp', 'telepon', 'fax', 'telpon_perusahaan', 'fax_perusahaan', 'kode_pos', 'npwp_perusahaan'], 'number'],
            [['nama', 'tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'nama_perusahaan', 'alamat', 'alamat_perusahaan', 'status_perusahaan', 'bentuk_perusahaan'], 'string'],
            [['nama', 'tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'status_perusahaan', 'bentuk_perusahaan'], 'match', 'pattern' => '/^[a-zA-Z ]+$/', 'message' => Yii::t('app', 'Only alphabetic characters allowed')],
            [['passport'], 'match', 'pattern' => '/^[a-zA-Z 0-9]+$/', 'message' => Yii::t('app', 'Only alphabetic characters allowed')],
            [['tanggal_lahir', 'akta_pendirian_tanggal', 'akta_pengesahan_tanggal', 'tanggal_pengesahan', 'tanggal_neraca', 'nilai_saham_pma', 'saham_nasional', 'saham_asing'], 'safe'],
            //[['modal', 'nilai_saham_pma', 'saham_nasional', 'saham_asing', 'aktiva_lancar_kas', 'aktiva_lancar_bank', 'aktiva_lancar_piutang', 'aktiva_lancar_barang', 'aktiva_lancar_pekerjaan', 'aktiva_tetap_peralatan', 'aktiva_tetap_investasi', 'aktiva_lainnya', 'pasiva_hutang_dagang', 'pasiva_hutang_pajak', 'pasiva_hutang_lainnya', 'hutang_jangka_panjang', 'kekayaan_bersih'], 'number'],
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
//            $status = \Yii::$app->session->get('user.status');
            if ($this->isNewRecord) {
            $wewenang = Izin::findOne($this->izin_id)->wewenang_id;

            $lokasi = Lokasi::findOne($this->kelurahan_id);

            $this->wilayah_id = Lokasi::findOne(['substr(kode,1,5)' => substr($lokasi->kode, 0, 5)])->id;

            $this->kecamatan_id = Lokasi::findOne(['substr(kode,1,8)' => substr($lokasi->kode, 0, 8)])->id;

            switch ($wewenang) {
                case 1:
                    $lokasi = 11;
                    break;
                case 2:
                    $lokasi = $this->wilayah_id;
                    break;
                case 3:
                    $lokasi = $this->kecamatan_id;
                    break;
                case 4:
                    $lokasi = $this->kelurahan_id;
                    break;
                default:
                    $lokasi = 11;
            }

            $pid = Perizinan::addNew($this->izin_id, $this->status, $lokasi);

            $this->perizinan_id = $pid;
            $this->lokasi_id = $lokasi;
            }
            $this->modal = str_replace('.','', $this->modal);
            $this->nilai_saham_pma = str_replace('.','', $this->nilai_saham_pma);
            $this->saham_asing = $this->saham_asing;
            $this->saham_nasional = $this->saham_nasional;
            $this->kekayaan_bersih = str_replace('.', '', $this->kekayaan_bersih);
            $this->nilai_saham_pma = str_replace('.', '', $this->nilai_saham_pma);
            $this->nilai_saham_pma = str_replace('.', '', $this->nilai_saham_pma);
            $this->aktiva_lainnya = str_replace('.', '', $this->aktiva_lainnya);
            $this->aktiva_lancar_bank = str_replace('.', '', $this->aktiva_lancar_bank);
            $this->aktiva_lancar_barang = str_replace('.', '', $this->aktiva_lancar_barang);
            $this->aktiva_lancar_kas = str_replace('.', '', $this->aktiva_lancar_kas);
            $this->aktiva_lancar_pekerjaan = str_replace('.', '', $this->aktiva_lancar_pekerjaan);
            $this->aktiva_lancar_piutang = str_replace('.', '', $this->aktiva_lancar_piutang);
            $this->aktiva_tetap_investasi = str_replace('.', '', $this->aktiva_tetap_investasi);
            $this->aktiva_tetap_peralatan = str_replace('.', '', $this->aktiva_tetap_peralatan);
            $this->total_aktiva_lainnya = str_replace('.', '', $this->total_aktiva_lainnya);
            $this->total_aktiva_tetap = str_replace('.', '', $this->total_aktiva_tetap);
            $this->pasiva_hutang_dagang = str_replace('.', '', $this->pasiva_hutang_dagang);
            $this->pasiva_hutang_lainnya = str_replace('.', '', $this->pasiva_hutang_lainnya);
            $this->pasiva_hutang_pajak = str_replace('.', '', $this->pasiva_hutang_pajak);
            $this->hutang_jangka_panjang = str_replace('.', '', $this->hutang_jangka_panjang);
            $this->kekayaan_bersih = str_replace('.', '', $this->kekayaan_bersih);
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

        $validasi = $this->izin->template_valid;
        $validasi = str_replace('{no_izin}', $this->perizinan->no_izin, $validasi);
        $validasi = str_replace('{tanggal_izin}', $this->perizinan->tanggal_izin, $validasi);
        $validasi = str_replace('{tanggal_expired}', $this->perizinan->tanggal_expired, $validasi);
        $validasi = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $validasi);
        $validasi = str_replace('{npwp_nik}', $this->npwp_perusahaan . '/' . $this->ktp, $validasi);
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
        
        //==========================
        $sk_siup = $this->izin->template_sk;
        $preview_sk = $this->izin->template_sk;

        

        $kblis = $this->izinSiupKblis;
        $kode_kbli = '';
        $list_kbli = '<ul>';
        foreach ($kblis as $kbli) {
            $kode_kbli .= '<li>'.$kbli->kbli->kode . ' &nbsp;&nbsp;'.$kbli->kbli->nama. '</li>';
         }

        
        
       $preview_sk = str_replace('{namawil}', $this->perizinan->lokasiIzin->nama, $preview_sk);
       $preview_sk = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_sk);
       $preview_sk = str_replace('{nama}', $this->nama, $preview_sk);
        $preview_sk = str_replace('{alamat}', $this->alamat, $preview_sk);
        $preview_sk = str_replace('{jabatan_perusahaan}', $this->jabatan_perusahaan, $preview_sk);
        $preview_sk = str_replace('{telpon_perusahaan}', $this->telpon_perusahaan, $preview_sk);
        $preview_sk = str_replace('{kekayaan_bersih}', 'Rp. '.number_format($this->kekayaan_bersih,2,',','.'), $preview_sk);
        $preview_sk = str_replace('{kelembagaan}', $this->kelembagaan, $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_sk);
        $preview_sk = str_replace('{kode_kbli}', $kode_kbli, $preview_sk);
        $preview_sk = str_replace('{list_kbli}', $list_kbli, $preview_sk);
        $preview_sk = str_replace('{barang_jasa_dagangan}', $this->barang_jasa_dagangan, $preview_sk);
        $preview_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: l, d F Y'), $preview_sk);
        $preview_sk = str_replace('{nm_kepala}', 'Kepala', $preview_sk);
        $preview_sk = str_replace('{nip_kepala}', 'NIP', $preview_sk);
        $expired = \backend\models\Perizinan::getExpired($this->perizinan->tanggal_mohon, $this->perizinan->izin->masa_berlaku, $this->perizinan->izin->masa_berlaku_satuan);
        
        $preview_sk = str_replace('{expired}',Yii::$app->formatter->asDate($expired, 'php: l, d F Y'), $preview_sk);
        $preview_sk = str_replace('{foto}', '<img src="/uploads/'.$this->perizinan->perizinanBerkas[0]->userFile->filename.'" width="120px" height="160px"/>', $preview_sk);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $this->teks_preview = $preview_sk;
        
        $sk_siup = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $sk_siup);
        $sk_siup = str_replace('{nama}', $this->nama, $sk_siup);
        $sk_siup = str_replace('{alamat}', $this->alamat, $sk_siup);
        $sk_siup = str_replace('{jabatan_perusahaan}', $this->jabatan_perusahaan, $sk_siup);
        $sk_siup = str_replace('{telpon_perusahaan}', $this->telpon_perusahaan, $sk_siup);
        $sk_siup = str_replace('{kekayaan_bersih}', $this->kekayaan_bersih, $sk_siup);
        $sk_siup = str_replace('{kelembagaan}', $this->kelembagaan, $sk_siup);
        $sk_siup = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $sk_siup);
        $sk_siup = str_replace('{kode_kbli}', $kode_kbli, $sk_siup);
        $sk_siup = str_replace('{list_kbli}', $list_kbli, $sk_siup);
        $sk_siup = str_replace('{barang_jasa_dagangan}', $this->barang_jasa_dagangan, $sk_siup);
        $sk_siup = str_replace('{tanggal_sekarang}', date('d M Y'), $sk_siup);
        $sk_siup = str_replace('{nm_kepala}', Yii::$app->user->identity->profile->name, $sk_siup);
        $sk_siup = str_replace('{nip_kepala}', Yii::$app->user->identity->no_identitas, $sk_siup);
        $sk_siup = str_replace('{foto}', '<img src="/uploads/'.$this->perizinan->perizinanBerkas[0]->userFile->filename.'" width="120px" height="160px"/>', $sk_siup);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $this->teks_sk = $sk_siup;
        
        //==================================
        
        $sk_penolakan = $this->izin->template_penolakan;

        $sk_penolakan = str_replace('{no_sk}', '123', $sk_penolakan);
        $sk_penolakan = str_replace('{tanggal_sk}', date('d M Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', $this->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_perusahaan}', $this->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{barang_jasa_dagangan}', $this->barang_jasa_dagangan, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_kepala}', Yii::$app->user->identity->profile->name, $sk_penolakan);
        $sk_penolakan = str_replace('{nip_kepala}', Yii::$app->user->identity->no_identitas, $sk_penolakan);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $this->teks_penolakan = $sk_penolakan;
        
        //=================
        
        $this->total_aktiva = $this->aktiva_lancar_kas + $this->aktiva_lancar_bank + $this->aktiva_lancar_piutang + $this->aktiva_lancar_barang + $this->aktiva_lancar_pekerjaan;
        $this->total_aktiva_tetap = $this->aktiva_tetap_peralatan + $this->aktiva_tetap_investasi;
        $this->total_aktiva_lainnya = $this->total_aktiva + $this->total_aktiva_tetap + $this->aktiva_lainnya;
        $this->total_hutang = $this->pasiva_hutang_dagang + $this->pasiva_hutang_pajak + $this->pasiva_hutang_lainnya;
        $this->total_kekayaan = $this->total_hutang + $this->hutang_jangka_panjang + $this->kekayaan_bersih;
    }

}
