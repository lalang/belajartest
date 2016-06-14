<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKesehatan as BaseIzinKesehatan;

/**
 * This is the model class for table "izin_kesehatan".
 */
class IzinKesehatan extends BaseIzinKesehatan
{
    
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
            [['nama', 'email', 'nama_tempat_praktik', 'nama_gedung_praktik', 'email_tempat_praktik', 'nomor_izin_kesehatan', 'nama_tempat_praktik_i', 'nama_gedung_praktik_i', 'nama_tempat_praktik_ii', 'nama_gedung_praktik_ii'], 'string', 'max' => 100],
            [['tempat_lahir', 'kitas', 'nomor_str', 'nomor_rekomendasi', 'nomor_fasilitas_kesehatan', 'nomor_pimpinan', 'titik_koordinat', 'latitude', 'longitude', 'blok_tempat_praktik', 'nomor_sip_i', 'blok_tempat_praktik_i', 'nomor_sip_ii', 'blok_tempat_praktik_ii'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'rt_tempat_praktik', 'rw_tempat_praktik', 'kodepos_tempat_praktik', 'rt_tempat_praktik_i', 'rw_tempat_praktik_i', 'rt_tempat_praktik_ii', 'rw_tempat_praktik_ii'], 'string', 'max' => 5],
            [['telepon', 'telpon_tempat_praktik', 'fax_tempat_praktik', 'telpon_tempat_praktik_i', 'telpon_tempat_praktik_ii'], 'string', 'max' => 15],
            [['perguruan_tinggi'], 'string', 'max' => 150],
            [['npwp_tempat_praktik'], 'string', 'max' => 20]
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
                    case 5:
                        $lokasi = $this->kecamatan_id_tempat_praktik;
                        break;
                    case 6:
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
                    case 5:
                        $lokasi = $this->kecamatan_id_tempat_praktik;
                        break;
                    case 6:
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
        
