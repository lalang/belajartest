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
    public $preview_data;
    public $teks_penolakan;
    public $total_aktiva;
    public $total_aktiva_tetap;
    public $total_aktiva_lainnya;
    public $total_hutang;
    public $total_kekayaan;
    public $surat_kuasa;
    public $surat_pengurusan;
    public $tanda_register;

    /**
     * @inheritdoc
     */
    public function rules() {
        //required = 'akta_pengesahan_no', 'akta_pengesahan_tanggal', 'no_daftar', 'barang_jasa_dagangan',
        return [
            [['user_id', 'ktp', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'nama_perusahaan', 'alamat_perusahaan', 'kelurahan_id', 'status_perusahaan', 'kode_pos', 'bentuk_perusahaan', 'akta_pendirian_no', 'akta_pendirian_tanggal', 'no_sk', 'tanggal_pengesahan', 'modal', 'tanggal_neraca', 'aktiva_lancar_kas', 'aktiva_lancar_bank', 'aktiva_lancar_piutang', 'aktiva_lancar_barang', 'aktiva_lancar_pekerjaan', 'aktiva_tetap_peralatan', 'aktiva_tetap_investasi', 'aktiva_lainnya', 'pasiva_hutang_dagang', 'pasiva_hutang_pajak', 'pasiva_hutang_lainnya', 'hutang_jangka_panjang', 'kekayaan_bersih'], 'required'],
            [['perizinan_id', 'izin_id', 'status_id', 'user_id', 'kelurahan_id'], 'integer'],
            [['ktp', 'telepon', 'fax', 'telpon_perusahaan', 'fax_perusahaan', 'kode_pos', 'npwp_perusahaan'], 'number'],
            [['nama', 'tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan', 'nama_perusahaan', 'alamat', 'alamat_perusahaan', 'status_perusahaan', 'bentuk_perusahaan'], 'string'],
            [['nama', 'tempat_lahir', 'kewarganegaraan', 'jabatan_perusahaan'], 'match', 'pattern' => '/^[a-zA-Z ]+$/', 'message' => Yii::t('app', 'Only alphabetic characters allowed')],
            [['passport'], 'match', 'pattern' => '/^[a-zA-Z 0-9]+$/', 'message' => Yii::t('app', 'Only alphabetic characters allowed')],
            [['tanggal_lahir', 'akta_pendirian_tanggal', 'akta_pengesahan_tanggal', 'tanggal_pengesahan', 'tanggal_neraca', 'nilai_saham_pma', 'saham_nasional', 'saham_asing'], 'safe'],
            //[['modal', 'nilai_saham_pma', 'saham_nasional', 'saham_asing', 'aktiva_lancar_kas', 'aktiva_lancar_bank', 'aktiva_lancar_piutang', 'aktiva_lancar_barang', 'aktiva_lancar_pekerjaan', 'aktiva_tetap_peralatan', 'aktiva_tetap_investasi', 'aktiva_lainnya', 'pasiva_hutang_dagang', 'pasiva_hutang_pajak', 'pasiva_hutang_lainnya', 'hutang_jangka_panjang', 'kekayaan_bersih'], 'number'],
            [['ktp', 'passport'], 'string', 'max' => 16],
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

                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi);

                $this->perizinan_id = $pid;
                $this->lokasi_id = $lokasi;
            }
            $this->modal = str_replace('.', '', $this->modal);
            $this->nilai_saham_pma = str_replace('.', '', $this->nilai_saham_pma);
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
        $izin = Izin::findOne($this->izin_id);
        $perizinan = Perizinan::findOne($this->perizinan_id);
        $lokasi = Lokasi::findOne($this->kelurahan_id);
        $this->nama_kelurahan = $lokasi->nama;
        $this->nama_kecamatan = Lokasi::findOne(['substr(kode,1,8)' => substr($lokasi->kode, 0, 8)])->nama;
        $this->nama_kabkota = Lokasi::findOne(['substr(kode,1,5)' => substr($lokasi->kode, 0, 5)])->nama;
        $this->id_kelurahan = $lokasi->id;
        $this->id_kecamatan = Lokasi::findOne(['substr(kode,1,8)' => substr($lokasi->kode, 0, 8)])->id;
        $this->id_kabkota = Lokasi::findOne(['substr(kode,1,5)' => substr($lokasi->kode, 0, 5)])->id;
        if (strpos(strtolower($izin->nama), 'besar') !== false)
            $this->kelembagaan = 'Perdagangan Besar';
        else if (strpos(strtolower($izin->nama), 'menengah') !== false)
            $this->kelembagaan = 'Perdagangan Menengah';
        else if (strpos(strtolower($izin->nama), 'kecil') !== false)
            $this->kelembagaan = 'Perdagangan Kecil';
        else
            $this->kelembagaan = 'Usaha Mikro';

        $validasi = $izin->template_valid;
        $validasi = str_replace('{no_izin}', $perizinan->no_izin, $validasi);
        $validasi = str_replace('{tanggal_izin}', $perizinan->tanggal_izin, $validasi);
        $validasi = str_replace('{tanggal_expired}', $perizinan->tanggal_expired, $validasi);
        $validasi = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $validasi);
        $validasi = str_replace('{npwp_nik}', $this->npwp_perusahaan . '/' . $this->ktp, $validasi);
        $validasi = str_replace('{nama_izin}', $izin->nama, $validasi);

        $kblis = IzinSiupKbli::findAll(['izin_siup_id' => $this->id]); // $this->izinSiupKblis;
        $kode_kbli = '';
        $list_kbli = '<ul>';
        foreach ($kblis as $kbli) {
             $kd = \backend\models\Kbli::findOne(['kode' => $kbli->kbli->kode])->parent_id;
             if($kd == ''){
                 $kode=$kbli->kbli->kode;
             } else{
             $kode = \backend\models\Kbli::findOne(['id' => $kd])->kode;
             }
            $kode_kbli .= '<tr><td valign="top" WIDTH="7%"><p>' .$kode. '</td><td WIDTH="42%" valign="top"><p style="text-align: justify;">' . $kbli->kbli->nama . '</td><td width="4%">&nbsp;</td><td WIDTH="45%" valign="top"><p style="text-align: justify;">' . $kbli->keterangan . '</td></tr>';
        }
