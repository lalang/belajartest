<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisata as BaseIzinPariwisata;

/**
 * This is the model class for table "izin_pariwisata".
 */
class IzinPariwisata extends BaseIzinPariwisata
{
    public $teks_preview;
    public $preview_data;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $nama_propinsi;
    public $nama_propinsi_pt;
    public $nama_kabkota_pt;
    public $nama_kelurahan_pt;
    public $nama_kecamatan_pt;
    public $nama_propinsi_owner;
    public $nama_kabkota_owner;
    public $nama_kelurahan_owner;
    public $nama_kecamatan_owner;
    public $nama_kelurahan_usaha;
    public $nama_kecamatan_usaha;
    public $nama_kabkota_usaha;
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
	public $kewarganegaraan_id_penanggung_jawab_show;
	public $propinsi_id_penanggung_jawab_show;
	public $wilayah_id_penanggung_jawab_show;
	public $kecamatan_id_penanggung_jawab_show;
	public $kelurahan_id_penanggung_jawab_show;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
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
//            [['email', 'email_perusahaan'], 'email'],
            [['merk_nama_usaha'], 'string', 'max' => 150]
        ]);
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
                        $lokasi = $this->wilayah_id_usaha;
                        break;
                    case 3:
                        $lokasi = $this->kecamatan_id_usaha;
                        break;
                    case 4:
                        $lokasi = $this->kelurahan_id_usaha;
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
                        $lokasi = $this->wilayah_id_usaha;
                        break;
                    case 3:
                        $lokasi = $this->kecamatan_id_usaha;
                        break;
                    case 4:
                        $lokasi = $this->kelurahan_id_usaha;
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
        $this->nama_kelurahan_pt = Lokasi::findOne(['id' => $this->kelurahan_id_perusahaan])->nama;
        $this->nama_kecamatan_pt = Lokasi::findOne(['id' => $this->kecamatan_id_perusahaan])->nama;
        $this->nama_kabkota_pt = Lokasi::findOne(['id' => $this->wilayah_id_perusahaan])->nama;
        $this->nama_propinsi_pt = Lokasi::findOne(['id' => $this->propinsi_id_perusahaan])->nama;
        $this->nama_kelurahan_owner = Lokasi::findOne(['id' => $this->kelurahan_id__penanggung_jawab])->nama;
        $this->nama_kecamatan_owner = Lokasi::findOne(['id' => $this->kecamatan_id__penanggung_jawab])->nama;
        $this->nama_kabkota_owner = Lokasi::findOne(['id' => $this->wilayah_id__penanggung_jawab])->nama;
        $this->nama_propinsi_owner = Lokasi::findOne(['id' => $this->propinsi_id_penanggung_jawab])->nama;
        $this->nama_kelurahan_usaha = Lokasi::findOne(['id' => $this->kelurahan_id_usaha])->nama;
        $this->nama_kecamatan_usaha = Lokasi::findOne(['id' => $this->kecamatan_id_usaha])->nama;
        $this->nama_kabkota_usaha = Lokasi::findOne(['id' => $this->wilayah_id_usaha])->nama;
        
        $kwn = Negara::findOne(['id' => $this->kewarganegaraan_id]);
        $this->nama_negara = $kwn->nama_negara;
        $kwn = $this->nama_negara;
        
//        $alamat_lengkap = $this->alamat.' RT/RW:'.$this->rt.'/'.$this->rw.' Kel.'.$this->nama_kelurahan.' Kec.'.$this->nama_kecamatan.' Kab.'.$this->nama_kabkota.', '.$this->nama_propinsi;
//        $alamat_lengkap_p = $this->alamat_tempat_praktik.' RT/RW:'.$this->rt_tempat_praktik.'/'.$this->rw_tempat_praktik.' Kel.'.$this->nama_kelurahan_pt.' Kec.'.$this->nama_kecamatan_pt.' Kab.'.$this->nama_kabkota_pt.', DKI Jakarta';
//        
//        if($perizinan->aktif == "N"){
//            $relasinya = Perizinan::find()
//                    ->where(['relasi_id'=>$perizinan->id])
//                    ->andWhere(['status'=>'Selesai'])
//                    ->one();
//            $statusSK = "SK yang berlaku adalah Nomor ".$relasinya->no_izin. ", dan";
//        } else {
//            $statusSK = "";
//        }
//
       
        //====================preview_sk========
        $preview_sk = $izin->template_preview;

        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);
        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{tipe}', $this->tipe, $preview_sk);
        $preview_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{pathir}', $this->tempat_lahir, $preview_sk);
        $preview_sk = str_replace('{alamat}', strtoupper($this->alamat), $preview_sk);
        $preview_sk = str_replace('{rt}', $this->rt, $preview_sk);
        $preview_sk = str_replace('{rw}', $this->rw, $preview_sk);
        $preview_sk = str_replace('{no_reg}', $perizinan->kode_registrasi, $preview_sk);
        $preview_sk = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{p_kelurahan}', $this->nama_kelurahan, $preview_sk);
        $preview_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_sk);
        $preview_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_sk);
        $preview_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $preview_sk);
