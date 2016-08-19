<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPenelitian as BaseIzinPenelitian;

/**
 * This is the model class for table "izin_penelitian".
 */
class IzinPenelitian extends BaseIzinPenelitian {

    public $kabupaten_kota;
    public $kecamatan;
    public $kelembagaan;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $nama_propinsi;
    public $nama_kelurahan_pt;
    public $nama_kecamatan_pt;
    public $nama_kabkota_pt;
    public $nama_propinsi_pt;
    public $nama_kabkota_penelitian;
    public $id_kelurahan;
    public $id_kecamatan;
    public $id_kabkota;
    public $propinsi = 'DKI Jakarta';
    public $form_bapl;
    public $teks_validasi;
    public $teks_sk;
    public $teks_preview;
    public $preview_data;
    public $teks_penolakan;
    public $teks_batal;
    public $digital_signature;
    public $surat_kuasa;
    public $surat_pengurusan;
    public $tanda_register;
    public $url_back;
    public $perizinan_proses_id;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nik', 'nama', 'kelurahan_pemohon', 'tgl_mulai_penelitian', 'telepon_instansi', 'tgl_akhir_penelitian', 'kab_penelitian'], 'required'],
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'kelurahan_pemohon', 'kecamatan_pemohon', 'kabupaten_pemohon', 'provinsi_pemohon', 'kelurahan_instansi', 'kecamatan_instansi', 'kabupaten_instansi', 'provinsi_instansi', 'kab_penelitian', 'kec_penelitian', 'kel_penelitian', 'anggota'], 'integer'],
            [['tanggal_lahir', 'tgl_mulai_penelitian', 'tgl_akhir_penelitian'], 'safe'],
            [['nik', 'rt', 'rw', 'kode_pos', 'kodepos_instansi', 'telepon_pemohon', 'telepon_instansi', 'fax_instansi', 'npwp'], 'number'],
            [['nik', 'rt', 'rw', 'kode_pos', 'kodepos_instansi', 'telepon_pemohon', 'telepon_instansi', 'fax_instansi', 'npwp'], 'match', 'pattern' => '/^[0-9]+$/', 'message' => Yii::t('app', 'Hanya angka yang diperbolehkan')],
            [['email_instansi', 'email'], 'email'],
            [['nama', 'tempat_lahir', 'email', 'pekerjaan_pemohon', 'email_instansi'], 'string', 'max' => 200],
            [['alamat_pemohon', 'nama_instansi', 'fakultas', 'alamat_instansi', 'tema', 'instansi_penelitian', 'alamat_penelitian', 'bidang_penelitian'], 'string', 'max' => 255],
            [['npwp'], 'string', 'max' => 15],
            [['nik'], 'string', 'max' => 16],
            [['rt', 'rw'], 'string', 'max' => 5],
            [['kode_pos', 'kodepos_instansi'], 'string', 'max' => 5, 'min' => 5],
            [['telepon_pemohon', 'telepon_instansi', 'fax_instansi'], 'string', 'max' => 15]
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
                switch ($wewenang) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->kab_penelitian;
                        break;
                    default:
                        $lokasi = 11;
                }
//                echo $this->id;
//                die();
                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi);

                $this->perizinan_id = $pid;
                $this->lokasi_id = $lokasi;
            } else {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
                switch ($wewenang) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->kab_penelitian;
                        break;
                    default:
                        $lokasi = 11;
                }
//                echo $this->id;
//                die();
                $this->lokasi_id = $lokasi;
                $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
                $perizinan->lokasi_izin_id = $lokasi;
                $perizinan->tanggal_expired = date($this->tgl_akhir_penelitian);
