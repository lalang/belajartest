<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPm1 as BaseIzinPm1;

/**
 * This is the model class for table "izin_pm1".
 */
class IzinPm1 extends BaseIzinPm1
{
    public $teks_preview;
    public $preview_data;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $teks_sk;
    public $teks_penolakan;
    public $surat_pengurusan;
    public $surat_kuasa;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'user_id', 'status_id', 'nik', 'no_kk', 'nama', 'agama', 'tempat_lahir', 'tanggal_lahir', 'jenkel', 'alamat', 'kodepos', 'pekerjaan', 'telepon', 'kelurahan_id', 'no_surat_pengantar', 'tanggal_surat', 'instansi_tujuan'], 'required'],
            [['izin_id', 'user_id', 'status_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'lokasi_id', 'wilayah_id_orang_lain', 'kecamatan_id_orang_lain', 'kelurahan_id_orang_lain', 'wilayah_id_saksi1', 'kecamatan_id_saksi1', 'kelurahan_id_saksi1', 'wilayah_id_saksi2', 'kecamatan_id_saksi2', 'kelurahan_id_saksi2'], 'integer'],
            [['nik', 'telepon', 'nik_orang_lain', 'no_kk_orang_lain', 'nik_saksi1', 'no_kk_saksi1', 'nik_saksi2', 'no_kk_saksi2', 'kodepos', 'kodepos_orang_lain', 'kodepos_saksi1', 'kodepos_saksi2', 'telepon', 'telepon_orang_lain', 'telepon_saksi1', 'telepon_saksi2'], 'number'],
            [['nik', 'telepon', 'nik_orang_lain', 'no_kk_orang_lain', 'nik_saksi1', 'no_kk_saksi1', 'nik_saksi2', 'no_kk_saksi2', 'kodepos', 'kodepos_orang_lain', 'kodepos_saksi1', 'kodepos_saksi2', 'telepon', 'telepon_orang_lain', 'telepon_saksi1', 'telepon_saksi2'], 'match', 'pattern' => '/^[0-9]+$/', 'message' => Yii::t('app', 'Hanya angka yang diperbolehkan')],
            [['tanggal_lahir', 'tanggal_surat', 'tanggal_lahir_orang_lain', 'tanggal_lahir_saksi1', 'tanggal_lahir_saksi2'], 'safe'],
            [['jenkel', 'agama', 'alamat', 'tujuan', 'pilihan', 'keperluan_administrasi', 'jenkel_orang_lain', 'alamat_orang_lain', 'jenkel_saksi1', 'alamat_saksi1', 'jenkel_saksi2', 'alamat_saksi2'], 'string'],
            [['nik', 'no_kk', 'nik_orang_lain', 'no_kk_orang_lain', 'nik_saksi1', 'no_kk_saksi1', 'nik_saksi2', 'no_kk_saksi2'], 'string', 'max' => 16],
            [['nama', 'nama_orang_lain', 'nama_saksi1', 'nama_saksi2'], 'string', 'max' => 100],
            [['tempat_lahir', 'pekerjaan', 'agama', 'no_surat_pengantar', 'instansi_tujuan', 'tempat_lahir_orang_lain', 'pekerjaan_orang_lain', 'tempat_lahir_saksi1', 'pekerjaan_saksi1', 'tempat_lahir_saksi2', 'pekerjaan_saksi2'], 'string', 'max' => 50],
            [['kodepos', 'kodepos_orang_lain', 'kodepos_saksi1', 'kodepos_saksi2'], 'string', 'max' => 5, 'min' => 5],
            [['telepon', 'telepon_orang_lain', 'telepon_saksi1', 'telepon_saksi2'], 'string', 'max' => 15]
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
                $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
                $perizinan->save();
//                echo $this->id;
//                die();
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
        //====================preview_sk========
        $preview_sk = $izin->template_preview;       
        
        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);

        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{no_indentitas}', strtoupper($this->nik), $preview_sk);
        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
        $preview_sk = str_replace('{alamat}', strtoupper($this->alamat), $preview_sk);
        $preview_sk = str_replace('{pathir}', $this->tempat_lahir, $preview_sk);
        $preview_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $preview_sk);
        $preview_sk = str_replace('{agama}', $this->agama, $preview_sk);
        $preview_sk = str_replace('{pekerjaan}', $this->pekerjaan, $preview_sk);
        $preview_sk = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $preview_sk);
        $preview_sk = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{pada}', $this->instansi_tujuan, $preview_sk);
        $preview_sk = str_replace('{keperluan}', $this->keperluan_administrasi, $preview_sk);
        $preview_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $preview_sk);
        $preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);
        $preview_sk = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
        
        $preview_sk = str_replace('{administrasi}', $this->keperluan_administrasi, $preview_sk);
        $preview_sk = str_replace('{tujuan}', $this->tujuan, $preview_sk);
        if($this->pilihan == 1){
            $preview_sk = str_replace('{atas_nama}', $this->nama, $preview_sk);
        } else {
            $preview_sk = str_replace('{atas_nama}', $this->nama_orang_lain, $preview_sk);
        }   
        
        $preview_sk = str_replace('{kode_pos}', $this->kodepos, $preview_sk);
        
        $this->teks_preview = $preview_sk;
        
        
        //====================preview data========
        $preview_data = $izin->preview_data;
        
        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);

        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
        $preview_data = str_replace('{saksi1_nama}', strtoupper($this->nama_saksi1), $preview_data);
        $preview_data = str_replace('{saksi2_nama}', strtoupper($this->nama_saksi2), $preview_data);
        $preview_data = str_replace('{alamat}', strtoupper($this->alamat), $preview_data);
        $preview_data = str_replace('{pathir}', $this->tempat_lahir, $preview_data);
        $preview_data = str_replace('{talhir}', $this->tanggal_lahir, $preview_data);
        $preview_data = str_replace('{telp}', $this->telepon, $preview_data);
        $preview_data = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $preview_data);
        $preview_data = str_replace('{agama}', $this->agama, $preview_data);
        $preview_data = str_replace('{pekerjaan}', $this->pekerjaan, $preview_data);
        $preview_data = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $preview_data);
        $preview_data = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{pada}', $this->instansi_tujuan, $preview_data);
        $preview_data = str_replace('{keperluan}', $this->keperluan_administrasi, $preview_data);
        $preview_data = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_data);
        $preview_data = str_replace('{kelurahan}', $this->nama_kelurahan, $preview_data);
        $preview_data = str_replace('{kabupaten}', $this->nama_kabkota, $preview_data);
        $preview_data = str_replace('{kecamatan}', $this->nama_kecamatan, $preview_data);
        $preview_data = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        //$preview_data = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        //$preview_data = str_replace('{administrasi}', $this->keperluan_administrasi, $preview_data);
        //$preview_data = str_replace('{tujuan}', $this->tujuan, $preview_data);
        if($this->pilihan == 1){
            $preview_data = str_replace('{nama_lain}', $this->nama, $preview_data);
            $preview_data = str_replace('{no_nik_lain}', $this->nik, $preview_data);
            $preview_data = str_replace('{no_kk_lain}', $this->no_kk, $preview_data);
            $preview_data = str_replace('{alamat_lain}', $this->alamat, $preview_data);
            $preview_data = str_replace('{pekerjaan_lain}', $this->pekerjaan, $preview_data);
        } else {
            $preview_data = str_replace('{nama_lain}', $this->nama_orang_lain, $preview_data);
            $preview_data = str_replace('{no_nik_lain}', $this->nik_orang_lain, $preview_data);
            $preview_data = str_replace('{no_kk_lain}', $this->no_kk_orang_lain, $preview_data);
            $preview_data = str_replace('{alamat_lain}', $this->alamat_orang_lain, $preview_data);
            $preview_data = str_replace('{pekerjaan_lain}', $this->pekerjaan_orang_lain, $preview_data);
        }
        $preview_data = str_replace('{kode_pos}', $this->kodepos, $preview_data);
        
        $this->preview_data = $preview_data;
        
        //====================template_sk========
        $teks_sk = $izin->template_sk;
        
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);

        $teks_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $teks_sk);
        $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
        $teks_sk = str_replace('{nik}', strtoupper($this->nik), $teks_sk);
        $teks_sk = str_replace('{nama}', strtoupper($this->nama), $teks_sk);
        $teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
        $teks_sk = str_replace('{pathir}', $this->tempat_lahir, $teks_sk);
        $teks_sk = str_replace('{talhir}', $this->tanggal_lahir, $teks_sk);
        $teks_sk = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $teks_sk);
        $teks_sk = str_replace('{agama}', $this->agama, $teks_sk);
        $teks_sk = str_replace('{pekerjaan}', $this->pekerjaan, $teks_sk);
        $teks_sk = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $teks_sk);
        $teks_sk = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{pada}', $this->instansi_tujuan, $teks_sk);
        $teks_sk = str_replace('{keperluan}', $this->keperluan_administrasi, $teks_sk);
        $teks_sk = str_replace('{administrasi}', $this->keperluan_administrasi, $teks_sk);
        $teks_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
        $teks_sk = str_replace('{kode_pos}', $this->kodepos, $teks_sk);
        $teks_sk = str_replace('{tujuan}', $this->tujuan, $teks_sk);
        if($this->pilihan == 1){
            $teks_sk = str_replace('{nama_lain}', $this->nama, $teks_sk);
            $teks_sk = str_replace('{no_nik_lain}', $this->nik, $teks_sk);
            $teks_sk = str_replace('{no_kk_lain}', $this->no_kk, $teks_sk);
            $teks_sk = str_replace('{alamat_lain}', $this->alamat, $teks_sk);
            $teks_sk = str_replace('{pekerjaan_lain}', $this->pekerjaan, $teks_sk);
        } else {
            $teks_sk = str_replace('{nama_lain}', $this->nama_orang_lain, $teks_sk);
            $teks_sk = str_replace('{no_nik_lain}', $this->nik_orang_lain, $teks_sk);
            $teks_sk = str_replace('{no_kk_lain}', $this->no_kk_orang_lain, $teks_sk);
            $teks_sk = str_replace('{alamat_lain}', $this->alamat_orang_lain, $teks_sk);
            $teks_sk = str_replace('{pekerjaan_lain}', $this->pekerjaan_orang_lain, $teks_sk);
        }
        if($perizinan->plh_id == NULL){
            $teks_sk = str_replace('{plh}', "", $teks_sk);
        } else {
            $teks_sk = str_replace('{plh}', "PLH", $teks_sk);
        }
        $teks_sk = str_replace('{kelurahan}', $this->nama_kelurahan, $teks_sk);
        $teks_sk = str_replace('{kabupaten}', $this->nama_kabkota, $teks_sk);
        $teks_sk = str_replace('{kecamatan}', $this->nama_kecamatan, $teks_sk);
        $teks_sk = str_replace('{nama_kepala}', $user->profile->name, $teks_sk);
        $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
        $this->teks_sk = $teks_sk;
        //================================== Penolakan
        //Samuel
        $sk_penolakan = $izin->template_penolakan;
        
        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id'=>5]);
        
        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_pos}', $kantorByReg->kodepos, $sk_penolakan);
        //$sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate(date('d M Y'), 'php: d F Y'), $sk_penolakan);
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
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);
        
        if($perizinan->plh_id == NULL){
            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
        } else {
            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
        }
        
        $this->teks_penolakan = $sk_penolakan;
        //----------------surat pengurusan--------------------
         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan'])->value;
         $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
//         $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $pengurusan);
//         $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_perusahaan), $pengurusan);
         $pengurusan = str_replace('{jabatan}', strtoupper($this->pekerjaan), $pengurusan);
         $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
         
         //----------------surat Kuasa--------------------
         $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perorangan'])->value;
         $kuasa = str_replace('{nik}', $this->nik, $kuasa);
         $kuasa = str_replace('{alamat}', strtoupper($this->alamat), $kuasa);
         $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
         $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
         $this->surat_kuasa=$kuasa;
         //----------------surat pengurusan--------------------
         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perorangan'])->value;
         $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
         $pengurusan = str_replace('{alamat}', strtoupper($this->alamat), $pengurusan);
         $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
        
    }
	
}