//        $preview_sk = str_replace('{nm_perusahaan}', $this->nama_tempat_praktik, $preview_sk);
//        $preview_sk = str_replace('{alamat_perusahaan}', $this->alamat_tempat_praktik, $preview_sk);
//        $preview_sk = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $preview_sk);
//        $preview_sk = str_replace('{blok}', $this->blok_tempat_praktik, $preview_sk);
//        $preview_sk = str_replace('{rt_praktik}', $this->rt_tempat_praktik, $preview_sk);
//        $preview_sk = str_replace('{rw_praktik}', $this->rw_tempat_praktik, $preview_sk);
//        $preview_sk = str_replace('{kelurahan_praktik}', $this->nama_kelurahan_pt, $preview_sk);
//        $preview_sk = str_replace('{kecamatan_praktik}', $this->nama_kecamatan_pt, $preview_sk);
//        $preview_sk = str_replace('{kabupaten_praktik}', $this->nama_kabkota_pt, $preview_sk);
//        $preview_sk = str_replace('{propinsi_praktik}', 'DKI Jakarta', $preview_sk);
//        $preview_sk = str_replace('{no_str}', $this->nomor_str, $preview_sk);
//        $preview_sk = str_replace('{tgllaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $preview_sk);
//        $preview_sk = str_replace('{no_rekomop}', $this->nomor_rekomendasi, $preview_sk);
//        $preview_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $preview_sk);
//        $preview_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $preview_sk);
//        $preview_sk = str_replace('{alamat_praktik}', $this->alamat_tempat_praktik, $preview_sk);
//        $preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/'.$perizinan->perizinanBerkas[0]->userFile->path.'/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);

        if ($perizinan->plh_id == NULL) {
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
        
        if($perizinan->relasi_id){
            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
            $preview_sk = str_replace('{alias}', $perizinanParent->izin->alias, $preview_sk);
            $preview_sk = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $preview_sk);
            $preview_sk = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $preview_sk);
            $preview_sk = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $preview_sk);
        }

        $this->teks_preview = $preview_sk;

        //====================Validasi========
        $validasi = $izin->template_valid;