//            $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
                $perizinan->save();
            }

            return true;
        } else {
            return false;
        }
    }

    public function afterFind() {
        parent::afterFind();
        $izin = Izin::findOne($this->izin_id);
        $perizinan = Perizinan::findOne($this->perizinan_id);
        //      lokasi pengambilan 
        if ($perizinan->lokasiPengambilan->kecamatan == '00' and $perizinan->lokasiPengambilan->kelurahan == '0000') {
            $tempat_ambil = '';
        }if ($perizinan->lokasiPengambilan->kecamatan <> '00' and $perizinan->lokasiPengambilan->kelurahan == '0000') {
            $tempat_ambil = 'KECAMATAN';
        }if ($perizinan->lokasiPengambilan->kecamatan <> '00' and $perizinan->lokasiPengambilan->kelurahan <> '0000') {
            $tempat_ambil = 'KELURAHAN';
        }
//     lokasi izin
        if ($perizinan->lokasiIzin->kecamatan == '00' and $perizinan->lokasiIzin->kelurahan == '0000') {
            $tempat_izin = '';
        }if ($perizinan->lokasiIzin->kecamatan <> '00' and $perizinan->lokasiIzin->kelurahan == '0000') {
            $tempat_izin = 'KECAMATAN';
        }if ($perizinan->lokasiIzin->kecamatan <> '00' and $perizinan->lokasiIzin->kelurahan <> '0000') {
            $tempat_izin = 'KELURAHAN';
        }
//      Pemohon
        $this->nama_kabkota = Lokasi::findOne(['id' => $this->kabupaten_pemohon])->nama;
        $this->nama_kelurahan = Lokasi::findOne(['id' => $this->kelurahan_pemohon])->nama;
        $this->nama_kecamatan = Lokasi::findOne(['id' => $this->kecamatan_pemohon])->nama;
        $this->nama_propinsi = Lokasi::findOne(['id' => $this->provinsi_pemohon])->nama;
//      Instansi
        $this->nama_kabkota_pt = Lokasi::findOne(['id' => $this->kabupaten_instansi])->nama;
        $this->nama_kelurahan_pt = Lokasi::findOne(['id' => $this->kelurahan_instansi])->nama;
        $this->nama_kecamatan_pt = Lokasi::findOne(['id' => $this->kecamatan_instansi])->nama;
        $this->nama_propinsi_pt = Lokasi::findOne(['id' => $this->provinsi_instansi])->nama;

        //Metode
        $metodes = $this->izinPenelitianMetodes;
        $cetakMetode = '<ul>';
        foreach ($metodes as $metode) {
            $namaMetode = MetodePenelitian::find()->where(['id' => $metode->metode_id])->one();
            $cetakMetode .= '<li>' . $namaMetode->metode . '</li>';
        }
        $cetakMetode .= '</ul>';
        //Anggota
        $anggotas = $this->anggotaPenelitians;
        $cetakAnggota = '
            <table width="100%">
                <tr>
                    <td>No.</td>
                    <td>NIK</td>
                    <td>Nama</td>
                    <td>Bidang</td>
                </tr>';
        $i = 0;
        foreach ($anggotas as $anggota) {
            $i++;
            $cetakAnggota .= '
                <tr>
                    <td>' . $i . '.</td>
                    <td>' . $anggota->nik_peneliti . '</td>
                    <td>' . $anggota->nama_peneliti . '</td>
                    <td>' . $anggota->bidang . '</td>
                </tr>
                ';
        }
        $cetakAnggota .= '</table>';
        //Lokasi
        $lokasis = IzinPenelitianLokasi::find()->where(['penelitian_id' => $this->id])->andWhere('kota_id is not null')->all();
        //$lokasis = $this->izinPenelitianLokasis;
        $this->nama_kabkota_penelitian = Lokasi::find()->where(['id' => $this->kab_penelitian])->one()->nama;
        if (!$lokasis) {
            $cetakLokasi = $this->nama_kabkota_penelitian;
        } else {
            $cetakLokasi = '<ul>';
            $cetakLokasi .= '<li>' . $this->nama_kabkota_penelitian . '</li>';
            foreach ($lokasis as $lokasi) {
                $namaLokasi = Lokasi::find()->where(['id' => $lokasi->kota_id])->one();
                $cetakLokasi .= '<li>' . $namaLokasi->nama . '</li>';
            }
            $cetakLokasi .= '</ul>';
        }

//==================================
//----------------Preview SK----------------      
        $preview_sk = $izin->template_preview;
        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);
        $preview_sk = str_replace('{nik}', strtoupper($this->nik), $preview_sk);
        $preview_sk = str_replace('{npwp}', $this->npwp, $preview_sk);
        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
        $preview_sk = str_replace('{alamat}', $this->alamat_pemohon, $preview_sk);
        $preview_sk = str_replace('{pekerjaan}', $this->pekerjaan_pemohon, $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', $this->nama_instansi, $preview_sk);
        $preview_sk = str_replace('{fakultas}', $this->fakultas, $preview_sk);
        $preview_sk = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $preview_sk);
        $preview_sk = str_replace('{kabupaten}', $this->nama_kabkota_pt, $preview_sk);
        $preview_sk = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $preview_sk);
        $preview_sk = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $preview_sk);
        $preview_sk = str_replace('{propinsi}', $this->nama_propinsi_pt, $preview_sk);
        $preview_sk = str_replace('{kode_pos}', $this->kodepos_instansi, $preview_sk);
        $preview_sk = str_replace('{telepon_perusahaan}', $this->telepon_instansi, $preview_sk);
        $preview_sk = str_replace('{fax_perusahaan}', $this->fax_instansi, $preview_sk);
        $preview_sk = str_replace('{perusahaan_email}', $this->email_instansi, $preview_sk);
        $preview_sk = str_replace('{rt}', $this->rt, $preview_sk);
        $preview_sk = str_replace('{rw}', $this->rw, $preview_sk);
        $preview_sk = str_replace('{p_keluranhan}', $this->nama_kelurahan, $preview_sk);
        $preview_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_sk);
        $preview_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_sk);
        $preview_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_sk);
