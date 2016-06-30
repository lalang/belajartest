<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKesehatan as BaseIzinKesehatan;

/**
 * This is the model class for table "izin_kesehatan".
 */
class IzinKesehatan extends BaseIzinKesehatan {

    public $teks_preview;
    public $preview_data;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $nama_propinsi;
    public $nama_kelurahan_pt;
    public $nama_kecamatan_pt;
    public $nama_kabkota_pt;
    public $nama_negara;
    public $teks_sk;
    public $teks_penolakan;
    public $surat_pengurusan;
    public $surat_kuasa;
    public $teks_validasi;
    public $form_bapl;
    public $tanda_register;
    public $kode;
    public $nama_izin;
	public $url_back;
    public $perizinan_proses_id;
    public $nama_pegawai;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'jumlah_sip_offline', 'kepegawaian_id', 'wilayah_id_tempat_praktik', 'kecamatan_id_tempat_praktik', 'kelurahan_id_tempat_praktik', 'propinsi_id_tempat_praktik_i', 'wilayah_id_tempat_praktik_i', 'kecamatan_id_tempat_praktik_i', 'kelurahan_id_tempat_praktik_i', 'propinsi_id_tempat_praktik_ii', 'wilayah_id_tempat_praktik_ii', 'kecamatan_id_tempat_praktik_ii', 'kelurahan_id_tempat_praktik_ii', 'id_izin_parent'], 'integer'],
            [['nik', 'nama', 'nama_gelar', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'rt', 'rw', 'kelurahan_id', 'kodepos', 'kewarganegaraan_id', 'nomor_str', 'tanggal_berlaku_str', 'perguruan_tinggi', 'tanggal_lulus', 'nomor_rekomendasi', 'nama_tempat_praktik', 'longitude', 'alamat_tempat_praktik', 'kelurahan_id_tempat_praktik', 'tipe'], 'required'],
            [['tipe', 'jenkel', 'agama', 'alamat', 'status_sip_offline', 'alamat_tempat_praktik', 'jenis_praktik_i', 'alamat_tempat_praktik_i', 'jenis_praktik_ii', 'alamat_tempat_praktik_ii'], 'string'],
            [['tanggal_lahir', 'tanggal_berlaku_str', 'tanggal_lulus', 'tanggal_fasilitas_kesehatan', 'tanggal_pimpinan', 'tanggal_berlaku_sip_i', 'tanggal_berlaku_sip_ii'], 'safe'],
            [['nik'], 'string', 'max' => 16],
            [['nama_gelar'], 'string', 'max' => 150],
            [['nama', 'email', 'nama_tempat_praktik', 'nama_gedung_praktik', 'email_tempat_praktik', 'nomor_izin_kesehatan', 'nama_tempat_praktik_i', 'nama_gedung_praktik_i', 'nama_tempat_praktik_ii', 'nama_gedung_praktik_ii'], 'string', 'max' => 100],
            [['tempat_lahir', 'kitas', 'nomor_str', 'nomor_rekomendasi', 'nomor_fasilitas_kesehatan', 'nomor_pimpinan', 'titik_koordinat', 'latitude', 'longitude', 'blok_tempat_praktik', 'nomor_sip_i', 'blok_tempat_praktik_i', 'nomor_sip_ii', 'blok_tempat_praktik_ii'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'rt_tempat_praktik', 'rw_tempat_praktik', 'kodepos_tempat_praktik', 'rt_tempat_praktik_i', 'rw_tempat_praktik_i', 'rt_tempat_praktik_ii', 'rw_tempat_praktik_ii'], 'string', 'max' => 5],
            [['telepon', 'telpon_tempat_praktik', 'fax_tempat_praktik', 'telpon_tempat_praktik_i', 'telpon_tempat_praktik_ii'], 'string', 'max' => 15],
            [['perguruan_tinggi'], 'string', 'max' => 150],
            [['npwp_tempat_praktik'], 'string', 'max' => 20],
            [['npwp_tempat_praktik'], 'string', 'min' => 15],
            [['kodepos', 'kodepos_tempat_praktik'], 'string', 'min' => 5],
            [['telepon', 'telpon_tempat_praktik', 'fax_tempat_praktik', 'telpon_tempat_praktik_i', 'telpon_tempat_praktik_ii'], 'string', 'min' => 7],
            [['email', 'email_tempat_praktik'], 'email'],
            [['rt', 'rw', 'kodepos', 'rt_tempat_praktik', 'rw_tempat_praktik', 'kodepos_tempat_praktik', 'rt_tempat_praktik_i', 'rw_tempat_praktik_i', 'rt_tempat_praktik_ii', 'rw_tempat_praktik_ii'], 'integer'],
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
                        $lokasi = $this->wilayah_id_tempat_praktik;
                        break;
                    case 3:
                        $lokasi = $this->kecamatan_id_tempat_praktik;
                        break;
                    case 4:
                        $lokasi = $this->kelurahan_id_tempat_praktik;
                        break;
                    default:
                        $lokasi = 11;
                }

                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi, $this->user_id);

                $this->perizinan_id = $pid;
                $this->lokasi_id = $lokasi;
                $titik_koor = $this->DECtoDMS($this->latitude, $this->longitude);
                $this->titik_koordinat = str_replace('-', '', $titik_koor);
            } else {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
                switch ($wewenang) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->wilayah_id_tempat_praktik;
                        break;
                    case 3:
                        $lokasi = $this->kecamatan_id_tempat_praktik;
                        break;
                    case 4:
                        $lokasi = $this->kelurahan_id_tempat_praktik;
                        break;
                    default:
                        $lokasi = 11;
                }
                $this->lokasi_id = $lokasi;
                $titik_koor = $this->DECtoDMS($this->latitude, $this->longitude);
                $this->titik_koordinat = str_replace('-', '', $titik_koor);
                $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
                $perizinan->lokasi_izin_id = $lokasi;
