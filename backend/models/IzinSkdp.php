<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinSkdp as BaseIzinSkdp;

/**
 * This is the model class for table "izin_skdp".
 */
class IzinSkdp extends BaseIzinSkdp
{
    
    public $teks_preview;
    public $preview_data;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $nama_kelurahan_pt;
    public $nama_kecamatan_pt;
    public $nama_kabkota_pt;
    public $teks_sk;
    public $teks_penolakan;
    public $surat_pengurusan;
    public $surat_kuasa;
    public $teks_validasi;
    public $form_bapl;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'wilayah_id_perusahaan', 'kecamatan_id_perusahaan', 'kelurahan_id_perusahaan', 'nomor_akta_pendirian', 'nomor_sk_kemenkumham'], 'integer'],
            [['tanggal_lahir', 'tanggal_pendirian', 'tanggal_pengesahan'], 'safe'],
            [['nik', 'rt', 'rw', 'kodepos', 'telepon', 'npwp_perusahaan', 'blok_perusahaan', 'rt_perusahaan', 'rw_perusahaan', 'kodepos_perusahaan', 'telpon_perusahaan', 'fax_perusahaan', 'jumlah_karyawan', 'nomor_akta_pendirian', 'nomor_sk_kemenkumham'], 'number'],
            [['nik', 'rt', 'rw', 'kodepos', 'telepon', 'npwp_perusahaan', 'blok_perusahaan', 'rt_perusahaan', 'rw_perusahaan', 'kodepos_perusahaan', 'telpon_perusahaan', 'fax_perusahaan', 'jumlah_karyawan', 'nomor_akta_pendirian', 'nomor_sk_kemenkumham'], 'match', 'pattern' => '/^[0-9]+$/', 'message' => Yii::t('app', 'Hanya angka yang diperbolehkan')],
            [['jenkel', 'agama', 'alamat', 'alamat_perusahaan', 'status_kepemilikan', 'status_kantor'], 'string'],
            [['nik', 'passport'], 'string', 'max' => 16],
            [['nomor_akta_pendirian', 'nomor_sk_kemenkumham', 'jumlah_karyawan'], 'string', 'max' => 5],
            [['nama', 'nama_perusahaan', 'nama_gedung_perusahaan'], 'string', 'max' => 100],
            [['tempat_lahir', 'titik_koordinat', 'latitude', 'longtitude', 'blok_perusahaan', 'nama_notaris_pendirian', 'nama_notaris_pengesahan'], 'string', 'max' => 50],
            [['rt', 'rw', 'rt_perusahaan', 'rw_perusahaan'], 'string', 'max' => 5],
            [['kodepos', 'kodepos_perusahaan'], 'string', 'max' => 5, 'min' => 5],
            [['telepon', 'telpon_perusahaan', 'fax_perusahaan'], 'string', 'max' => 15],
            [['npwp_perusahaan'], 'string', 'max' => 20],
            [['klarifikasi_usaha'], 'string', 'max' => 150]
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
                        $lokasi = $this->wilayah_id_perusahaan;
                        break;
                    case 3:
                        $lokasi = $this->kecamatan_id_perusahaan;
                        break;
                    case 4:
                        $lokasi = $this->kelurahan_id_perusahaan;
                        break;
                    default:
                        $lokasi = 11;
                }

                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi, $this->user_id);

                $this->perizinan_id = $pid;
                $this->lokasi_id = $lokasi;
            } else {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
                switch ($wewenang) {
                        case 1:
                            $lokasi = 11;
                            break;
                        case 2:
                            $lokasi = $this->wilayah_id_perusahaan;
                            break;
                        case 3:
                            $lokasi = $this->kecamatan_id_perusahaan;
                            break;
                        case 4:
                            $lokasi = $this->kelurahan_id_perusahaan;
                            break;
                        default:
                            $lokasi = 11;
                }
                $this->lokasi_id = $lokasi;
                $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
                $perizinan->lokasi_izin_id = $lokasi;
                if($_SESSION['UpdatePetugas']){
                    $session = Yii::$app->session;
                    $session->set('UpdatePetugas',0);
                } else {
                    $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
                }
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
        $this->nama_kelurahan = Lokasi::findOne(['id'=>$this->kelurahan_id])->nama;
        $this->nama_kecamatan = Lokasi::findOne(['id'=>$this->kecamatan_id])->nama;
        $this->nama_kabkota = Lokasi::findOne(['id'=>$this->wilayah_id])->nama;
        $this->nama_kelurahan_pt = Lokasi::findOne(['id'=>$this->kelurahan_id_perusahaan])->nama;
        $this->nama_kecamatan_pt = Lokasi::findOne(['id'=>$this->kecamatan_id_perusahaan])->nama;
        $this->nama_kabkota_pt = Lokasi::findOne(['id'=>$this->wilayah_id_perusahaan])->nama;
        
        $kwn = Negara::findOne(['id' => $this->kewarganegaraan_id]);
        $kwn = $kwn->nama_negara;
        
        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        //====================preview_sk========
        $preview_sk = $izin->template_preview;       
        
        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);

        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{alamat_kantor}', $kantorByReg->alamat, $preview_sk);
        //Pengelola
        $preview_sk = str_replace('{passport}', $this->passport, $preview_sk);
        $preview_sk = str_replace('{nik}', strtoupper($this->nik), $preview_sk);
        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
        $preview_sk = str_replace('{alamat}', strtoupper($this->alamat), $preview_sk);
        $preview_sk = str_replace('{pathir}', $this->tempat_lahir, $preview_sk);
        $preview_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $preview_sk);
        $preview_sk = str_replace('{agama}', strtoupper($this->agama), $preview_sk);
        $preview_sk = str_replace('{kewarganegaraan}', $kwn, $preview_sk);
        $preview_sk = str_replace('{rt}', $this->rt, $preview_sk);
        $preview_sk = str_replace('{rw}', $this->rw, $preview_sk);
        $preview_sk = str_replace('{p_kelurahan}',  $this->nama_kelurahan, $preview_sk);
        $preview_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_sk);
        $preview_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_sk);
        //Perusahaan      
        $preview_sk = str_replace('{nm_perusahaan}', $this->nama_perusahaan, $preview_sk);
        $preview_sk = str_replace('{jenis_usaha}', $this->klarifikasi_usaha, $preview_sk);
        $preview_sk = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $preview_sk);
        $preview_sk = str_replace('{status_kepemilikan}', $this->status_kepemilikan, $preview_sk);
        $preview_sk = str_replace('{status_kantor}', $this->status_kantor, $preview_sk);