//      
        $validasi = str_replace('{kbli}', $kode_kbli, $validasi);
        $validasi = str_replace('{modal}', $this->modal, $validasi);
        $this->teks_validasi = $validasi;

        //==========================
        $sk_siup = $izin->template_sk;
        $preview_sk = $izin->template_preview;
//
//        //        $kblis = $this->izinSiupKblis;

//
//        $kode_kbli = '';
//        $list_kbli = '<ul>';
//        foreach ($kblis as $kbli) {
//            $kode_kbli .= '<li>'.$kbli->kbli->kode . ' &nbsp;&nbsp;'.$kbli->kbli->nama. '</li>';
//         }
//
//        
//       
        $wewenang_id = Izin::findOne($this->izin_id)->wewenang_id;
        if ($wewenang_id > 2) {
            $wewenang_nama = Izin::findOne($this->izin_id)->wewenang->nama;
        }
        $preview_sk = str_replace('{namawil}', $wewenang_nama . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_sk);
        $preview_sk = str_replace('{nama}', $this->nama, $preview_sk);
        $preview_sk = str_replace('{alamat}', $this->alamat_perusahaan, $preview_sk);
        $preview_sk = str_replace('{jabatan_perusahaan}', $this->jabatan_perusahaan, $preview_sk);
        $preview_sk = str_replace('{telpon_perusahaan}', $this->telpon_perusahaan, $preview_sk);
        $preview_sk = str_replace('{kekayaan_bersih}', 'Rp. ' . number_format($this->kekayaan_bersih, 2, ',', '.'), $preview_sk);
        $preview_sk = str_replace('{kelembagaan}', $this->kelembagaan, $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_sk);
        $preview_sk = str_replace('{kode_kbli}', $kode_kbli, $preview_sk);
        $preview_sk = str_replace('{list_kbli}', $list_kbli, $preview_sk);
        $preview_sk = str_replace('{barang_jasa_dagangan}', $this->barang_jasa_dagangan, $preview_sk);
        $preview_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: l, d F Y'), $preview_sk);