//      bidang penelitian
        $preview_sk = str_replace('{tema}', $this->tema, $preview_sk);
        $preview_sk = str_replace('{instansi_penelitian}', $this->instansi_penelitian, $preview_sk);
        $preview_sk = str_replace('{alamat_penelitian}', $this->alamat_penelitian, $preview_sk);
        $preview_sk = str_replace('{bidang}', $this->bidang_penelitian, $preview_sk);
        $preview_sk = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->tgl_mulai_penelitian, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{tgl_akhir}', Yii::$app->formatter->asDate($this->tgl_akhir_penelitian, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{namawil}', strtoupper($perizinan->lokasiIzin->nama), $preview_sk);
        $preview_sk = str_replace('{lokasi_penelitian}', $cetakLokasi, $preview_sk);

        $this->teks_preview = $preview_sk;
        //==================================       
//----------------Preview Data----------------
        $preview_data = $izin->preview_data;
        $preview_data = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $preview_data);
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
        $preview_data = str_replace('{talhir}', $this->tempat_lahir, $preview_data);
        $preview_data = str_replace('{pathir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $preview_data);
        $preview_data = str_replace('{rt}', $this->rt, $preview_data);
        $preview_data = str_replace('{rw}', $this->rw, $preview_data);
        $preview_data = str_replace('{p_keluranhan}', $this->nama_kelurahan, $preview_data);
        $preview_data = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_data);
        $preview_data = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_data);
        $preview_data = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_data);
        $preview_data = str_replace('{telp}', $this->telepon_pemohon, $preview_data);
        $preview_data = str_replace('{email}', $this->email, $preview_data);
        $preview_data = str_replace('{kd_pos}', $this->kode_pos, $preview_data);
        $preview_data = str_replace('{pekerjaan}', $this->pekerjaan_pemohon, $preview_data);
        //Instansi   
        $preview_data = str_replace('{nama_perusahaan}', $this->nama_instansi, $preview_data);
        $preview_data = str_replace('{npwp}', $this->npwp, $preview_data);
        $preview_data = str_replace('{fakultas}', $this->fakultas, $preview_data);
        $preview_data = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $preview_data);
        $preview_data = str_replace('{kabupaten}', $this->nama_kabkota_pt, $preview_data);
        $preview_data = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $preview_data);
        $preview_data = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $preview_data);
        $preview_data = str_replace('{propinsi}', $this->nama_propinsi_pt, $preview_data);
        $preview_data = str_replace('{kode_pos}', $this->kodepos_instansi, $preview_data);
        $preview_data = str_replace('{telepon_perusahaan}', $this->telepon_instansi, $preview_data);
        $preview_data = str_replace('{fax_perusahaan}', $this->fax_instansi, $preview_data);
        $preview_data = str_replace('{perusahaan_email}', $this->email_instansi, $preview_data);
        $preview_data = str_replace('{tema}', $this->tema, $preview_data);