//        $preview_sk = str_replace('{zonasi}', $perizinan->zonasi_sesuai, $preview_sk);
        $preview_sk = str_replace('{akta_pendirian_no}', $this->nomor_akta_pendirian, $preview_sk);
        $preview_sk = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{notaris_nama}', $this->nama_notaris_pendirian, $preview_sk);
        $preview_sk = str_replace('{kemenkumham}', $this->nomor_sk_kemenkumham, $preview_sk);
        $preview_sk = str_replace('{akta_pengesahan_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{notaris_pengesahan}', $this->nama_notaris_pengesahan, $preview_sk);
        $preview_sk = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $preview_sk);
        $preview_sk = str_replace('{kabupaten}', $this->nama_kabkota_pt, $preview_sk);
        $preview_sk = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $preview_sk);
        $preview_sk = str_replace('{tanggal_sekarang}',Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);
        $preview_sk = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
        
        $preview_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $preview_sk);

        
        $this->teks_preview = $preview_sk;
        
        //====================Validasi========
        $validasi = $izin->template_valid;
        
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id'=>5]);
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
//        $validasi = str_replace('{saksi2_nama}', strtoupper($this->nama_saksi2), $validasi);
        $validasi = str_replace('{alamat}', strtoupper($this->alamat), $validasi);
        $validasi = str_replace('{pathir}', $this->tempat_lahir, $validasi);
        $validasi = str_replace('{talhir}', $this->tanggal_lahir, $validasi);
        $validasi = str_replace('{telp}', $this->telepon, $validasi);
        $validasi = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $validasi);
        $validasi = str_replace('{agama}', $this->agama, $validasi);
        //$validasi = str_replace('{pekerjaan}', $this->pekerjaan, $validasi);
       // $validasi = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $validasi);