//        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
//        $validasi = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $validasi);
//        $validasi = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $validasi);
//        $validasi = str_replace('{namagelar}', $this->nama_gelar, $validasi);
//        $validasi = str_replace('{alamat_praktik}', $this->alamat_tempat_praktik, $validasi);
//        $validasi = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $validasi);
//        $validasi = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/'.$perizinan->perizinanBerkas[0]->userFile->path.'/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $validasi);
//
//        if ($perizinan->no_izin !== null) {
//            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
//            $validasi = str_replace('{no_sk}', $perizinan->no_izin, $validasi);
//            $validasi = str_replace('{nm_kepala}', $user->profile->name, $validasi);
//            $validasi = str_replace('{nip_kepala}', $user->no_identitas, $validasi);
//            $validasi = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $validasi);
//        }
//        $validasi = str_replace('{nik}', strtoupper($this->nik), $validasi);
//        $validasi = str_replace('{nama}', strtoupper($this->nama), $validasi);
////        $validasi = str_replace('{saksi1_nama}', strtoupper($this->nama_saksi1), $validasi);
//
//        $validasi = str_replace('{alamat}', strtoupper($this->alamat), $validasi);
//        $validasi = str_replace('{pathir}', $this->tempat_lahir, $validasi);
//        $validasi = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $validasi);
//        $validasi = str_replace('{telp}', $this->telepon, $validasi);
//        $validasi = str_replace('{jenkel}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $validasi);
//        $validasi = str_replace('{agama}', $this->agama, $validasi);
//        $validasi = str_replace('{rt}', $this->rt, $validasi);
//        $validasi = str_replace('{rw}', $this->rw, $validasi);
//        $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
//        $validasi = str_replace('{p_kelurahan}', $this->nama_kelurahan, $validasi);
//        $validasi = str_replace('{p_kabupaten}', $this->nama_kabkota, $validasi);
//        $validasi = str_replace('{p_kecamatan}', $this->nama_kecamatan, $validasi);
//        $validasi = str_replace('{p_propinsi}', $this->nama_propinsi, $validasi);
//        $validasi = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $validasi);
//        $validasi = str_replace('{blok}', $this->blok_tempat_praktik, $validasi);
//        $validasi = str_replace('{nm_perusahaan}', $this->nama_tempat_praktik, $validasi);
//        $validasi = str_replace('{alamat_perusahaan}', $this->alamat_tempat_praktik, $validasi);
//        $validasi = str_replace('{rt_praktik}', $this->rt_tempat_praktik, $validasi);
//        $validasi = str_replace('{rw_praktik}', $this->rw_tempat_praktik, $validasi);
//        $validasi = str_replace('{kelurahan_praktik}', $this->nama_kelurahan_pt, $validasi);
//        $validasi = str_replace('{kecamatan_praktik}', $this->nama_kecamatan_pt, $validasi);
//        $validasi = str_replace('{kabupaten_praktik}', $this->nama_kabkota_pt, $validasi);
//        $validasi = str_replace('{propinsi_praktik}', 'DKI Jakarta', $validasi);
//        $validasi = str_replace('{no_str}', $this->nomor_str, $validasi);
//        $validasi = str_replace('{tgllaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $validasi);
//        $validasi = str_replace('{no_rekomop}', $this->nomor_rekomendasi, $validasi);
//        $validasi = str_replace('{expired}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $validasi);
//        $validasi = str_replace('{kewarganegaraan}', $kwn, $validasi);
//        $validasi = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
//        
//        $validasi = str_replace('{no_sk_update}', $statusSK, $validasi);
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $validasi = str_replace('{alias}', $perizinanParent->izin->alias, $validasi);
//            $validasi = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $validasi);
//            $validasi = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $validasi);
//            $validasi = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $validasi);
//        }
        $this->teks_validasi = $validasi;
        //====================preview data========
        $preview_data = $izin->preview_data;

        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);

        $preview_data = str_replace('{no_reg}', $perizinan->kode_registrasi, $preview_data);
        
        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{tipe}', $this->tipe, $preview_data);
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
        $preview_data = str_replace('{passport}', $this->passport, $preview_data);
        $preview_data = str_replace('{telepon}', $this->telepon, $preview_data);
        $preview_data = str_replace('{email}', $perizinan->pemohon->email, $preview_data);
        $preview_data = str_replace('{kitas}', $this->kitas, $preview_data);
        $preview_data = str_replace('{kewarganegaraan}', $kwn, $preview_data);

        $preview_data = str_replace('{npwp}', $this->npwp_perusahaan, $preview_data);
        
        $preview_data = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_data);
        
        $preview_data = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $preview_data);
        $preview_data = str_replace('{nama_gedung}', $this->nama_gedung_perusahaan, $preview_data);
        $preview_data = str_replace('{blok_perusahaan}', $this->blok_perusahaan, $preview_data);
        $preview_data = str_replace('{kelurahan_perusahaan}', $this->nama_kelurahan_pt, $preview_data);
        $preview_data = str_replace('{kecamatan_perusahaan}', $this->nama_kecamatan_pt, $preview_data);
        $preview_data = str_replace('{kabupaten_perusahaan}', $this->nama_kabkota_pt, $preview_data);
        $preview_data = str_replace('{propinsi_perusahaan}', 'DKI Jakarta', $preview_data);
        $preview_data = str_replace('{kodepos_praktik}', $this->kodepos_perusahaan, $preview_data);
        $preview_data = str_replace('{tlp_perusahaan}', $this->telpon_perusahaan, $preview_data);
        $preview_data = str_replace('{fax_perusahaan}', $this->fax_perusahaan, $preview_data);
        $preview_data = str_replace('{email_perusahaan}', $this->email_perusahaan, $preview_data);
        $preview_data = str_replace('{nomor_akta_pendirian}', $this->nomor_akta_pendirian, $preview_data);
        
        $preview_data = str_replace('{tanggal_pendirian}', $this->tanggal_pendirian, $preview_data);
        $preview_data = str_replace('{nama_notaris_pendirian}', $this->nama_notaris_pendirian, $preview_data);
        $preview_data = str_replace('{nomor_sk_pengesahan}', $this->nomor_sk_pengesahan, $preview_data);
        $preview_data = str_replace('{tanggal_pengesahan}', $this->tanggal_pengesahan, $preview_data);
        $preview_data = str_replace('{nomor_akta_cabang}', $this->nomor_akta_cabang, $preview_data);
        $preview_data = str_replace('{tanggal_cabang}', $this->tanggal_cabang, $preview_data);
        $preview_data = str_replace('{nama_notaris_cabang}', $this->nama_notaris_cabang, $preview_data);
        $preview_data = str_replace('{keputusan_cabang}', $this->keputusan_cabang, $preview_data);
        $preview_data = str_replace('{tanggal_keputusan_cabang}', $this->tanggal_keputusan_cabang, $preview_data);
       
            $no = 1;