//                if($_SESSION['UpdatePetugas']){
//                    $session = Yii::$app->session;
//                    $session->set('UpdatePetugas',0);
//                } else {
//                    $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
//                }
                $perizinan->save();
            }
            $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
            $perizinan->tanggal_expired = $this->tanggal_berlaku_str;
            $perizinan->save();
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
        $this->nama_izin = $izin->nama;
        $this->nama_kelurahan = Lokasi::findOne(['id' => $this->kelurahan_id])->nama;
        $this->nama_kecamatan = Lokasi::findOne(['id' => $this->kecamatan_id])->nama;
        $this->nama_kabkota = Lokasi::findOne(['id' => $this->wilayah_id])->nama;
        $this->nama_propinsi = Lokasi::findOne(['id' => $this->propinsi_id])->nama;
        $this->nama_kelurahan_pt = Lokasi::findOne(['id' => $this->kelurahan_id_tempat_praktik])->nama;
        $this->nama_kecamatan_pt = Lokasi::findOne(['id' => $this->kecamatan_id_tempat_praktik])->nama;
        $this->nama_kabkota_pt = Lokasi::findOne(['id' => $this->wilayah_id_tempat_praktik])->nama;

        $kwn = Negara::findOne(['id' => $this->kewarganegaraan_id]);
        $this->nama_negara = $kwn->nama_negara;
        $kwn = $this->nama_negara;

        $pegawai = Kepegawaian::findOne(['id' => $this->kepegawaian_id]);
        $this->nama_pegawai = $pegawai->nama;
        $pegawai = $this->nama_pegawai;
        //====================preview_sk========
        $preview_sk = $izin->template_preview;

        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);
        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{namagelar}', $this->nama_gelar, $preview_sk);
        $preview_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{pathir}', $this->tempat_lahir, $preview_sk);
        $preview_sk = str_replace('{alamat}', strtoupper($this->alamat), $preview_sk);
        $preview_sk = str_replace('{rt}', $this->rt, $preview_sk);
        $preview_sk = str_replace('{rw}', $this->rw, $preview_sk);
        $preview_sk = str_replace('{p_kelurahan}', $this->nama_kelurahan, $preview_sk);
        $preview_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_sk);
        $preview_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_sk);
        $preview_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_sk);
        $preview_sk = str_replace('{nm_perusahaan}', $this->nama_tempat_praktik, $preview_sk);
        $preview_sk = str_replace('{alamat_perusahaan}', $this->alamat_tempat_praktik, $preview_sk);
		$preview_sk = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $preview_sk);
		$preview_sk = str_replace('{blok}', $this->blok_tempat_praktik, $preview_sk);
        $preview_sk = str_replace('{rt_praktik}', $this->rt_tempat_praktik, $preview_sk);
        $preview_sk = str_replace('{rw_praktik}', $this->rw_tempat_praktik, $preview_sk);
        $preview_sk = str_replace('{kelurahan_praktik}', $this->nama_kelurahan_pt, $preview_sk);
        $preview_sk = str_replace('{kecamatan_praktik}', $this->nama_kecamatan_pt, $preview_sk);
        $preview_sk = str_replace('{kabupaten_praktik}', $this->nama_kabkota_pt, $preview_sk);
        $preview_sk = str_replace('{propinsi_praktik}', $this->nama_propinsi, $preview_sk);
        $preview_sk = str_replace('{no_str}', $this->nomor_str, $preview_sk);
        $preview_sk = str_replace('{tgllaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{no_rekomop}', $this->nomor_rekomendasi, $preview_sk);
        $preview_sk = str_replace('{expired}', $this->tanggal_berlaku_str, $preview_sk);
        $preview_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
		$preview_sk = str_replace('{alamat_praktik}', $this->alamat_tempat_praktik, $preview_sk);
		$preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);
        
        if($perizinan->plh_id == NULL){
            $preview_sk = str_replace('{plh}', "", $preview_sk);
        } else {
            $preview_sk = str_replace('{plh}', "PLH", $preview_sk);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $preview_sk = str_replace('{no_sk}', $perizinan->no_izin, $preview_sk);
            $preview_sk = str_replace('{nm_kepala}', $user->profile->name, $preview_sk);
            $preview_sk = str_replace('{nip_kepala}', $user->no_identitas, $preview_sk);
        }

        $this->teks_preview = $preview_sk;

        //====================Validasi========
        $validasi = $izin->template_valid;

        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $validasi = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $validasi);
        $validasi = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $validasi);

        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $validasi = str_replace('{no_sk}', $perizinan->no_izin, $validasi);
            $validasi = str_replace('{nm_kepala}', $user->profile->name, $validasi);
            $validasi = str_replace('{nip_kepala}', $user->no_identitas, $validasi);
            $validasi = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $validasi);
        }
        $validasi = str_replace('{nik}', strtoupper($this->nik), $validasi);
        $validasi = str_replace('{nama}', strtoupper($this->nama), $validasi);
