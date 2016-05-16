<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPenelitian as BaseIzinPenelitian;

/**
 * This is the model class for table "izin_penelitian".
 */
class IzinPenelitian extends BaseIzinPenelitian
{
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
    public $teks_batal;
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
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'nik','kelurahan_pemohon', 'kecamatan_pemohon', 'kabupaten_pemohon', 'provinsi_pemohon', 'kelurahan_instansi', 'kecamatan_instansi', 'kabupaten_instansi', 'provinsi_instansi', 'kab_penelitian', 'kec_penelitian', 'kel_penelitian', 'anggota'], 'integer'],
            [['tanggal_lahir', 'tgl_mulai_penelitian', 'tgl_akhir_penelitian'], 'safe'],
//            [['nik','nama','kelurahan_pemohon','tgl_mulai_penelitian', 'telepon_instansi','tgl_akhir_penelitian','npwp'
//             ], 'required'],
            ['email_instansi', 'email'],
            [['nama','nik','tempat_lahir', 'email', 'pekerjaan_pemohon', 'email_instansi'], 'string', 'max' => 200],
            [['alamat_pemohon', 'nama_instansi', 'fakultas', 'alamat_instansi', 'tema', 'instansi_penelitian', 'alamat_penelitian', 'bidang_penelitian'], 'string', 'max' => 255],
            [['rt', 'rw', 'kode_pos', 'kodepos_instansi'], 'string', 'max' => 5],
            [['telepon_pemohon', 'telepon_instansi', 'fax_instansi'], 'string', 'max' => 15],
            [['npwp'], 'string', 'max' => 50],
            
        ];
    }
	public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
//            $status = \Yii::$app->session->get('user.status');
            if ($this->isNewRecord) {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;

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
            } else {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
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
            $this->lokasi_id = $lokasi;
            $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
            $perizinan->lokasi_izin_id = $lokasi;
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
        $pemohonKab = Lokasi::findOne(['id' => $this->kabupaten_pemohon])->nama;
        $pemohonKel = Lokasi::findOne(['id' => $this->kelurahan_pemohon])->nama;
        $pemohonKec = Lokasi::findOne(['id' => $this->kecamatan_pemohon])->nama;
        $pemohonprop = Lokasi::findOne(['id' => $this->provinsi_pemohon])->nama;
//      Instansi
        $instansiKab = Lokasi::findOne(['id' => $this->kabupaten_instansi])->nama;
        $instansiKel = Lokasi::findOne(['id' => $this->kelurahan_instansi])->nama;
        $instansiKec = Lokasi::findOne(['id' => $this->kecamatan_instansi])->nama;
        $instansiprop = Lokasi::findOne(['id' => $this->provinsi_instansi])->nama;
//==================================
//----------------Preview SK----------------
        $preview_sk = $izin->template_preview;
        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);
        $preview_sk = str_replace('{nik}', strtoupper($this->nik), $preview_sk);
        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', $this->nama_instansi, $preview_sk);
        $preview_sk = str_replace('{fakultas}', $this->fakultas, $preview_sk);
        $preview_sk = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $preview_sk);
        $preview_sk = str_replace('{kabupaten}', $instansiKab, $preview_sk);
        $preview_sk = str_replace('{kecamatan}', $instansiKec, $preview_sk);
        $preview_sk = str_replace('{kelurahan}', $instansiKel, $preview_sk);
        $preview_sk = str_replace('{propinsi}', $instansiprop, $preview_sk);
        $preview_sk = str_replace('{kode_pos}', $this->kodepos_instansi, $preview_sk);
        $preview_sk = str_replace('{telepon_perusahaan}', $this->telepon_instansi, $preview_sk);
        $preview_sk = str_replace('{fax_perusahaan}', $this->fax_instansi, $preview_sk);
        $preview_sk = str_replace('{perusahaan_email}', $this->email_instansi, $preview_sk);
        $preview_sk = str_replace('{tema}', $this->tema, $preview_sk);
        $preview_sk = str_replace('{namawil}', strtoupper($perizinan->lokasiIzin->nama), $preview_sk);
        
        $this->teks_preview = $preview_sk;
 //==================================       