//            $jadwal = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $this->id]);
//            foreach ($jadwal as $value) {
//                $hari_praktik = $value->hari_praktik;
//                $jam_praktik = $value->jam_praktik;
//                $jadwal_table2 .= '
//                <tr>
//                    <td  width="34" valign="top">' . $no . '.</td>
//                    <td width="500"><p>Hari Praktik</p></td>
//                    <td valign="top" width="2">:</td>
//                    <td width="500"><p>' . $hari_praktik . '</p></td>
//                    <td width="500"><p>Jam Praktik</p></td>
//                    <td valign="top" width="2">:</td>
//                    <td width="500"><p>' . $jam_praktik . '</p></td>
//                </tr>
//                ';
//                $no++;
//            }
//            $table = '<table border=0>' . $jadwal_table2 . '</table>';
//            
            
        $preview_data = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
        $preview_data = str_replace('{nama_izin}', $perizinan->izin->nama, $preview_data);

        $this->preview_data = $preview_data;
        //====================template_sk======== 
//        $teks_sk = $izin->template_sk;
//        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
//        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
//        $teks_sk = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $teks_sk);
//
//        $teks_sk = str_replace('{namagelar}', $this->nama_gelar, $teks_sk);
//        $teks_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{pathir}', $this->tempat_lahir, $teks_sk);
//        $teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
//        $teks_sk = str_replace('{rt}', $this->rt, $teks_sk);
//        $teks_sk = str_replace('{rw}', $this->rw, $teks_sk);
//        $teks_sk = str_replace('{no_reg}', $perizinan->kode_registrasi, $teks_sk);
//        $teks_sk = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{p_kelurahan}', $this->nama_kelurahan, $teks_sk);
//        $teks_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $teks_sk);
//        $teks_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $teks_sk);
//        $teks_sk = str_replace('{p_propinsi}', $this->nama_propinsi, $teks_sk);
//        $teks_sk = str_replace('{nama_gedung}', $this->nama_gedung_praktik, $teks_sk);
//        $teks_sk = str_replace('{blok}', $this->blok_tempat_praktik, $teks_sk);
//        $teks_sk = str_replace('{nm_perusahaan}', $this->nama_tempat_praktik, $teks_sk);
//        $teks_sk = str_replace('{alamat_perusahaan}', $this->alamat_tempat_praktik, $teks_sk);
//        $teks_sk = str_replace('{rt_praktik}', $this->rt_tempat_praktik, $teks_sk);
//        $teks_sk = str_replace('{rw_praktik}', $this->rw_tempat_praktik, $teks_sk);
//        $teks_sk = str_replace('{kelurahan_praktik}', $this->nama_kelurahan_pt, $teks_sk);
//        $teks_sk = str_replace('{kecamatan_praktik}', $this->nama_kecamatan_pt, $teks_sk);
//        $teks_sk = str_replace('{kabupaten_praktik}', $this->nama_kabkota_pt, $teks_sk);
//        $teks_sk = str_replace('{propinsi_praktik}', 'DKI Jakarta', $teks_sk);
//        $teks_sk = str_replace('{no_str}', $this->nomor_str, $teks_sk);
//        $teks_sk = str_replace('{tgllaku_str}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{no_rekomop}', $this->nomor_rekomendasi, $teks_sk);
//        $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($this->tanggal_berlaku_str, 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $teks_sk);
//
//        //$teks_sk = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $teks_sk);
//        $teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/'.$perizinan->perizinanBerkas[0]->userFile->path.'/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
//        if ($perizinan->plh_id == NULL) {
//            $teks_sk = str_replace('{plh}', "", $teks_sk);
//        } else {
//            $teks_sk = str_replace('{plh}', "PLH", $teks_sk);
//        }
//        if ($perizinan->no_izin !== null) {
//            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
//            $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
//            $teks_sk = str_replace('{nm_kepala}', $user->profile->name, $teks_sk);
//            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
//        }
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $teks_sk = str_replace('{alias}', $perizinanParent->izin->alias, $teks_sk);
//            $teks_sk = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $teks_sk);
//            $teks_sk = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $teks_sk);
//            $teks_sk = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $teks_sk);
//        }

        $this->teks_sk = $teks_sk;
        //================================== Penolakan