//        Penelitian
        $preview_data = str_replace('{instansi_penelitian}', $this->instansi_penelitian, $preview_data);
        $preview_data = str_replace('{alamat_penelitian}', $this->alamat_penelitian, $preview_data);
        $preview_data = str_replace('{bidang_penelitian}', $this->bidang_penelitian, $preview_data);
        $preview_data = str_replace('{lokasi_penelitian}', $cetakLokasi, $preview_data);
        $preview_data = str_replace('{metode}', $cetakMetode, $preview_data);
        $preview_data = str_replace('{data_anggota}', $cetakAnggota, $preview_data);
        $preview_data = str_replace('{anggota}', $this->anggota, $preview_data);
        $preview_data = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->tgl_mulai_penelitian, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{tgl_akhir}', Yii::$app->formatter->asDate($this->tgl_akhir_penelitian, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        $this->preview_data = $preview_data;
//==================================        
//----------------Validasi----------------

        $validasi = $izin->template_valid;
        $validasi = str_replace('{npwp}', $this->npwp, $validasi);
        $validasi = str_replace('{nama_perusahaan}', $this->nama_instansi, $validasi);
        $validasi = str_replace('{fakultas}', $this->fakultas, $validasi);
        $validasi = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $validasi);
        $validasi = str_replace('{nik}', strtoupper($this->nik), $validasi);
        $validasi = str_replace('{nama}', strtoupper($this->nama), $validasi);
        $validasi = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $validasi);
        $validasi = str_replace('{rt}', $this->rt, $validasi);
        $validasi = str_replace('{rw}', $this->rw, $validasi);
        $validasi = str_replace('{p_keluranhan}', $pemohonKel, $validasi);
        $validasi = str_replace('{p_kecamatan}', $pemohonKec, $validasi);
        $validasi = str_replace('{p_kabupaten}', $pemohonKab, $validasi);
        $validasi = str_replace('{p_propinsi}', $pemohonprop, $validasi);
        $validasi = str_replace('{kabupaten}', $instansiKab, $validasi);
        $validasi = str_replace('{kecamatan}', $instansiKec, $validasi);
        $validasi = str_replace('{kelurahan}', $instansiKel, $validasi);
        $validasi = str_replace('{propinsi}', $instansiprop, $validasi);
        $validasi = str_replace('{pekerjaan}', $this->pekerjaan_pemohon, $validasi);
        //        instansi penelitian
        $validasi = str_replace('{no_sk}', $perizinan->no_izin, $validasi);
        $validasi = str_replace('{tema}', $this->tema, $validasi);
        $validasi = str_replace('{instansi_penelitian}', $this->instansi_penelitian, $validasi);
        $validasi = str_replace('{alamat_penelitian}', $this->alamat_penelitian, $validasi);
        $validasi = str_replace('{bidang}', $this->bidang_penelitian, $validasi);
        $validasi = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->tgl_mulai_penelitian, 'php: d F Y'), $validasi);
        $validasi = str_replace('{tgl_akhir}', Yii::$app->formatter->asDate($this->tgl_akhir_penelitian, 'php: d F Y'), $validasi);
        $validasi = str_replace('{namawil}', strtoupper($perizinan->lokasiIzin->nama), $validasi);
        $validasi = str_replace('{lokasi_penelitian}', $cetakLokasi, $validasi);
        $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
        $this->teks_validasi = $validasi;

        //==================================
//----------------SK----------------
        $teks_sk = $izin->template_sk;

        if ($perizinan->zonasi_id != null) {
            if ($perizinan->zonasi_sesuai == 'Y') {
                $zonasi_sesuai = 'Sesuai';
            } else {
                $zonasi_sesuai = 'Tidak Sesuai';
            }
            $zonasi = $perizinan->zonasi->kode . '&nbsp;' . $perizinan->zonasi->zonasi . '&nbsp;(' . $zonasi_sesuai . ')';
            $sk_siup = str_replace('{zonasi}', $zonasi, $sk_siup);
        }

        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
        $teks_sk = str_replace('{nik}', $this->nik, $teks_sk);
        $teks_sk = str_replace('{npwp}', $this->npwp, $teks_sk);
        $teks_sk = str_replace('{nama}', strtoupper($this->nama), $teks_sk);
        $teks_sk = str_replace('{alamat}', $this->alamat_pemohon, $teks_sk);
        $teks_sk = str_replace('{rt}', $this->rt, $teks_sk);
        $teks_sk = str_replace('{rw}', $this->rw, $teks_sk);
        $teks_sk = str_replace('{p_keluranhan}', $this->nama_kelurahan, $teks_sk);
        $teks_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $teks_sk);
        $teks_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $teks_sk);
        $teks_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $teks_sk);
        $teks_sk = str_replace('{kabupaten}', $this->nama_kabkota_pt, $teks_sk);
        $teks_sk = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $teks_sk);
        $teks_sk = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $teks_sk);
        $teks_sk = str_replace('{propinsi}', $this->nama_propinsi_pt, $teks_sk);
        $teks_sk = str_replace('{pekerjaan}', $this->pekerjaan_pemohon, $teks_sk);
        $teks_sk = str_replace('{nama_perusahaan}', $this->nama_instansi, $teks_sk);
        $teks_sk = str_replace('{fakultas}', $this->fakultas, $teks_sk);
        $teks_sk = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $teks_sk);