//        $validasi = str_replace('{saksi1_nama}', strtoupper($this->nama_saksi1), $validasi);

        $validasi = str_replace('{alamat}', strtoupper($this->alamat), $validasi);
        $validasi = str_replace('{pathir}', $this->tempat_lahir, $validasi);
        $validasi = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $validasi);
        $validasi = str_replace('{telp}', $this->telepon, $validasi);
        $validasi = str_replace('{jenkel}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $validasi);
        $validasi = str_replace('{agama}', $this->agama, $validasi);
        $validasi = str_replace('{rt}', $this->rt, $validasi);
        $validasi = str_replace('{rw}', $this->rw, $validasi);
        $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
        $validasi = str_replace('{p_kelurahan}', $this->nama_kelurahan, $validasi);
        $validasi = str_replace('{p_kabupaten}', $this->nama_kabkota, $validasi);
        $validasi = str_replace('{p_kecamatan}', $this->nama_kecamatan, $validasi);
        $validasi = str_replace('{p_propinsi}', $this->nama_propinsi, $validasi);
        $validasi = str_replace('{kewarganegaraan}', $kwn, $validasi);
        //Perusahaan
        /* $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
          $validasi = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $validasi);
          $validasi = str_replace('{npwp_perusahaan}', $this->npwp_perusahaan, $validasi);
          $validasi = str_replace('{blok_pt}', $this->blok_perusahaan, $validasi);
          $validasi = str_replace('{rt_pt}', $this->rt_perusahaan, $validasi);
          $validasi = str_replace('{rw_pt}', $this->rw_perusahaan, $validasi);
          $validasi = str_replace('{email}', $perizinan->pemohon->email, $validasi);
          $validasi = str_replace('{nm_gedung}', $this->nama_gedung_perusahaan, $validasi);
          $validasi = str_replace('{lat}', strtoupper($this->latitude), $validasi);
          $validasi = str_replace('{long}', strtoupper($this->longitude), $validasi);
          $validasi = str_replace('{titik_koordinat}', $this->titik_koordinat, $validasi);
          $validasi = str_replace('{tlp_pt}', $this->telpon_perusahaan, $validasi);
          $validasi = str_replace('{tlp_fax}', $this->fax_perusahaan, $validasi);
          $validasi = str_replace('{nm_perusahaan}', strtoupper($this->nama_perusahaan), $validasi);
          $validasi = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $validasi);
          $validasi = str_replace('{rt_pt}', $this->rt_perusahaan, $validasi);
          $validasi = str_replace('{rw_pt}', $this->rw_perusahaan, $validasi);
          $validasi = str_replace('{tlp_pt}', $this->telpon_perusahaan, $validasi);
          $validasi = str_replace('{fax_pt}', $this->fax_perusahaan, $validasi);
          $validasi = str_replace('{jenis_usaha}', $this->klarifikasi_usaha, $validasi);
          $validasi = str_replace('{status_kepemilikan}', $this->status_kepemilikan, $validasi);
          $validasi = str_replace('{status_kantor}', $this->status_kantor, $validasi);
          $validasi = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $validasi);
          $validasi = str_replace('{kode_registrasi}', strtoupper($perizinan->kode_registrasi), $validasi);
          $validasi = str_replace('{kode_pos}', $kantorByReg->kodepos, $validasi);
          $validasi = str_replace('{zonasi}', $zonasi, $validasi);
          $validasi = str_replace('{jml_karyawan}', $this->jumlah_karyawan, $validasi);
          $validasi = str_replace('{jml_karyawan_terbilang}', $this->terbilang($this->jumlah_karyawan), $validasi);
          $validasi = str_replace('{akta_pendirian_no}', $this->nomor_akta_pendirian, $validasi);
          $validasi = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $validasi);
          $validasi = str_replace('{notaris_nama}', $this->nama_notaris_pendirian, $validasi);
          $validasi = str_replace('{kemenkumham}', $this->nomor_sk_kemenkumham, $validasi);
          $validasi = str_replace('{akta_pengesahan_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $validasi);
          $validasi = str_replace('{notaris_pengesahan}', $this->nama_notaris_pengesahan, $validasi);
          $validasi = str_replace('{akta_perubahan}', $perubahan, $validasi); */
        $this->teks_validasi = $validasi;
        //====================preview data========
        $preview_data = $izin->preview_data;

        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);
		
		$preview_data = str_replace('{no_reg}', $perizinan->kode_registrasi, $preview_data);
		$preview_data = str_replace('{noizin_faskes}', $this->nomor_izin_kesehatan, $preview_data);
		$preview_data = str_replace('{sk_faskes}', $this->nomor_fasilitas_kesehatan, $preview_data);
		$preview_data = str_replace('{tglsk_faskes}', Yii::$app->formatter->asDate($this->tanggal_fasilitas_kesehatan, 'php: d F Y'), $preview_data);
		
        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{namagelar}', $this->nama_gelar, $preview_data);
        $preview_data = str_replace('{alamat}', strtoupper($this->alamat), $preview_data);
        $preview_data = str_replace('{rt}', $this->rt, $preview_data);
        $preview_data = str_replace('{rw}', $this->rw, $preview_data);
        $preview_data = str_replace('{p_kelurahan}', $this->nama_kelurahan, $preview_data);
        $preview_data = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_data);
        $preview_data = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_data);
        $preview_data = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_data);
        $preview_data = str_replace('{kodepos}', $this->kodepos, $preview_data);
        $preview_data = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{pathir}', $this->tempat_lahir, $preview_data);
        $preview_data = str_replace('{jenkel}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $preview_data);
        $preview_data = str_replace('{agama}', strtoupper($this->agama), $preview_data);
        $preview_data = str_replace('{telepon}', $this->telepon, $preview_data);
        $preview_data = str_replace('{email}', $perizinan->pemohon->email, $preview_data);
        $preview_data = str_replace('{kitas}', $this->kitas, $preview_data);
        $preview_data = str_replace('{kewarganegaraan}', $kwn, $preview_data);

        $preview_data = str_replace('{no_str}', $this->nomor_str, $preview_data);
        $preview_data = str_replace('{tgl_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{universitas}', $this->perguruan_tinggi, $preview_data);
        $preview_data = str_replace('{tlulus}', Yii::$app->formatter->asDate($this->tanggal_lulus, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{no_rekomop}', $this->nomor_rekomendasi, $preview_data);
        $preview_data = str_replace('{sts_pegawai}', $pegawai, $preview_data);
        $preview_data = str_replace('{sk_pimpinan}', $this->nomor_pimpinan, $preview_data);
        $preview_data = str_replace('{tglsk_pimpinan}', Yii::$app->formatter->asDate($this->tanggal_pimpinan, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{npwp}', $this->npwp_tempat_praktik, $preview_data);
        $preview_data = str_replace('{nama_praktik}', $this->nama_tempat_praktik, $preview_data);
        $preview_data = str_replace('{alamat_praktik}', $this->alamat_tempat_praktik, $preview_data);
		$preview_data = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $preview_data);
		$preview_data = str_replace('{blok}', $this->blok_tempat_praktik, $preview_data);
		$preview_data = str_replace('{rt_praktik}', $this->rt_tempat_praktik, $preview_data);
        $preview_data = str_replace('{rw_praktik}', $this->rw_tempat_praktik, $preview_data);
        $preview_data = str_replace('{kodepos_praktik}', $this->kodepos_tempat_praktik, $preview_data);
        $preview_data = str_replace('{kelurahan_praktik}', $this->nama_kelurahan_pt, $preview_data);
        $preview_data = str_replace('{kecamatan_praktik}', $this->nama_kecamatan_pt, $preview_data);
        $preview_data = str_replace('{kabupaten_praktik}', $this->nama_kabkota_pt, $preview_data);
        $preview_data = str_replace('{propinsi_praktik}', $this->nama_propinsi, $preview_data);
        $preview_data = str_replace('{latlong}', $this->titik_koordinat, $preview_data);
        $preview_data = str_replace('{tlp_praktik}', $this->telpon_tempat_praktik, $preview_data);
        $preview_data = str_replace('{fax_praktik}', $this->fax_tempat_praktik, $preview_data);
        $preview_data = str_replace('{email_praktik}', $this->email_tempat_praktik, $preview_data);
        $no = 1;
        $jadwal = \backend\models\IzinKesehatanJadwal::findAll(['izin_kesehatan_id' => $this->id]);
        foreach($jadwal as $value){
            $hari_praktik = $value->hari_praktik;
            $jam_praktik = $value->jam_praktik;
            $jadwal_table = '
            <tr>
                <td  width="34" valign="top">' . $no . '.</td>
                <td width="500"><p>Hari Praktik</p></td>
                <td valign="top" width="2">:</td>
                <td width="500"><p>' . $hari_praktik . '</p></td>
                <td width="500"><p>Jam Praktik</p></td>
                <td valign="top" width="2">:</td>
                <td width="500"><p>' . $jam_praktik . '</p></td>
            </tr>
            ';
            $no++;
        }
        $table = '<table border=0>' . $jadwal_table . '</table>';
        $preview_data = str_replace('{jadwal_praktik}', $table, $preview_data);
        
        if($this->status_sip_offline == 'Y'){
            $preview_data = str_replace('{jns_praktik1}', isset($this->jenis_praktik_i) ? $this->jenis_praktik_i : $this->jenis_praktik_i = '', $preview_data);
            $preview_data = str_replace('{nm_praktik1}', isset($this->nama_tempat_praktik_i) ? $this->nama_tempat_praktik_i : $this->nama_tempat_praktik_i = '', $preview_data);
            $preview_data = str_replace('{sip_praktik1}', isset($this->nomor_sip_i) ? $this->nomor_sip_i : $this->nomor_sip_i = '', $preview_data);
            $preview_data = str_replace('{tglsip_praktik1}', isset($this->tanggal_berlaku_sip_i) ? Yii::$app->formatter->asDate($this->tanggal_berlaku_sip_i, 'php: d F Y') : $this->tanggal_berlaku_sip_i = '', $preview_data);
            $preview_data = str_replace('{alamat_praktik1}', isset($this->alamat_tempat_praktik_i) ? $this->alamat_tempat_praktik_i : $this->alamat_tempat_praktik_i = '', $preview_data);
            $no = 1;
            $jadwal = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $this->id]);
            foreach($jadwal as $value){
                $hari_praktik = $value->hari_praktik;
                $jam_praktik = $value->jam_praktik;
                $jadwal_table = '
                <tr>
                    <td  width="34" valign="top">' . $no . '.</td>
                    <td width="500"><p>Hari Praktik</p></td>
                    <td valign="top" width="2">:</td>
                    <td width="500"><p>' . $hari_praktik . '</p></td>
                    <td width="500"><p>Jam Praktik</p></td>
                    <td valign="top" width="2">:</td>
                    <td width="500"><p>' . $jam_praktik . '</p></td>
                </tr>
                ';
                $no++;
            }
            $table = '<table border=0>' . $jadwal_table . '</table>';
            $preview_data = str_replace('{jadwal_praktik1}', $table, $preview_data);
            
            if($this->jumlah_sip_offline != '1'){
                $preview_data = str_replace('{jns_praktik2}', isset($this->jenis_praktik_ii) ? $this->jenis_praktik_ii : $this->jenis_praktik_ii = '', $preview_data);
                $preview_data = str_replace('{nm_praktik2}', isset($this->nama_tempat_praktik_ii) ? $this->nama_tempat_praktik_ii : $this->nama_tempat_praktik_ii = '', $preview_data);
                $preview_data = str_replace('{sip_praktik2}', isset($this->nomor_sip_ii) ? $this->nomor_sip_ii : $this->nomor_sip_ii = '', $preview_data);
                $preview_data = str_replace('{tglsip_praktik2}', isset($this->tanggal_berlaku_sip_ii) ? Yii::$app->formatter->asDate($this->tanggal_berlaku_sip_ii, 'php: d F Y') : $this->tanggal_berlaku_sip_ii = '', $preview_data);
                $preview_data = str_replace('{alamat_praktik2}', isset($this->alamat_tempat_praktik_ii) ? $this->alamat_tempat_praktik_ii : $this->alamat_tempat_praktik_ii = '', $preview_data);
                $no = 1;
                $jadwal = \backend\models\IzinKesehatanJadwalDua::findAll(['izin_kesehatan_id' => $this->id]);
                foreach($jadwal as $value){
                    $hari_praktik = $value->hari_praktik;
                    $jam_praktik = $value->jam_praktik;
                    $jadwal_table = '
                    <tr>
                        <td  width="34" valign="top">' . $no . '.</td>
                        <td width="500"><p>Hari Praktik</p></td>
                        <td valign="top" width="2">:</td>
                        <td width="500"><p>' . $hari_praktik . '</p></td>
                        <td width="500"><p>Jam Praktik</p></td>
                        <td valign="top" width="2">:</td>
                        <td width="500"><p>' . $jam_praktik . '</p></td>
                    </tr>
                    ';
                    $no++;
                }
                $table = '<table border=0>' . $jadwal_table . '</table>';
                $preview_data = str_replace('{jadwal_praktik2}', $table, $preview_data);
            } else {
                $preview_data = str_replace('{jns_praktik2}', $this->jenis_praktik_ii = '', $preview_data);
                $preview_data = str_replace('{nm_praktik2}', $this->nama_tempat_praktik_ii = '', $preview_data);
                $preview_data = str_replace('{sip_praktik2}', $this->nomor_sip_ii = '', $preview_data);
                $preview_data = str_replace('{tglsip_praktik2}', $this->tanggal_berlaku_sip_ii = '', $preview_data);
                $preview_data = str_replace('{alamat_praktik2}', $this->alamat_tempat_praktik_ii = '', $preview_data);
                $preview_data = str_replace('{jadwal_praktik2}', $table = '', $preview_data);
            }
        } else {
            $preview_data = str_replace('{jns_praktik1}', $this->jenis_praktik_i = '', $preview_data);
            $preview_data = str_replace('{nm_praktik1}', $this->nama_tempat_praktik_i = '', $preview_data);
            $preview_data = str_replace('{sip_praktik1}', $this->nomor_sip_i = '', $preview_data);
            $preview_data = str_replace('{tglsip_praktik1}', $this->tanggal_berlaku_sip_i = '', $preview_data);
            $preview_data = str_replace('{alamat_praktik1}', $this->alamat_tempat_praktik_i = '', $preview_data);
            $preview_data = str_replace('{jadwal_praktik1}', $table = '', $preview_data);
            
            $preview_data = str_replace('{jns_praktik2}', $this->jenis_praktik_ii = '', $preview_data);
            $preview_data = str_replace('{nm_praktik2}', $this->nama_tempat_praktik_ii = '', $preview_data);
            $preview_data = str_replace('{sip_praktik2}', $this->nomor_sip_ii = '', $preview_data);
            $preview_data = str_replace('{tglsip_praktik2}', $this->tanggal_berlaku_sip_ii = '', $preview_data);
            $preview_data = str_replace('{alamat_praktik2}', $this->alamat_tempat_praktik_ii = '', $preview_data);
            $preview_data = str_replace('{jadwal_praktik2}', $table = '', $preview_data);
        }
        
        $preview_data = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);     
		$preview_data = str_replace('{nama_izin}', $perizinan->izin->nama, $preview_data);		
        
        $this->preview_data = $preview_data;
        //====================template_sk======== 
        $teks_sk = $izin->template_sk;
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
        $teks_sk = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $teks_sk);
        
        $teks_sk = str_replace('{namagelar}', $this->nama_gelar, $teks_sk);
        $teks_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{pathir}', $this->tempat_lahir, $teks_sk);
        $teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
        $teks_sk = str_replace('{rt}', $this->rt, $teks_sk);
        $teks_sk = str_replace('{rw}', $this->rw, $teks_sk);
        $teks_sk = str_replace('{p_kelurahan}', $this->nama_kelurahan, $teks_sk);
        $teks_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $teks_sk);
        $teks_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $teks_sk);
        $teks_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $teks_sk);
		$teks_sk = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $teks_sk);
		$teks_sk = str_replace('{blok}', $this->blok_tempat_praktik, $teks_sk);
        $teks_sk = str_replace('{nm_perusahaan}', $this->nama_tempat_praktik, $teks_sk);
        $teks_sk = str_replace('{alamat_perusahaan}', $this->alamat_tempat_praktik, $teks_sk);
        $teks_sk = str_replace('{rt_praktik}', $this->rt_tempat_praktik, $teks_sk);
        $teks_sk = str_replace('{rw_praktik}', $this->rw_tempat_praktik, $teks_sk);
        $teks_sk = str_replace('{kelurahan_praktik}', $this->nama_kelurahan_pt, $teks_sk);
        $teks_sk = str_replace('{kecamatan_praktik}', $this->nama_kecamatan_pt, $teks_sk);
        $teks_sk = str_replace('{kabupaten_praktik}', $this->nama_kabkota_pt, $teks_sk);
        $teks_sk = str_replace('{propinsi_praktik}', $this->nama_propinsi, $teks_sk);
        $teks_sk = str_replace('{no_str}', $this->nomor_str, $teks_sk);
        $teks_sk = str_replace('{tgllaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{no_rekomop}', $this->nomor_rekomendasi, $teks_sk);
        $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $teks_sk);
        
        //$teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
        if($perizinan->plh_id == NULL){
            $teks_sk = str_replace('{plh}', "", $teks_sk);
        } else {
            $teks_sk = str_replace('{plh}', "PLH", $teks_sk);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
            $teks_sk = str_replace('{nm_kepala}', $user->profile->name, $teks_sk);
            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
        }

        $this->teks_sk = $teks_sk;
        //================================== Penolakan
        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        $sk_penolakan = $izin->template_penolakan;
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{kabupaten}', $this->nama_kabkota, $sk_penolakan);
        $sk_penolakan = str_replace('{KECAMATAN}', $this->nama_kecamatan, $sk_penolakan);
        $sk_penolakan = str_replace('{namawil}', $this->nama_propinsi, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $sk_penolakan);
        $sk_penolakan = str_replace('{no_reg}', $perizinan->kode_registrasi, $sk_penolakan);
	$sk_penolakan = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{alamat}', strtoupper($this->alamat), $sk_penolakan);
        $sk_penolakan = str_replace('{p_kelurahan}', $this->nama_kelurahan, $sk_penolakan);
        $sk_penolakan = str_replace('{p_kecamatan}', $this->nama_kecamatan, $sk_penolakan);
        $sk_penolakan = str_replace('{p_kabupaten}', $this->nama_kabkota, $sk_penolakan);
        $sk_penolakan = str_replace('{p_propinsi}', $this->nama_propinsi, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_izin}', $perizinan->izin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{keterangan}', $perizinan->keterangan, $sk_penolakan);
        
        if($perizinan->plh_id == NULL){
            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
        } else {
            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
            $sk_penolakan = str_replace('{nama_kepala}', $user->profile->name, $sk_penolakan);
            $sk_penolakan = str_replace('{nip_kepala}', $user->no_identitas, $sk_penolakan);
        }
        $this->teks_penolakan = $sk_penolakan;

        //----------------surat pengurusan--------------------
        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perorangan'])->value;
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perusahaan'])->value;
        }
        $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
        $pengurusan = str_replace('{alamat}', strtoupper($this->alamat), $pengurusan);
        $pengurusan = str_replace('{jabatan}', strtoupper("-"), $pengurusan);
        $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
        $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
        $this->surat_pengurusan = $pengurusan;

        //----------------surat Kuasa--------------------
        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perorangan'])->value;
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perusahaan'])->value;
        }
        $kuasa = str_replace('{nik}', $this->nik, $kuasa);
        $kuasa = str_replace('{alamat}', strtoupper($this->alamat), $kuasa);
        $kuasa = str_replace('{jabatan}', strtoupper("-"), $kuasa);
        $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
        $kuasa = str_replace('{izin}', $perizinan->izin->nama, $kuasa);
        $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
        $this->surat_kuasa = $kuasa;

        //----------------daftar--------------------
        $daftar = \backend\models\Params::findOne(['name' => 'Tanda Registrasi'])->value;
        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
        $daftar = str_replace('{kantor_ptsp}', $tempat_ambil . '&nbsp;' . $perizinan->lokasiPengambilan->nama, $daftar);
        $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
        $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
        $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
        $this->tanda_register = $daftar;