//        $validasi = str_replace('{pada}', $this->instansi_tujuan, $validasi);
//        $validasi = str_replace('{keperluan}', $this->keperluan_administrasi, $validasi);
        $validasi = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
        $validasi = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $validasi);
        $validasi = str_replace('{blok_pt}', $this->blok_perusahaan, $validasi);
        $validasi = str_replace('{nm_gedung}', $this->nama_gedung_perusahaan, $validasi);
        $validasi = str_replace('{lat}', strtoupper($this->latitude), $validasi);
        $validasi = str_replace('{long}', strtoupper($this->longtitude), $validasi);
        $validasi = str_replace('{titik_koordinat}', strtoupper($this->titik_koordinat), $validasi);
        $validasi = str_replace('{tlp_pt}', $this->telepon_perusahaan, $validasi);
        $validasi = str_replace('{tlp_fax}', $this->fax_perusahaan, $validasi);
        $validasi = str_replace('{email}', $this->perusahaan_email, $validasi);
        $validasi = str_replace('{nm_perusahaan}', strtoupper($this->nama_perusahaan), $validasi);
        $validasi = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $validasi);
        $validasi = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $validasi);
        $validasi = str_replace('{kode_registrasi}',  strtoupper($perizinan->kode_registrasi) , $validasi);
        $validasi = str_replace('{kode_pos}', $kantorByReg->kodepos, $validasi);
        $this->teks_validasi = $validasi;
        //====================preview data========
        $preview_data = $izin->preview_data;
        
        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);

        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
        
        $preview_data = str_replace('{alamat}', strtoupper($this->alamat), $preview_data);
        $preview_data = str_replace('{pathir}', $this->tempat_lahir, $preview_data);
        $preview_data = str_replace('{talhir}', $this->tanggal_lahir, $preview_data);
        $preview_data = str_replace('{telp}', $this->telepon, $preview_data);
        $preview_data = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $preview_data);
        $preview_data = str_replace('{agama}', strtoupper($this->agama), $preview_data);
        //$preview_data = str_replace('{pekerjaan}', $this->pekerjaan, $preview_data);
       // $preview_data = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $preview_data);