//        $preview_sk = str_replace('{nm_kepala}', 'Kepala', $preview_sk);
//        $preview_sk = str_replace('{nip_kepala}', 'NIP', $preview_sk);
//        $expired = \backend\models\Perizinan::getExpired($perizinan->tanggal_mohon, $perizinan->izin->masa_berlaku, $perizinan->izin->masa_berlaku_satuan);
//
//        $preview_sk = str_replace('{expired}', Yii::$app->formatter->asDate($expired, 'php: l, d F Y'), $preview_sk);
//        $preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $this->perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);
//        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $this->teks_preview = $preview_sk;

        if ($perizinan->zonasi_id != null) {
            if ($perizinan->zonasi_sesuai == 'Y') {
                $zonasi_sesuai = 'Sesuai';
            } else {
                $zonasi_sesuai = 'Tidak Sesuai';
            }
            $zonasi = $perizinan->zonasi->kode . '&nbsp;' . $perizinan->zonasi->zonasi . '&nbsp;(' . $zonasi_sesuai . ')';
            $sk_siup = str_replace('{zonasi}', $zonasi, $sk_siup);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $sk_siup = str_replace('{no_izin}', $perizinan->no_izin, $sk_siup);
            $sk_siup = str_replace('{nm_kepala}', $user->profile->name, $sk_siup);
            $sk_siup = str_replace('{nip_kepala}', $user->no_identitas, $sk_siup);
            $sk_siup = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $sk_siup);
        }
        $sk_siup = str_replace('{namawil}', $wewenang_nama . '&nbsp;' . $perizinan->lokasiIzin->nama, $sk_siup);
        $sk_siup = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $sk_siup);
        $sk_siup = str_replace('{nama}', strtoupper($this->nama), $sk_siup);
        $sk_siup = str_replace('{alamat}', strtoupper($this->alamat_perusahaan), $sk_siup);
        $sk_siup = str_replace('{jabatan_perusahaan}', strtoupper($this->jabatan_perusahaan), $sk_siup);
        $sk_siup = str_replace('{telpon_perusahaan}', $this->telpon_perusahaan, $sk_siup);
        $sk_siup = str_replace('{kekayaan_bersih}', 'Rp. ' . number_format($this->kekayaan_bersih, 2, ',', '.'), $sk_siup);
        $sk_siup = str_replace('{kelembagaan}', strtoupper($this->kelembagaan), $sk_siup);
        $sk_siup = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $sk_siup);
        $sk_siup = str_replace('{kode_kbli}', $kode_kbli, $sk_siup);
        $sk_siup = str_replace('{list_kbli}', $list_kbli, $sk_siup);
        $sk_siup = str_replace('{barang_jasa_dagangan}', $this->barang_jasa_dagangan, $sk_siup);
        $sk_siup = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('d M Y'), 'php: d F Y'), $sk_siup);

        $sk_siup = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $sk_siup);
        ////        $sk_siup = str_replace('{foto}', '<img src="/uploads/'.$this->perizinan->perizinanBerkas[0]->userFile->filename.'" width="120px" height="160px"/>', $sk_siup);
        // $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $this->teks_sk = $sk_siup;

        //==================================

        $sk_penolakan = $izin->template_penolakan;
        
        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id'=>5]);
        
        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kpos}', $kantorByReg->kodepos, $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate(date('d M Y'), 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', $this->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_registrasi}',$perizinan->kode_registrasi , $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_mohon}', $perizinan->tanggal_mohon, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_izin}', $izin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{keterangan}', $alasan->keterangan, $sk_penolakan);
        
        $sk_penolakan = str_replace('{namawil}', $wewenang_nama . '&nbsp;' . $perizinan->lokasiIzin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_kepala}',$user->profile->name, $sk_penolakan);
        $sk_penolakan = str_replace('{nip_kepala}',$user->no_identitas, $sk_penolakan);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $this->teks_penolakan = $sk_penolakan;

        //=================

        $this->total_aktiva = $this->aktiva_lancar_kas + $this->aktiva_lancar_bank + $this->aktiva_lancar_piutang + $this->aktiva_lancar_barang + $this->aktiva_lancar_pekerjaan;
        $this->total_aktiva_tetap = $this->aktiva_tetap_peralatan + $this->aktiva_tetap_investasi;
        $this->total_aktiva_lainnya = $this->total_aktiva + $this->total_aktiva_tetap + $this->aktiva_lainnya;
        $this->total_hutang = $this->pasiva_hutang_dagang + $this->pasiva_hutang_pajak + $this->pasiva_hutang_lainnya;
        $this->total_kekayaan = $this->total_hutang + $this->hutang_jangka_panjang + $this->kekayaan_bersih;
        

        //====================preview data========
         $preview_data = $izin->preview_data;
         $preview_data = str_replace('{nik}', $this->ktp, $preview_data);
         $preview_data = str_replace('{ktp}', $this->ktp, $preview_data);
         $preview_data = str_replace('{nama}', $this->nama, $preview_data);
         $preview_data = str_replace('{alamat}', $this->alamat, $preview_data);
         $preview_data = str_replace('{ttl}', $this->tempat_lahir.','.Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_data);
         $preview_data = str_replace('{telp}', $this->telepon, $preview_data);
         $preview_data = str_replace('{fax}', $this->fax, $preview_data);
         $preview_data = str_replace('{passport}', $this->passport, $preview_data);
         $preview_data = str_replace('{kewarganegaraan}', $this->kewarganegaraan, $preview_data);
         $preview_data = str_replace('{jabatan_perusahaan}', $this->jabatan_perusahaan, $preview_data);
         $preview_data = str_replace('{npwp_perusahaan}', $this->npwp_perusahaan, $preview_data);
         $preview_data = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_data);
         $preview_data = str_replace('{bentuk_perusahaan}', $this->bentuk_perusahaan, $preview_data);
         $preview_data = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $preview_data);
         $preview_data = str_replace('{propinsi}', $this->propinsi, $preview_data);
         $preview_data = str_replace('{kabupaten}', $this->nama_kabkota, $preview_data);
         $preview_data = str_replace('{kecamatan}', $this->nama_kecamatan, $preview_data);
         $preview_data = str_replace('{kelurahan}', $this->nama_kelurahan, $preview_data);
         $preview_data = str_replace('{kode_pos}', $this->kode_pos, $preview_data);
         $preview_data = str_replace('{telpon_perusahaan}', $this->telpon_perusahaan, $preview_data);
         $preview_data = str_replace('{fax_perusahaan}', $this->fax_perusahaan, $preview_data);
         $preview_data = str_replace('{status_perusahaan}', $this->status_perusahaan, $preview_data);
         $preview_data = str_replace('{akta_pendirian_no}', $this->akta_pendirian_no, $preview_data);
         $preview_data = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->akta_pendirian_tanggal, 'php: d F Y'), $preview_data);
         $preview_data = str_replace('{no_sk}', $this->no_sk, $preview_data);
         $preview_data = str_replace('{tanggal_pengesahan}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $preview_data);
         $preview_data = str_replace('{modal}', number_format($this->modal, 2, ',', '.'), $preview_data);
         $preview_data = str_replace('{saham_pma}',number_format($this->nilai_saham_pma, 2, ',', '.'), $preview_data);
         $preview_data = str_replace('{saham_nasional}', $this->saham_nasional, $preview_data);
         $preview_data = str_replace('{saham_asing}', $this->saham_asing, $preview_data);
         $preview_data = str_replace('{kelembagaan}', $this->kelembagaan, $preview_data);
        
         $a = 1;
          $kbliss = IzinSiupKbli::findAll(['izin_siup_id' => $this->id]); // $this->izinSiupKblis;
          $kode_kblii = '';
         foreach ($kbliss as $kblii) {
            $kd = \backend\models\Kbli::findOne(['kode' => $kblii->kbli->kode])->parent_id;
             if($kd == ''){
                 $kode=$kblii->kbli->kode;
             } else{
             $kode = \backend\models\Kbli::findOne(['id' => $kd])->kode;
             }
            $kode_kblii .='
            <tr>
                <td  width="34" valign="top">
                   '. $a .'.
                </td>
                <td width="150">
                    <p>Kode KBLI</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="293">
                    <p>'.$kode.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Nama KBLI
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$kbli->kbli->nama.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Keterangan
                </td>
                <td valign="top">:</td>
                <td>
                   '. $kbli->keterangan.'
                </td>
            </tr>';
            $a++;
        }
          $akt = \backend\models\IzinSiupAkta::findOne(['izin_siup_id'=> $this->id])->nomor_akta;
        if( $akt <> ''){
           // $akta = \backend\models\IzinSiupAkta::findOne(['izin_siup_id'=> $this->id]);
            $akta = \backend\models\IzinSiupAkta::findBySql('SELECT * FROM izin_siup_akta where izin_siup_id = "'.$this->id.'"order by tanggal_akta desc')->one();
$perubahan .='	<tr><td >2.</td>
            <td  valign="top">
                <p>Akta Perubahan</p>
            </td>
            <td  valign="top"></td>
            <td  valign="top"  >
                <p></p>
            </td>
        </tr>
	<tr><td ></td>
            <td valign="top">
                <p>a. Nomor & Tgl Akta</p>
            </td>
            <td  valign="top">:</td>
            <td  valign="top"  >
                <p>'.$akta->nomor_akta.' &nbsp; & &nbsp;'.Yii::$app->formatter->asDate($akta->tanggal_akta, 'php: d F Y').'</p>
            </td>
        </tr>
        <tr><td ></td>
            <td valign="top">
                <p>b. Nomor & tgl Pengesahan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p>'.$akta->nomor_pengesahan.' &nbsp; & &nbsp;'.Yii::$app->formatter->asDate($akta->tanggal_pengesahan, 'php: d F Y').'</p>
            </td>
        </tr>';
    }
         $preview_data = str_replace('{kblii}', $kode_kblii, $preview_data);
         $preview_data = str_replace('{akta_perubahan}', $perubahan, $preview_data);
         $preview_data = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
         
         $this->preview_data = $preview_data;
         
         //----------------surat Kuasa--------------------
         $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa'])->value;
         $kuasa = str_replace('{pemohon}', $this->nama, $kuasa);
         $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
         $this->surat_kuasa=$kuasa;
         //----------------surat pengurusan--------------------
         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan'])->value;
         $pengurusan = str_replace('{pemohon}', $this->nama, $pengurusan);
         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
         //----------------daftar--------------------
         $daftar= \backend\models\Params::findOne(['name'=> 'Tanda Registrasi'])->value;
         $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
         $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
         $daftar = str_replace('{npwp}', $this->npwp_perusahaan, $daftar);
         $daftar = str_replace('{nama_ph}', $this->nama_perusahaan, $daftar);
         $daftar = str_replace('{kantor_ptsp}', $perizinan->lokasiPengambilan->nama, $daftar);
         $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
         $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
         $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
         $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id'=>$perizinan->lokasi_pengambilan_id])->alamat, $daftar);
         $this->tanda_register=$daftar;
    }
    

}