        //====================preview_sk========
      /*  $preview_sk = $izin->template_preview;

        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);

        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{alamat_kantor}', $kantorByReg->alamat, $preview_sk);
        //Pengelola
       // $preview_sk = str_replace('{passport}', $this->passport, $preview_sk);
        $preview_sk = str_replace('{nik}', strtoupper($this->nik), $preview_sk);
        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
        $preview_sk = str_replace('{alamat}', strtoupper($this->alamat), $preview_sk);
        $preview_sk = str_replace('{pathir}', $this->tempat_lahir, $preview_sk);
        $preview_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{jenkel}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $preview_sk);
        $preview_sk = str_replace('{agama}', strtoupper($this->agama), $preview_sk);
        $preview_sk = str_replace('{kewarganegaraan}', $kwn, $preview_sk);
        $preview_sk = str_replace('{rt}', $this->rt, $preview_sk);
        $preview_sk = str_replace('{rw}', $this->rw, $preview_sk);
        $preview_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_sk);
        $preview_sk = str_replace('{p_kelurahan}', $this->nama_kelurahan, $preview_sk);
        $preview_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_sk);
        $preview_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_sk);
        //Perusahaan
        $preview_sk = str_replace('{titik_koordinat}', $this->titik_koordinat, $preview_sk);
        $preview_sk = str_replace('{npwp_perusahaan}', $this->npwp_perusahaan, $preview_sk);
        $preview_sk = str_replace('{nm_perusahaan}', $this->nama_perusahaan, $preview_sk);
        $preview_sk = str_replace('{jenis_usaha}', $this->klarifikasi_usaha, $preview_sk);
        $preview_sk = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $preview_sk);
        $preview_sk = str_replace('{status_kepemilikan}', $this->status_kepemilikan, $preview_sk);
        $preview_sk = str_replace('{status_kantor}', $this->status_kantor, $preview_sk);
        $preview_sk = str_replace('{email}', $perizinan->pemohon->email, $preview_sk);
        $preview_sk = str_replace('{akta_pendirian_no}', $this->nomor_akta_pendirian, $preview_sk);
        $preview_sk = str_replace('{blok_pt}', $this->blok_perusahaan, $preview_sk);
        $preview_sk = str_replace('{rt_pt}', $this->rt_perusahaan, $preview_sk);
        $preview_sk = str_replace('{rw_pt}', $this->rw_perusahaan, $preview_sk);
        $preview_sk = str_replace('{nm_gedung}', $this->nama_gedung_perusahaan, $preview_sk);
        $preview_sk = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{notaris_nama}', $this->nama_notaris_pendirian, $preview_sk);
        $preview_sk = str_replace('{kemenkumham}', $this->nomor_sk_kemenkumham, $preview_sk);
        $preview_sk = str_replace('{akta_pengesahan_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{notaris_pengesahan}', $this->nama_notaris_pengesahan, $preview_sk);
        $preview_sk = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $preview_sk);
        $preview_sk = str_replace('{kabupaten}', $this->nama_kabkota_pt, $preview_sk);
        $preview_sk = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $preview_sk);
        $preview_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);
        $preview_sk = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{akta_perubahan}', $perubahan, $preview_sk);
        $preview_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{zonasi}', $zonasi, $preview_sk);
        $preview_sk = str_replace('{jml_karyawan}', $this->jumlah_karyawan, $preview_sk);
        $preview_sk = str_replace('{jml_karyawan_terbilang}', $this->terbilang($this->jumlah_karyawan), $preview_sk);
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
        $validasi = str_replace('{passport}', $this->passport, $validasi);
        $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
        $validasi = str_replace('{p_kelurahan}', $this->nama_kelurahan, $validasi);
        $validasi = str_replace('{p_kabupaten}', $this->nama_kabkota, $validasi);
        $validasi = str_replace('{p_kecamatan}', $this->nama_kecamatan, $validasi);
        $validasi = str_replace('{p_propinsi}', $this->nama_propinsi, $validasi);
        $validasi = str_replace('{kewarganegaraan}', $kwn, $validasi);
//Perusahaan
        $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
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
        $validasi = str_replace('{akta_perubahan}', $perubahan, $validasi);
        $this->teks_validasi = $validasi;
        //====================preview data========
        $preview_data = $izin->preview_data;

        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);

        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);

        $preview_data = str_replace('{alamat}', strtoupper($this->alamat), $preview_data);
        $preview_data = str_replace('{pathir}', $this->tempat_lahir, $preview_data);
        $preview_data = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{telp}', $this->telepon, $preview_data);
        $preview_data = str_replace('{jenkel}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $preview_data);
        $preview_data = str_replace('{agama}', strtoupper($this->agama), $preview_data);
        $preview_data = str_replace('{kewarganegaraan}', $kwn, $preview_data);
        $preview_data = str_replace('{jml_karyawan}', $this->jumlah_karyawan, $preview_data);
        $preview_data = str_replace('{jml_karyawan_terbilang}', $this->terbilang($this->jumlah_karyawan), $preview_data);
        // $preview_data = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $preview_data);
//        $preview_data = str_replace('{pada}', $this->instansi_tujuan, $preview_data);
        $preview_data = str_replace('{rt}', $this->rt, $preview_data);
        $preview_data = str_replace('{rw}', $this->rw, $preview_data);
        $preview_data = str_replace('{passport}', $this->passport, $preview_data);
        $preview_data = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_data);
        $preview_data = str_replace('{p_kelurahan}', $this->nama_kelurahan, $preview_data);
        $preview_data = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_data);
        $preview_data = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_data);
        $preview_data = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_data);
        $preview_data = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $preview_data);
        //perusahaan  
        $preview_data = str_replace('{email}', $perizinan->pemohon->email, $preview_data);
        $preview_data = str_replace('{blok_pt}', $this->blok_perusahaan, $preview_data);
        $preview_data = str_replace('{nm_gedung}', $this->nama_gedung_perusahaan, $preview_data);
        $preview_data = str_replace('{lat}', strtoupper($this->latitude), $preview_data);
        $preview_data = str_replace('{long}', strtoupper($this->longitude), $preview_data);
        $preview_data = str_replace('{titik_koordinat}', $this->titik_koordinat, $preview_data);
        $preview_data = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $preview_data);
        $preview_data = str_replace('{kabupaten}', $this->nama_kabkota_pt, $preview_data);
        $preview_data = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $preview_data);
        $preview_data = str_replace('{nm_perusahaan}', strtoupper($this->nama_perusahaan), $preview_data);
        $preview_data = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $preview_data);
        $preview_data = str_replace('{npwp_perusahaan}', $this->npwp_perusahaan, $preview_data);
        $preview_data = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{kode_pos}', $this->kodepos_perusahaan, $preview_data);
        $preview_data = str_replace('{rt_pt}', $this->rt_perusahaan, $preview_data);
        $preview_data = str_replace('{rw_pt}', $this->rw_perusahaan, $preview_data);
        $preview_data = str_replace('{tlp_pt}', $this->telpon_perusahaan, $preview_data);
        $preview_data = str_replace('{fax_pt}', $this->fax_perusahaan, $preview_data);
        $preview_data = str_replace('{jenis_usaha}', $this->klarifikasi_usaha, $preview_data);
        $preview_data = str_replace('{status_kepemilikan}', $this->status_kepemilikan, $preview_data);
        $preview_data = str_replace('{status_kantor}', $this->status_kantor, $preview_data);
        $preview_data = str_replace('{akta_pendirian_no}', $this->nomor_akta_pendirian, $preview_data);
        $preview_data = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{notaris_nama}', $this->nama_notaris_pendirian, $preview_data);
        $preview_data = str_replace('{kemenkumham}', $this->nomor_sk_kemenkumham, $preview_data);
        $preview_data = str_replace('{akta_pengesahan_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{notaris_pengesahan}', $this->nama_notaris_pengesahan, $preview_data);
        $akta = \backend\models\IzinSkdpAkta::findAll(['izin_skdp_id' => $this->id]);
        $noUrut = 1;
        foreach ($akta as $aktaEach) {

//            $akta = \backend\models\IzinSkdpAkta::findBySql('SELECT * FROM izin_skdp_akta where izin_skdp_id = "'.$this->id.'"order by tanggal_akta desc')->one();
            $aktainput .='
            <table>	
                <tr>
                    <td  width="30">' . $noUrut . '.</td>
                    <td  valign="top"  width="200">
                        <p>Akta Perubahan</p>
                    </td>
                    <td  valign="top" width="2"></td>
                    <td  valign="top" width="308">
                        <p></p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Nama Notaris</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $aktaEach->nama_notaris . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Nomor & Tgl Akta</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $aktaEach->nomor_akta . ' &nbsp; & &nbsp;' . Yii::$app->formatter->asDate($aktaEach->tanggal_akta, 'php: d F Y') . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Nomor & tgl Pengesahan</p>
                    </td>
                    <td valign="top">:</td>
                    <td valign="top">
                        <p>' . $aktaEach->nomor_pengesahan . ' &nbsp; & &nbsp;' . Yii::$app->formatter->asDate($aktaEach->tanggal_pengesahan, 'php: d F Y') . '</p>
                    </td>
                </tr>
            </table>';
            $noUrut++;
        }
        $preview_data = str_replace('{akta_perubahan}', $aktainput, $preview_data);
        $this->preview_data = $preview_data;

        //====================template_sk======== 
        $teks_sk = $izin->template_sk;
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
        $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
        $teks_sk = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $teks_sk);
        $teks_sk = str_replace('{nama}', strtoupper($this->nama), $teks_sk);
        $teks_sk = str_replace('{pathir}', $this->tempat_lahir, $teks_sk);
        $teks_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
        $teks_sk = str_replace('{alamat_kantor}', $this->alamat_tempat_praktik, $teks_sk);
        $teks_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $teks_sk);
        $teks_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $teks_sk);
        $teks_sk = str_replace('{nomor_str}', $this->nomor_str, $teks_sk);
        $teks_sk = str_replace('{tanggal_berlaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{nomor_rekomendasi}', $this->nomor_rekomendasi, $teks_sk);
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $teks_sk = str_replace('{no_izin}', $perizinan->no_izin, $teks_sk);
            $teks_sk = str_replace('{nm_kepala}', $user->profile->name, $teks_sk);
            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
            $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        }
        $this->teks_sk = $teks_sk;
        //================================== Penolakan
        
        $sk_penolakan = $izin->template_penolakan;
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
        $sk_penolakan = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', strtoupper($this->nama), $sk_penolakan);
        $sk_penolakan = str_replace('{pathir}', $this->tempat_lahir, $sk_penolakan);
        $sk_penolakan = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{alamat}', strtoupper($this->alamat), $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $this->alamat_tempat_praktik, $sk_penolakan);
        $sk_penolakan = str_replace('{p_kabupaten}', $this->nama_kabkota, $sk_penolakan);
        $sk_penolakan = str_replace('{p_propinsi}', $this->nama_propinsi, $sk_penolakan);
        $sk_penolakan = str_replace('{nomor_str}', $this->nomor_str, $sk_penolakan);
        $sk_penolakan = str_replace('{tanggal_berlaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{nomor_rekomendasi}', $this->nomor_rekomendasi, $sk_penolakan);
        $sk_penolakan = str_replace('{keterangan}', $alasan->keterangan, $sk_penolakan);
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $sk_penolakan = str_replace('{no_izin}', $perizinan->no_izin, $sk_penolakan);
            $sk_penolakan = str_replace('{nm_kepala}', $user->profile->name, $sk_penolakan);
            $sk_penolakan = str_replace('{nip_kepala}', $user->no_identitas, $sk_penolakan);
            $sk_penolakan = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $sk_penolakan);
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
        $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $pengurusan);
        $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_perusahaan), $pengurusan);
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
        $kuasa = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $kuasa);
        $kuasa = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_perusahaan), $kuasa);
        $kuasa = str_replace('{jabatan}', strtoupper("-"), $kuasa);
        $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
        $kuasa = str_replace('{izin}', $perizinan->izin->nama, $kuasa);
        $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
        $this->surat_kuasa = $kuasa;

        //----------------daftar--------------------
        $daftar = \backend\models\Params::findOne(['name' => 'Tanda Registrasi'])->value;
        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
        $daftar = str_replace('{npwp}', $this->npwp_perusahaan, $daftar);
        $daftar = str_replace('{nama_ph}', $this->nama_perusahaan, $daftar);
        $daftar = str_replace('{kantor_ptsp}', $tempat_ambil . '&nbsp;' . $perizinan->lokasiPengambilan->nama, $daftar);
        $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
        $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
        $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
        $this->tanda_register = $daftar;

//         ====================template_BAPL========
        $bapl = $izin->template_ba_lapangan;

        $bapl = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $bapl);
        $bapl = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $bapl);
        $bapl = str_replace('{alamat_kantor}', $kantorByReg->alamat, $bapl);
        $bapl = str_replace('{no_reg}', $perizinan->kode_registrasi, $bapl);
        $bapl = str_replace('{nama_izin}', $perizinan->izin->nama, $bapl);
//        $bapl = str_replace('{no_sk}', $perizinan->no_izin, $bapl);
//        $bapl = str_replace('{nik}', strtoupper($this->nik), $bapl);
        $bapl = str_replace('{nama}', strtoupper($this->nama), $bapl);
//        $bapl = str_replace('{alamat}', strtoupper($this->alamat), $bapl);
//        $bapl = str_replace('{pathir}', $this->tempat_lahir, $bapl);
//        $bapl = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $bapl);
//        $bapl = str_replace('{jenkel}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $bapl);
//        $bapl = str_replace('{agama}', strtoupper($this->agama), $bapl);
//        $bapl = str_replace('{kewarganegaraan}', $kwn, $bapl);
//        $bapl = str_replace('{rt}', $this->rt, $bapl);
//        $bapl = str_replace('{rw}', $this->rw, $bapl);
//        $bapl = str_replace('{p_kelurahan}', $this->nama_kelurahan, $bapl);
//        $bapl = str_replace('{p_kabupaten}', $this->nama_kabkota, $bapl);
//        $bapl = str_replace('{p_kecamatan}', $this->nama_kecamatan, $bapl);
//        $bapl = str_replace('{p_propinsi}', $this->nama_propinsi, $bapl);
//        $bapl = str_replace('{titik_koordinat}', $this->titik_koordinat, $bapl);
//        $bapl = str_replace('{npwp_perusahaan}', $this->npwp_perusahaan, $bapl);
        $bapl = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $bapl);
        $bapl = str_replace('{kabupaten}', $this->nama_kabkota_pt, $bapl);
        $bapl = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $bapl);
        $bapl = str_replace('{nm_perusahaan}', $this->nama_perusahaan, $bapl);
        $bapl = str_replace('{jenis_usaha}', $this->klarifikasi_usaha, $bapl);
        $bapl = str_replace('{blok_pt}', $this->blok_perusahaan, $bapl);
        $bapl = str_replace('{rt_pt}', $this->rt_perusahaan, $bapl);
        $bapl = str_replace('{rw_pt}', $this->rw_perusahaan, $bapl);
        $bapl = str_replace('{nm_gedung}', $this->nama_gedung_perusahaan, $bapl);
        $bapl = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $bapl);
        $bapl = str_replace('{status_kepemilikan}', $this->status_kepemilikan, $bapl);
        $bapl = str_replace('{status_kantor}', $this->status_kantor, $bapl);
        $bapl = str_replace('{akta_perubahan}', $perubahan, $bapl);
        $bapl = str_replace('{akta_pendirian_no}', $this->nomor_akta_pendirian, $bapl);
        $bapl = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $bapl);
        $bapl = str_replace('{notaris_nama}', $this->nama_notaris_pendirian, $bapl);
        $bapl = str_replace('{kemenkumham}', $this->nomor_sk_kemenkumham, $bapl);
        $bapl = str_replace('{akta_pengesahan_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $bapl);
        $bapl = str_replace('{notaris_pengesahan}', $this->nama_notaris_pengesahan, $bapl);
        $bapl = str_replace('{passport}', $this->passport, $bapl);
        $bapl = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $bapl);
        $bapl = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $bapl);
        $bapl = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $bapl);
        $bapl = str_replace('{jml_karyawan}', $this->jumlah_karyawan, $bapl);
        $bapl = str_replace('{jml_karyawan_terbilang}', $this->terbilang($this->jumlah_karyawan), $bapl);
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
		
		*/
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