//        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
//        $kode = Lokasi::findOne(['id' => $perizinan->lokasi_izin_id]);
//        $namaKabupaten = Lokasi::findOne(['propinsi' => $kode->propinsi, 'kabupaten_kota' => $kode->kabupaten_kota, 'kecamatan' => '00', 'kelurahan' => '0000'])->nama;
//        $namaKecamatan = Lokasi::findOne(['propinsi' => $kode->propinsi, 'kabupaten_kota' => $kode->kabupaten_kota, 'kecamatan' => $kode->kecamatan, 'kelurahan' => '0000'])->nama;
//        $sk_penolakan = $izin->template_penolakan;
//        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
//        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
//        $sk_penolakan = str_replace('{kabupaten}', $namaKabupaten, $sk_penolakan);
//        $sk_penolakan = str_replace('{KECAMATAN}', $namaKecamatan, $sk_penolakan);
//        $sk_penolakan = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $sk_penolakan);
//        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
//        $sk_penolakan = str_replace('{kode_pos}', $kantorByReg->kodepos, $sk_penolakan);
//        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $sk_penolakan);
//        $sk_penolakan = str_replace('{no_reg}', $perizinan->kode_registrasi, $sk_penolakan);
//        $sk_penolakan = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $sk_penolakan);
//        $sk_penolakan = str_replace('{nama}', $this->nama, $sk_penolakan);
//        $sk_penolakan = str_replace('{alamat}', strtoupper($this->alamat), $sk_penolakan);
//        $sk_penolakan = str_replace('{rt}', $this->rt, $sk_penolakan);
//        $sk_penolakan = str_replace('{rw}', $this->rw, $sk_penolakan);
//        $sk_penolakan = str_replace('{p_kelurahan}', $this->nama_kelurahan, $sk_penolakan);
//        $sk_penolakan = str_replace('{p_kecamatan}', $this->nama_kecamatan, $sk_penolakan);
//        $sk_penolakan = str_replace('{p_kabupaten}', $this->nama_kabkota, $sk_penolakan);
//        $sk_penolakan = str_replace('{p_propinsi}', $this->nama_propinsi, $sk_penolakan);
//        $sk_penolakan = str_replace('{nama_izin}', $perizinan->izin->nama, $sk_penolakan);
//        $sk_penolakan = str_replace('{keterangan}', $alasan->keterangan, $sk_penolakan);
//
//        if ($perizinan->plh_id == NULL) {
//            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
//        } else {
//            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
//        }
//        if ($perizinan->no_izin !== null) {
//            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
//            $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
//            $sk_penolakan = str_replace('{nama_kepala}', $user->profile->name, $sk_penolakan);
//            $sk_penolakan = str_replace('{nip_kepala}', $user->no_identitas, $sk_penolakan);
//        }
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $sk_penolakan = str_replace('{alias}', $perizinanParent->izin->alias, $sk_penolakan);
//            $sk_penolakan = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $sk_penolakan);
//            $sk_penolakan = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $sk_penolakan);
//            $sk_penolakan = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $sk_penolakan);
//        }
//        
        $this->teks_penolakan = $sk_penolakan;

        //----------------surat pengurusan--------------------
//        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
//            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perorangan'])->value;
//        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
//            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perusahaan'])->value;
//        }
//        //Perorangan
//        $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
//        $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
//        $pengurusan = str_replace('{alamat}', strtoupper($alamat_lengkap), $pengurusan);
//        
//        //Perusahaan
//        $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_tempat_praktik), $pengurusan);
//        $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($alamat_lengkap_p), $pengurusan);
//        
//        //Umum
//        $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
//        $pengurusan = str_replace('{izin}', $perizinan->izin->nama, $pengurusan);
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $pengurusan = str_replace('{alias}', $perizinanParent->izin->alias, $pengurusan);
//            $pengurusan = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $pengurusan);
//            $pengurusan = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $pengurusan);
//            $pengurusan = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $pengurusan);
//        }
//        
        $this->surat_pengurusan = $pengurusan;

        //----------------surat Kuasa--------------------