//      ====================template_BAPL========
        $bapl = $izin->template_ba_lapangan;

        $bapl = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $bapl);
        $bapl = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $bapl);
        $bapl = str_replace('{alamat_kantor}', $kantorByReg->alamat, $bapl);
        $bapl = str_replace('{no_reg}', $perizinan->kode_registrasi, $bapl);
        $bapl = str_replace('{nama_izin}', $perizinan->izin->nama, $bapl);
        $bapl = str_replace('{nama}', strtoupper($this->nama), $bapl);
        $bapl = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $bapl);
        $bapl = str_replace('{kabupaten}', $this->nama_kabkota_pt, $bapl);
        $bapl = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $bapl);
        $bapl = str_replace('{akta_perubahan}', $perubahan, $bapl);
        $bapl = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $bapl);
        $bapl = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $bapl);
        $bapl = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $bapl);
        $bapl = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $bapl);
        $bapl = str_replace('{kode_pos}', $kantorByReg->kodepos, $bapl);

        $bapl = str_replace('{zonasi}', $zonasi, $bapl);
        if ($perizinan->plh_id == NULL) {
            $bapl = str_replace('{plh}', "", $bapl);
        } else {
            $bapl = str_replace('{plh}', "PLH", $bapl);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $bapl = str_replace('{no_izin}', $perizinan->no_izin, $bapl);
            $bapl = str_replace('{nm_kepala}', $user->profile->name, $bapl);
            $bapl = str_replace('{nip_kepala}', $user->no_identitas, $bapl);
            $bapl = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $bapl);
        }

        $this->form_bapl = $bapl;
    }

    function terbilang($satuan) {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");

        if ($satuan < 12) {
            return " " . $huruf[$satuan];
        } elseif ($satuan < 20) {
            return $this->terbilang($satuan - 10) . " Belas";
        } elseif ($satuan < 100) {
            return $this->terbilang($satuan / 10) . " Puluh" . $this->terbilang($satuan % 10);
        } elseif ($satuan < 200) {
            return "Seratus" . $this->terbilang($satuan - 100);
        } elseif ($satuan < 1000) {
            return $this->terbilang($satuan / 100) . " Ratus" . $this->terbilang($satuan % 100);
        } elseif ($satuan < 2000) {
            return "Seribu" . $this->terbilang($satuan - 1000);
        } elseif ($satuan < 1000000) {
            return $this->terbilang($satuan / 1000) . " Ribu" . $this->terbilang($satuan % 1000);
        } elseif ($satuan < 1000000000) {
            return $this->terbilang($satuan / 1000000) . " Juta" . $this->terbilang($satuan % 1000000);
        }
    }

    function DECtoDMS($latitude, $longitude) {
        $latitudeDirection = $latitude < 0 ? 'S' : 'N';
        $longitudeDirection = $longitude < 0 ? 'W' : 'E';

        $latitudeNotation = $latitude < 0 ? '-' : '';
        $longitudeNotation = $longitude < 0 ? '-' : '';

        $latitudeInDegrees = floor(abs($latitude));
        $longitudeInDegrees = floor(abs($longitude));

        $latitudeDecimal = abs($latitude) - $latitudeInDegrees;
        $longitudeDecimal = abs($longitude) - $longitudeInDegrees;

        $_precision = 3;
        $latitudeMinutes = round($latitudeDecimal * 60, $_precision);
        $longitudeMinutes = round($longitudeDecimal * 60, $_precision);

        return sprintf('%s%s&deg; %s %s %s%s&deg; %s %s', $latitudeNotation, $latitudeInDegrees, $latitudeMinutes, $latitudeDirection, $longitudeNotation, $longitudeInDegrees, $longitudeMinutes, $longitudeDirection
        );
    }

}