//        instansi penelitian
        $teks_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{tema}', $this->tema, $teks_sk);
        $teks_sk = str_replace('{instansi_penelitian}', $this->instansi_penelitian, $teks_sk);
        $teks_sk = str_replace('{alamat_penelitian}', $this->alamat_penelitian, $teks_sk);
        $teks_sk = str_replace('{bidang}', $this->bidang_penelitian, $teks_sk);
        $teks_sk = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->tgl_mulai_penelitian, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{tgl_akhir}', Yii::$app->formatter->asDate($this->tgl_akhir_penelitian, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{namawil}', strtoupper($perizinan->lokasiIzin->nama), $teks_sk);
        $teks_sk = str_replace('{lokasi_penelitian}', $cetakLokasi, $teks_sk);
        if ($perizinan->plh_id == NULL) {
            $teks_sk = str_replace('{plh}', "", $teks_sk);
        } else {
            $teks_sk = str_replace('{plh}', "PLH", $teks_sk);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
            $teks_sk = str_replace('{nm_kepala}', $user->profile->name, $teks_sk);
            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
            $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        }
        $this->teks_sk = $teks_sk;
//==================================
//----------------SK Penolakan----------------
        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        $sk_penolakan = $izin->template_penolakan;

        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);

        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_pos}', $kantorByReg->kodepos, $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', $this->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $sk_penolakan);
        $sk_penolakan = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $sk_penolakan);
        $sk_penolakan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{kabupaten}', $this->nama_kabkota_pt, $sk_penolakan);
        $sk_penolakan = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $sk_penolakan);
        $sk_penolakan = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_izin}', $izin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_perusahaan}', $this->nama_instansi, $sk_penolakan);
        $sk_penolakan = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nm_kepala}', $user->profile->name, $sk_penolakan);
        $sk_penolakan = str_replace('{nip_kepala}', $user->no_identitas, $sk_penolakan);

        if ($perizinan->plh_id == NULL) {
            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
        } else {
            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
        }

        $this->teks_penolakan = $sk_penolakan;
//==================================
//----------------surat Kuasa--------------------
        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perorangan'])->value;
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perusahaan'])->value;
        }
        $kuasa = str_replace('{nik}', $this->nik, $kuasa);
        $kuasa = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $kuasa);
        $kuasa = str_replace('{nama_perusahaan}', strtoupper($this->nama_instansi), $kuasa);
        $kuasa = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_instansi), $kuasa);
        $kuasa = str_replace('{jabatan}', '-', $kuasa);
        $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
        $kuasa = str_replace('{izin}', $perizinan->izin->nama, $kuasa);
        $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
        $this->surat_kuasa = $kuasa;
//==================================
//----------------surat pengurusan--------------------
        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perorangan'])->value;
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perusahaan'])->value;
        }
        $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
        $pengurusan = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $pengurusan);
        $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_instansi), $pengurusan);
        $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_instansi), $pengurusan);
        $pengurusan = str_replace('{jabatan}', '-', $pengurusan);
        $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
        $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
        $this->surat_pengurusan = $pengurusan;
//==================================
//----------------daftar--------------------
        $daftar = \backend\models\Params::findOne(['name' => 'Tanda Registrasi'])->value;
        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
        $daftar = str_replace('{npwp}', $this->npwp, $daftar);
        $daftar = str_replace('{nama_ph}', $this->nama_instansi, $daftar);
        if ($perizinan->lokasiPengambilan->id == 11) {
            $tempat_ambil = 'Badan Pelayanan Terpadu Satu Pintu';
        } else {
            $tempat_ambil = $perizinan->lokasiPengambilan->nama;
        }
        $daftar = str_replace('{kantor_ptsp}', $tempat_ambil, $daftar);
        $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: d F Y'), $daftar);
        $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
        $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
        $this->tanda_register = $daftar;