//----------------Preview Data----------------
        $preview_data = $izin->preview_data;
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
        $preview_data = str_replace('{talhir}', $this->tempat_lahir, $preview_data);
        $preview_data = str_replace('{pathir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{alamat}', strtoupper($this->alamat_pemohon), $preview_data);
        $preview_data = str_replace('{rt}', $this->rt, $preview_data);
        $preview_data = str_replace('{rw}', $this->rw, $preview_data);
        $preview_data = str_replace('{p_keluranhan}', $pemohonKel, $preview_data);
        $preview_data = str_replace('{p_kecamatan}', $pemohonKec, $preview_data);
        $preview_data = str_replace('{p_kabupaten}', $pemohonKab, $preview_data);
        $preview_data = str_replace('{p_propinsi}', $pemohonprop, $preview_data);
        $preview_data = str_replace('{telp}', $this->telepon_pemohon, $preview_data);
        $preview_data = str_replace('{email}', $this->email, $preview_data);
        $preview_data = str_replace('{kd_pos}', $this->kode_pos, $preview_data);
        $preview_data = str_replace('{pekerjaan}', $this->pekerjaan_pemohon, $preview_data);
        
        //Instansi   
        $preview_data = str_replace('{nama_perusahaan}', $this->nama_instansi, $preview_data);
        $preview_data = str_replace('{fakultas}', $this->fakultas, $preview_data);
        $preview_data = str_replace('{alamat_perusahaan}', $this->alamat_instansi, $preview_data);
        $preview_data = str_replace('{kabupaten}', $instansiKab, $preview_data);
        $preview_data = str_replace('{kecamatan}', $instansiKec, $preview_data);
        $preview_data = str_replace('{kelurahan}', $instansiKel, $preview_data);
        $preview_data = str_replace('{propinsi}', $instansiprop, $preview_data);
        $preview_data = str_replace('{kode_pos}', $this->kodepos_instansi, $preview_data);
        $preview_data = str_replace('{telepon_perusahaan}', $this->telepon_instansi, $preview_data);
        $preview_data = str_replace('{fax_perusahaan}', $this->fax_instansi, $preview_data);
        $preview_data = str_replace('{perusahaan_email}', $this->email_instansi, $preview_data);
        $preview_data = str_replace('{tema}', $this->tema, $preview_data);
//        Penelitian
        $preview_data = str_replace('{instansi_penelitian}', $this->instansi_penelitian, $preview_data);
        $preview_data = str_replace('{alamat_penelitian}', $this->alamat_penelitian, $preview_data);
        $preview_data = str_replace('{bidang_penelitian}', $this->bidang_penelitian, $preview_data);
        $preview_data = str_replace('{anggota}', $this->anggota, $preview_data);
        $preview_data = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->tgl_mulai_penelitian, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{tgl_akhir}', Yii::$app->formatter->asDate($this->tgl_akhir_penelitian, 'php: d F Y'), $preview_data);
        $this->preview_data = $preview_data;
//==================================        
//----------------Validasi----------------
        
       $validasi = $izin->template_valid;
       $this->teks_validasi = $validasi;
       
 //==================================
//----------------SK----------------
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
         $this->teks_sk = $sk_siup;
//==================================
//----------------SK Penolakan----------------
        $sk_penolakan = $izin->template_penolakan;
        if($perizinan->plh_id == NULL){
            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
        } else {
            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
        }
        
        $this->teks_penolakan = $sk_penolakan;
//==================================
//----------------surat Kuasa--------------------
if(Yii::$app->user->identity->profile->tipe == 'Perorangan'){
             $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perorangan'])->value;
         } elseif(Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
             $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perusahaan'])->value;
         }
         $this->surat_kuasa=$kuasa;
//==================================
//----------------surat pengurusan--------------------
         if(Yii::$app->user->identity->profile->tipe == 'Perorangan'){
             $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perorangan'])->value;
         } elseif(Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
             $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perusahaan'])->value;
         }
        $this->surat_pengurusan=$pengurusan;
//==================================
//----------------daftar--------------------
        $daftar= \backend\models\Params::findOne(['name'=> 'Tanda Registrasi'])->value;
        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
        $this->tanda_register = $daftar;
//==================================
    }
}