//        $preview_data = str_replace('{pada}', $this->instansi_tujuan, $preview_data);
        $preview_data = str_replace('{rt}', $this->rt, $preview_data);
        $preview_data = str_replace('{rw}', $this->rw, $preview_data);
        $preview_data = str_replace('{passport}', $this->passport, $preview_data);
        $preview_data = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_data);
        $preview_data = str_replace('{p_kelurahan}',  $this->nama_kelurahan, $preview_data);
        $preview_data = str_replace('{p_kabupaten}', $this->nama_kabkota, $preview_data);
        $preview_data = str_replace('{p_kecamatan}', $this->nama_kecamatan, $preview_data);
        $preview_data = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $preview_data);
        //perusahaan  
        $preview_data = str_replace('{blok_pt}', $this->blok_perusahaan, $preview_data);
        $preview_data = str_replace('{nm_gedung}', $this->nama_gedung_perusahaan, $preview_data);
        $preview_data = str_replace('{lat}', strtoupper($this->latitude), $preview_data);
        $preview_data = str_replace('{long}', strtoupper($this->longtitude), $preview_data);
        $preview_data = str_replace('{titik_koordinat}', strtoupper($this->titik_koordinat), $preview_data);
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
        $this->preview_data = $preview_data;
        
        //====================template_sk======== 
        $teks_sk = $izin->template_sk;
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id'=>5]);
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);

        $teks_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $teks_sk);
        $teks_sk = str_replace('{alamat_kantor}', $kantorByReg->alamat, $teks_sk);
        $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
        $teks_sk = str_replace('{nik}', strtoupper($this->nik), $teks_sk);
        $teks_sk = str_replace('{nama}', strtoupper($this->nama), $teks_sk);
        $teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
        $teks_sk = str_replace('{pathir}', $this->tempat_lahir, $teks_sk);
        $teks_sk = str_replace('{talhir}', $this->tanggal_lahir, $teks_sk);
        $teks_sk = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $teks_sk);
        $teks_sk = str_replace('{agama}', strtoupper($this->agama), $teks_sk);
        $teks_sk = str_replace('{kewarganegaraan}', $kwn, $teks_sk);
        $teks_sk = str_replace('{rt}', $this->rt, $teks_sk);
        $teks_sk = str_replace('{rw}', $this->rw, $teks_sk);
        $teks_sk = str_replace('{p_kelurahan}',  $this->nama_kelurahan, $teks_sk);
        $teks_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $teks_sk);
        $teks_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $teks_sk);
        
        $teks_sk = str_replace('{kelurahan}', $this->nama_kelurahan_pt, $teks_sk);
        $teks_sk = str_replace('{kabupaten}', $this->nama_kabkota_pt, $teks_sk);
        $teks_sk = str_replace('{kecamatan}', $this->nama_kecamatan_pt, $teks_sk);
        $teks_sk = str_replace('{nm_perusahaan}', $this->nama_perusahaan, $teks_sk);
        $teks_sk = str_replace('{jenis_usaha}', $this->klarifikasi_usaha, $teks_sk);
        $teks_sk = str_replace('{alamat_perusahaan}', $this->alamat_perusahaan, $teks_sk);
        $teks_sk = str_replace('{status_kepemilikan}', $this->status_kepemilikan, $teks_sk);
        $teks_sk = str_replace('{status_kantor}', $this->status_kantor, $teks_sk);
        
        $teks_sk = str_replace('{akta_pendirian_no}', $this->nomor_akta_pendirian, $teks_sk);
        $teks_sk = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{notaris_nama}', $this->nama_notaris_pendirian, $teks_sk);
        $teks_sk = str_replace('{kemenkumham}', $this->nomor_sk_kemenkumham, $teks_sk);
        $teks_sk = str_replace('{akta_pengesahan_tanggal}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{notaris_pengesahan}', $this->nama_notaris_pengesahan, $teks_sk);
        
        $teks_sk = str_replace('{tanggal_sekarang}',Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
        $teks_sk = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $teks_sk);
        
        $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
        $teks_sk = str_replace('{kode_pos}', $kantorByReg->kodepos, $teks_sk);
       
        if($perizinan->plh_id == NULL){
            $teks_sk = str_replace('{plh}', "", $teks_sk);
        } else {
            $teks_sk = str_replace('{plh}', "PLH", $teks_sk);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $teks_sk = str_replace('{no_izin}', $perizinan->no_izin, $teks_sk);
            $teks_sk = str_replace('{nm_kepala}', $user->profile->name, $teks_sk);
            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
            $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        }
        $this->teks_sk = $teks_sk;
        //================================== Penolakan
        //Samuel
        $sk_penolakan = $izin->template_penolakan;
        
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id'=>5]);
        
        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_pos}', $kantorByReg->kodepos, $sk_penolakan);
        
        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', $this->nama, $sk_penolakan);
        
        $sk_penolakan = str_replace('{kabupaten}', $this->nama_kabkota, $sk_penolakan);
        $sk_penolakan = str_replace('{kecamatan}', $this->nama_kecamatan, $sk_penolakan);
        $sk_penolakan = str_replace('{kelurahan}', $this->nama_kelurahan, $sk_penolakan);
        $sk_penolakan = str_replace('{telepon}', $kantorByReg->telepon, $sk_penolakan);
        $sk_penolakan = str_replace('{namaKantor}', $kantorByReg->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{fax}', $kantorByReg->fax, $sk_penolakan);
        $sk_penolakan = str_replace('{email}', $kantorByReg->email_jak_go_id, $sk_penolakan);
        
        
        
        $sk_penolakan = str_replace('{alamat}', $this->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_registrasi}',$perizinan->kode_registrasi , $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{nama_izin}', $izin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{keterangan}', $alasan->keterangan, $sk_penolakan);
        
        $sk_penolakan = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_kepala}', $user->profile->name, $sk_penolakan);
        $sk_penolakan = str_replace('{nip_kepala}', $user->no_identitas, $sk_penolakan);
        
        if($perizinan->plh_id == NULL){
            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
        } else {
            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
        }
        
        $this->teks_penolakan = $sk_penolakan;
        //----------------surat pengurusan--------------------
        if(Yii::$app->user->identity->profile->tipe == 'Perorangan'){
             $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perorangan'])->value;
         } elseif(Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
             $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perusahaan'])->value;
         }
         $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
        // $pengurusan = str_replace('{jabatan}', strtoupper($this->pekerjaan), $pengurusan);
         $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
         $pengurusan = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
        
         //----------------surat Kuasa--------------------
         if(Yii::$app->user->identity->profile->tipe == 'Perorangan'){
         $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perorangan'])->value;
         } elseif(Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
             $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perusahaan'])->value;
         }
         $kuasa = str_replace('{nik}', $this->nik, $kuasa);
         $kuasa = str_replace('{alamat}', strtoupper($this->alamat), $kuasa);
        // $kuasa = str_replace('{jabatan}', strtoupper($this->pekerjaan), $kuasa);
         $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
         $kuasa = str_replace('{tgl_pernyataan}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
         $this->surat_kuasa=$kuasa;
         
//         ====================template_BAPL========
         $this->form_bapl = $izin->template_ba_lapangan;
        
    }
	
}