//        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
//            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perorangan'])->value;
//        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
//            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perusahaan'])->value;
//        }
//        //Perorangan
//        $kuasa = str_replace('{nik}', $this->nik, $kuasa);
//        $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
//        $kuasa = str_replace('{alamat}', strtoupper($alamat_lengkap), $kuasa);
//        
//        //Perusahaan
//        $kuasa = str_replace('{nama_perusahaan}', strtoupper($this->nama_tempat_praktik), $kuasa);
//        $kuasa = str_replace('{alamat_perusahaan}', strtoupper($alamat_lengkap_p), $kuasa);
//        
//        //Umum
//        $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
//        $kuasa = str_replace('{izin}', $perizinan->izin->nama, $kuasa);
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $kuasa = str_replace('{alias}', $perizinanParent->izin->alias, $kuasa);
//            $kuasa = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $kuasa);
//            $kuasa = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $kuasa);
//            $kuasa = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $kuasa);
//        }

        $this->surat_kuasa = $kuasa;

        //----------------daftar--------------------
//        $daftar = \backend\models\Params::findOne(['name' => 'Tanda Registrasi'])->value;
//        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
//        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
//        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
//            $daftar = str_replace('{nama_ph}', $this->nama, $daftar);
//            $daftar = str_replace('{npwp}', $this->nik, $daftar);
//        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
//            $daftar = str_replace('{nama_ph}', $this->nama_tempat_praktik, $daftar);
//            $daftar = str_replace('{npwp}', $this->npwp_tempat_praktik, $daftar);
//        }
//        $daftar = str_replace('{kantor_ptsp}', $tempat_ambil . '&nbsp;' . $perizinan->lokasiPengambilan->nama, $daftar);
//        $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
//        $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
//        $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
//        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $daftar = str_replace('{alias}', $perizinanParent->izin->alias, $daftar);
//            $daftar = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $daftar);
//            $daftar = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $daftar);
//            $daftar = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $daftar);
//        }
//        
        $this->tanda_register = $daftar;

//      ====================template_BAPL========
//        $bapl = $izin->template_ba_lapangan;
//
//        $bapl = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $bapl);
//        $bapl = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $bapl);
//        $bapl = str_replace('{alamat_kantor}', $kantorByReg->alamat, $bapl);
//        $bapl = str_replace('{no_reg}', $perizinan->kode_registrasi, $bapl);
//        $bapl = str_replace('{nama_izin}', $perizinan->izin->nama, $bapl);
//        $bapl = str_replace('{nama}', strtoupper($this->nama), $bapl);
//        $bapl = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $bapl);
//        $bapl = str_replace('{kabupaten}', $this->nama_kabkota_pt, $bapl);
//        $bapl = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $bapl);
//        $bapl = str_replace('{akta_perubahan}', $perubahan, $bapl);
//        $bapl = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $bapl);
//        $bapl = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/'.$perizinan->perizinanBerkas[0]->userFile->path.'/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $bapl);
//        $bapl = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $bapl);
//        $bapl = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $bapl);
//        $bapl = str_replace('{kode_pos}', $kantorByReg->kodepos, $bapl);
//
//        $bapl = str_replace('{zonasi}', $zonasi, $bapl);
//        if ($perizinan->plh_id == NULL) {
//            $bapl = str_replace('{plh}', "", $bapl);
//        } else {
//            $bapl = str_replace('{plh}', "PLH", $bapl);
//        }
//        if ($perizinan->no_izin !== null) {
//            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
//            $bapl = str_replace('{no_izin}', $perizinan->no_izin, $bapl);
//            $bapl = str_replace('{nm_kepala}', $user->profile->name, $bapl);
//            $bapl = str_replace('{nip_kepala}', $user->no_identitas, $bapl);
//            $bapl = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $bapl);
//        }
//        
//        if($perizinan->relasi_id){
//            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
//            $bapl = str_replace('{alias}', $perizinanParent->izin->alias, $bapl);
//            $bapl = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $bapl);
//            $bapl = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $bapl);
//            $bapl = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $bapl);
//        }
//        
        $this->form_bapl = $bapl;
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