//==================================
//        BAPL
        $bapl = $izin->template_ba_lapangan;
        $this->form_bapl = $bapl;
//          
    //----------------Digital Signature----------------
        $digital_signature = $izin->digital_signature;

        if ($perizinan->zonasi_id != null) {
            if ($perizinan->zonasi_sesuai == 'Y') {
                $zonasi_sesuai = 'Sesuai';
            } else {
                $zonasi_sesuai = 'Tidak Sesuai';
            }
            $zonasi = $perizinan->zonasi->kode . '&nbsp;' . $perizinan->zonasi->zonasi . '&nbsp;(' . $zonasi_sesuai . ')';
            $digital_signature = str_replace('{zonasi}', $zonasi, $digital_signature);
        }

        $digital_signature = str_replace('{nik}', $this->nik, $digital_signature);
        $digital_signature = str_replace('{npwp}', $this->npwp, $digital_signature);
        $digital_signature = str_replace('{nama}', strtoupper($this->nama), $digital_signature);
        $digital_signature = str_replace('{alamat}', $this->alamat_pemohon, $digital_signature);
        $digital_signature = str_replace('{kode_reg}', $perizinan->kode_registrasi, $digital_signature);
        $digital_signature = str_replace('{rt}', $this->rt, $digital_signature);
        $digital_signature = str_replace('{rw}', $this->rw, $digital_signature);
        $digital_signature = str_replace('{p_keluranhan}', $this->nama_kelurahan, $digital_signature);
        $digital_signature = str_replace('{p_kecamatan}', $this->nama_kecamatan, $digital_signature);
        $digital_signature = str_replace('{p_kabupaten}', $this->nama_kabkota, $digital_signature);
        $digital_signature = str_replace('{p_propinsi}', $this->nama_propinsi, $digital_signature);
        $digital_signature = str_replace('{kabupaten}', $this->nama_kabkota_pt, $digital_signature);
        $digital_signature = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $digital_signature);
        $digital_signature = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $digital_signature);
        $digital_signature = str_replace('{propinsi}', $this->nama_propinsi_pt, $digital_signature);
        $digital_signature = str_replace('{pekerjaan}', $this->pekerjaan_pemohon, $digital_signature);
        $digital_signature = str_replace('{nama_perusahaan}', $this->nama_instansi, $digital_signature);
        $digital_signature = str_replace('{fakultas}', $this->fakultas, $digital_signature);
        $digital_signature = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $digital_signature);
//        instansi penelitian
        $digital_signature = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $digital_signature);
        $digital_signature = str_replace('{tema}', $this->tema, $digital_signature);
        $digital_signature = str_replace('{instansi_penelitian}', $this->instansi_penelitian, $digital_signature);
        $digital_signature = str_replace('{alamat_penelitian}', $this->alamat_penelitian, $digital_signature);
        $digital_signature = str_replace('{bidang}', $this->bidang_penelitian, $digital_signature);
        $digital_signature = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->tgl_mulai_penelitian, 'php: d F Y'), $digital_signature);
        $digital_signature = str_replace('{tgl_akhir}', Yii::$app->formatter->asDate($this->tgl_akhir_penelitian, 'php: d F Y'), $digital_signature);
        $digital_signature = str_replace('{namawil}', strtoupper($perizinan->lokasiIzin->nama), $digital_signature);
        $digital_signature = str_replace('{lokasi_penelitian}', $cetakLokasi, $digital_signature);
        if ($perizinan->plh_id == NULL) {
            $digital_signature = str_replace('{plh}', "", $digital_signature);
        } else {
            $digital_signature = str_replace('{plh}', "PLH", $digital_signature);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $digital_signature = str_replace('{no_sk}', $perizinan->no_izin, $digital_signature);
            $digital_signature = str_replace('{nm_kepala}', $user->profile->name, $digital_signature);
            $digital_signature = str_replace('{nip_kepala}', $user->no_identitas, $digital_signature);
            $digital_signature = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $digital_signature);
        }
        $this->digital_signature = $digital_signature;
        
        }

}
