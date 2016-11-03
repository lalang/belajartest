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
    public $kwn_penanggungjawab;
    public $propinsi_id_penanggung_jawab_show;
    public $wilayah_id_penanggung_jawab_show;
    public $kecamatan_id_penanggung_jawab_show;
    public $kelurahan_id_penanggung_jawab_show;
    public $kewarganegaraan_id_penanggung_jawab_show;
	public $kode_sub;
    /**
     * @inheritdoc
     */
    public function rules()
    {
//        return array_replace_recursive(parent::rules(),
		$status = Yii::$app->user->identity->status;
		if($status == 'Kantor Cabang'){
			$validasi_cabang = ['tipe', 'keputusan_cabang', 'tanggal_keputusan_cabang'];
		} else {
			$validasi_cabang = ['tipe'];
		}
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'propinsi_id_perusahaan', 'wilayah_id_perusahaan', 'kecamatan_id_perusahaan', 'kelurahan_id_perusahaan', 'propinsi_id_penanggung_jawab', 'wilayah_id_penanggung_jawab', 'kecamatan_id_penanggung_jawab', 'kelurahan_id_penanggung_jawab', 'kewarganegaraan_id_penanggung_jawab', 'wilayah_id_usaha', 'kecamatan_id_usaha', 'kelurahan_id_usaha', 'jumlah_karyawan', 'intensitas_jasa_perjalanan', 'kapasitas_penyedia_akomodasi', 'jum_kursi_jasa_manum', 'jum_stand_jasa_manum', 'jum_pack_jasa_manum'], 'integer'],
            [$validasi_cabang, 'required'],
            [['tipe', 'jenkel', 'alamat', 'alamat_perusahaan', 'identitas_sama', 'jenkel_penanggung_jawab', 'alamat_penanggung_jawab', 'alamat_usaha'], 'string'],
            [['tanggal_lahir', 'tanggal_pendirian', 'tanggal_pengesahan', 'tanggal_cabang', 'tanggal_keputusan_cabang', 'tanggal_lahir_penanggung_jawab', 'tanggal_tdup'], 'safe'],
            [['email_perusahaan', 'email'], 'email'],
            [['nik', 'rt', 'rw', 'rt_penanggung_jawab', 'rw_penanggung_jawab', 'kodepos', 'kodepos_perusahaan', 'telepon', 
              'telpon_perusahaan', 'fax_perusahaan', 'kodepos_penanggung_jawab', 'rt_usaha', 'rw_usaha', 'kodepos_usaha',
              'npwp_perusahaan','nik_penanggung_jawab','telepon_penanggung_jawab','telpon_usaha','fax_usaha'
             ], 'number'
            ],
            [['nik', 'rt', 'rw', 'rt_penanggung_jawab', 'rw_penanggung_jawab','kodepos', 'kodepos_perusahaan', 'telepon', 
              'telpon_perusahaan', 'fax_perusahaan', 'kodepos_penanggung_jawab', 'rt_usaha', 'rw_usaha', 'kodepos_usaha',
              'npwp_perusahaan','nik_penanggung_jawab','telepon_penanggung_jawab','telpon_usaha','fax_usaha'
             ], 'match', 'pattern' => '/^[0-9]+$/', 'message' => Yii::t('app', 'Hanya angka yang diperbolehkan')
            ],
                
            [['nik', 'passport', 'nik_penanggung_jawab', 'passport_penanggung_jawab'], 'string', 'max' => 16],
            [['nama', 'email', 'nama_perusahaan', 'nama_gedung_perusahaan', 'email_perusahaan', 'nama_penanggung_jawab', 'no_tdup', 'nama_gedung_usaha'], 'string', 'max' => 100],
            [['tempat_lahir', 'kitas', 'blok_perusahaan', 'nomor_akta_pendirian', 'nama_notaris_pendirian', 'nomor_sk_pengesahan', 'nomor_akta_cabang', 'nama_notaris_cabang', 'keputusan_cabang', 'tempat_lahir_penanggung_jawab', 'kitas_penanggung_jawab', 'titik_koordinat', 'latitude', 'longitude', 'blok_usaha', 'nomor_objek_pajak_usaha', 'npwpd'], 'string', 'max' => 50],
            [['rt', 'rw', 'kodepos', 'kodepos_perusahaan', 'rt_penanggung_jawab', 'rw_penanggung_jawab', 'kodepos_penanggung_jawab', 'rt_usaha', 'rw_usaha', 'kodepos_usaha'], 'string', 'max' => 5],
            [['telepon', 'telpon_perusahaan', 'fax_perusahaan', 'telepon_penanggung_jawab', 'telpon_usaha', 'fax_usaha'], 'string', 'max' => 15],
            [['npwp_perusahaan'], 'string', 'max' => 20],
            [['merk_nama_usaha'], 'string', 'max' => 150]
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
        $this->nama_kelurahan_owner = Lokasi::findOne(['id' => $this->kelurahan_id_penanggung_jawab])->nama;
        $this->nama_kecamatan_owner = Lokasi::findOne(['id' => $this->kecamatan_id_penanggung_jawab])->nama;
        $this->nama_kabkota_owner = Lokasi::findOne(['id' => $this->wilayah_id_penanggung_jawab])->nama;
        $this->nama_propinsi_owner = Lokasi::findOne(['id' => $this->propinsi_id_penanggung_jawab])->nama;
        $this->nama_kelurahan_usaha = Lokasi::findOne(['id' => $this->kelurahan_id_usaha])->nama;
        $this->nama_kecamatan_usaha = Lokasi::findOne(['id' => $this->kecamatan_id_usaha])->nama;
        $this->nama_kabkota_usaha = Lokasi::findOne(['id' => $this->wilayah_id_usaha])->nama;
		
		$kwn = Negara::findOne(['id' => $this->kewarganegaraan_id]);
        $this->nama_negara = $kwn->nama_negara;
        $kwn = $this->nama_negara;
        $this->kwn_penanggungjawab = Negara::findOne(['id' => $this->kewarganegaraan_id_penanggung_jawab]);
		
		$alamat_lengkap = $this->alamat.' RT/RW:'.$this->rt.'/'.$this->rw.' Kel.'.$this->nama_kelurahan.' Kec.'.$this->nama_kecamatan.' Kab.'.$this->nama_kabkota.', '.$this->nama_propinsi;
        $alamat_lengkap_p = $this->alamat_perusahaan.' Kel.'.$this->nama_kelurahan_pt.' Kec.'.$this->nama_kecamatan_pt.' Kab.'.$this->nama_kabkota_pt.', '.$this->nama_propinsi_pt;

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
        $preview_sk = str_replace('{p_propinsi}', strtoupper($this->nama_propinsi), $preview_sk);
        
        $preview_sk = str_replace('{nik}', strtoupper($this->nik), $preview_sk);
        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
        $preview_sk = str_replace('{kodepos}', $this->kodepos, $preview_sk);
		$preview_sk = str_replace('{nama_penanggung_jawab}', $this->nama_penanggung_jawab, $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_sk);
		$preview_sk = str_replace('{gedung_pt}', $this->nama_gedung_perusahaan, $preview_sk);
        $preview_sk = str_replace('{blok_pt}', $this->blok_perusahaan, $preview_sk);
		$preview_sk = str_replace('{alamat_pt}', $this->alamat_perusahaan, $preview_sk);
        $preview_sk = str_replace('{kelurahan_pt}', $this->nama_kelurahan_pt, $preview_sk);
        $preview_sk = str_replace('{kecamatan_pt}', $this->nama_kecamatan_pt, $preview_sk);
        $preview_sk = str_replace('{kabupaten_pt}', $this->nama_kabkota_pt, $preview_sk);
        $preview_sk = str_replace('{propinsi_pt}', strtoupper($this->nama_propinsi_pt), $preview_sk);
        $preview_sk = str_replace('{kodepos_pt}', $this->kodepos_perusahaan, $preview_sk);
		$preview_sk = str_replace('{merk}', $this->merk_nama_usaha, $preview_sk);
		$preview_sk = str_replace('{gedungusaha}', $this->nama_gedung_usaha, $preview_sk);
        $preview_sk = str_replace('{blokusaha}', $this->blok_usaha, $preview_sk);
        $preview_sk = str_replace('{alamatusaha}', $this->alamat_usaha, $preview_sk);
		
		$preview_sk = str_replace('{gedung_usaha}', $this->nama_gedung_usaha, $preview_sk);
        $preview_sk = str_replace('{blok_usaha}', $this->blok_usaha, $preview_sk);
        $preview_sk = str_replace('{alamat_usaha}', $this->alamat_usaha, $preview_sk);
        $preview_sk = str_replace('{rt_usaha}', $this->rt_usaha, $preview_sk);
        $preview_sk = str_replace('{rw_usaha}', $this->rw_usaha, $preview_sk);
        $preview_sk = str_replace('{kelurahan_usaha}', $this->nama_kelurahan_usaha, $preview_sk);
        $preview_sk = str_replace('{kecamatan_usaha}', $this->nama_kecamatan_usaha, $preview_sk);
        $preview_sk = str_replace('{kabupaten_usaha}', $this->nama_kabkota_usaha, $preview_sk);
        $preview_sk = str_replace('{kodepos_usaha}', $this->kodepos_usaha, $preview_sk);
        $preview_sk = str_replace('{propinsi_usaha}', strtoupper('DKI Jakarta'), $preview_sk);
		
        $preview_sk = str_replace('{alias}', $izin->alias, $preview_sk);
		if($izin->bidang_izin_id){
			$bidang = (new \yii\db\Query())->select('id, keterangan')->from('bidang_izin_usaha')->where('id =' . $izin->bidang_izin_id)->one();
		}
        $preview_sk = str_replace('{bidang}', $bidang['keterangan'], $preview_sk);
		if($izin->jenis_usaha_id){
			$jenis = (new \yii\db\Query())->select('id, keterangan')->from('jenis_usaha')->where('id =' . $izin->jenis_usaha_id)->one();
		}
        $preview_sk = str_replace('{jenis}', $jenis['keterangan'], $preview_sk);
		if($izin->sub_jenis_id){
			$subjenis = (new \yii\db\Query())->select('id, keterangan')->from('sub_jenis_usaha')->where('id =' . $izin->sub_jenis_id)->one();
		}
        $preview_sk = str_replace('{subjenis}', $subjenis['keterangan'], $preview_sk);
		
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
			$preview_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $preview_sk);
        }
        
        if($perizinan->relasi_id){
            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
            $preview_sk = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $preview_sk);
            $preview_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $preview_sk);
            $preview_sk = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $preview_sk);
        }

        $this->teks_preview = $preview_sk;
		
		//====================Validasi========
        $validasi = $izin->template_valid;

       $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
//        $validasi = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $validasi);
        $validasi = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $validasi);
       
        $validasi = str_replace('{no_sk}', $perizinan->no_izin, $validasi);
		$validasi = str_replace('{no_tdup}', $this->no_tdup, $validasi);
		$validasi = str_replace('{tgl_tdup}', Yii::$app->formatter->asDate($this->tanggal_tdup, 'php: d F Y') , $validasi);  
		$validasi = str_replace('{alias}', strtoupper($izin->alias), $validasi);
		$validasi = str_replace('{nik}', strtoupper($this->nik), $validasi);
		$validasi = str_replace('{nama}', strtoupper($this->nama), $validasi);
		$validasi = str_replace('{alamat}', strtoupper($this->alamat), $validasi);
		$validasi = str_replace('{rt}', $this->rt, $validasi);
		$validasi = str_replace('{rw}', $this->rw, $validasi);
		$validasi = str_replace('{p_kelurahan}', $this->nama_kelurahan, $validasi);
        $validasi = str_replace('{p_kecamatan}', $this->nama_kecamatan, $validasi);
        $validasi = str_replace('{p_kabupaten}', $this->nama_kabkota, $validasi);
        $validasi = str_replace('{p_propinsi}', strtoupper($this->nama_propinsi), $validasi);
		$validasi = str_replace('{nama_penanggung_jawab}', $this->nama_penanggung_jawab, $validasi);
		$validasi = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $validasi);
		$validasi = str_replace('{gedung_pt}', $this->nama_gedung_perusahaan, $validasi);
		$validasi = str_replace('{blok_pt}', $this->blok_perusahaan, $validasi);
		$validasi = str_replace('{alamat_pt}', strtoupper($this->alamat_perusahaan), $validasi);
		$validasi = str_replace('{kelurahan_pt}', $this->nama_kelurahan_pt, $validasi);
		$validasi = str_replace('{kecamatan_pt}', $this->nama_kecamatan_pt, $validasi);
		$validasi = str_replace('{kabupaten_pt}', $this->nama_kabkota_pt, $validasi);
		$validasi = str_replace('{propinsi_pt}', strtoupper($this->nama_propinsi_pt), $validasi);
		$validasi = str_replace('{kodepos_pt}', $this->kodepos_perusahaan, $validasi);
		$validasi = str_replace('{merk}', $this->merk_nama_usaha, $validasi);
		$validasi = str_replace('{gedung_usaha}', $this->nama_gedung_usaha, $validasi);
		$validasi = str_replace('{blok_usaha}', $this->blok_usaha, $validasi);
		$validasi = str_replace('{alamat_usaha}', strtoupper($this->alamat_usaha), $validasi);
		$validasi = str_replace('{rt_usaha}', $this->rt_usaha, $validasi);
		$validasi = str_replace('{rw_usaha}', $this->rw_usaha, $validasi);
		$validasi = str_replace('{kelurahan_usaha}', $this->nama_kelurahan_usaha, $validasi);
		$validasi = str_replace('{kecamatan_usaha}', $this->nama_kecamatan_usaha, $validasi);
		$validasi = str_replace('{kabupaten_usaha}', $this->nama_kabkota_usaha, $validasi);
		$validasi = str_replace('{kodepos_usaha}', $this->kodepos_usaha, $validasi);
		$validasi = str_replace('{propinsi_usaha}', strtoupper('DKI Jakarta'), $validasi);
        $validasi = str_replace('{tipe}', $this->tipe, $validasi);
		$bidang = (new \yii\db\Query())->select('id, keterangan')->from('bidang_izin_usaha')->where('id =' . $izin->bidang_izin_id)->one();
        $validasi = str_replace('{bidang}', $bidang['keterangan'], $validasi);
		$jenis = (new \yii\db\Query())->select('id, keterangan')->from('jenis_usaha')->where('id =' . $izin->jenis_usaha_id)->one();
        $validasi = str_replace('{jenis}', $jenis['keterangan'], $validasi);
		$subjenis = (new \yii\db\Query())->select('id, keterangan')->from('sub_jenis_usaha')->where('id =' . $izin->sub_jenis_id)->one();
        $validasi = str_replace('{subjenis}', $subjenis['keterangan'], $validasi);
		$validasi = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $validasi);
	
        $this->teks_validasi = $validasi;
		
		//      ====================preview data========
        $preview_data = $izin->preview_data;

        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);
        $preview_data = str_replace('{no_reg}', $perizinan->kode_registrasi, $preview_data);
        
        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
		$preview_data = str_replace('{alias}', $izin->alias, $preview_data);
		$preview_data = str_replace('{tipeizin}', $izin->tipe, $preview_data);
		$jenis = (new \yii\db\Query())->select('id, nama')->from('status')->where('id =' . $izin->status_id)->one();
        $preview_data = str_replace('{jnsizin}', $jenis['nama'], $preview_data);
		//        pemilik(pemohon)
        $preview_data = str_replace('{nik}', strtoupper($this->nik), $preview_data);
        $preview_data = str_replace('{tipe}', $this->tipe, $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
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
		
		//        Perusahaan tab2
        $preview_data = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $preview_data);
        $preview_data = str_replace('{alamat_pt}', $this->alamat_perusahaan, $preview_data);
        $preview_data = str_replace('{gedung_pt}', $this->nama_gedung_perusahaan, $preview_data);
        $preview_data = str_replace('{blok_pt}', $this->blok_perusahaan, $preview_data);
        $preview_data = str_replace('{kelurahan_pt}', $this->nama_kelurahan_pt, $preview_data);
        $preview_data = str_replace('{kecamatan_pt}', $this->nama_kecamatan_pt, $preview_data);
        $preview_data = str_replace('{kabupaten_pt}', $this->nama_kabkota_pt, $preview_data);
        $preview_data = str_replace('{propinsi_pt}', strtoupper($this->nama_propinsi_pt), $preview_data);
        $preview_data = str_replace('{kodepos_pt}', $this->kodepos_perusahaan, $preview_data);
        $preview_data = str_replace('{tlp_pt}', $this->telpon_perusahaan, $preview_data);
        $preview_data = str_replace('{fax_pt}', $this->fax_perusahaan, $preview_data);
        $preview_data = str_replace('{email_pt}', $this->email_perusahaan, $preview_data);
        $preview_data = str_replace('{nomor_akta_pendirian}', $this->nomor_akta_pendirian, $preview_data);
		
		//        tab3
        $preview_data = str_replace('{tanggal_pendirian}', Yii::$app->formatter->asDate($this->tanggal_pendirian, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{nama_notaris_pendirian}', $this->nama_notaris_pendirian, $preview_data);
        $preview_data = str_replace('{nomor_sk_pengesahan}', $this->nomor_sk_pengesahan, $preview_data);
        $preview_data = str_replace('{tanggal_pengesahan}', Yii::$app->formatter->asDate($this->tanggal_pengesahan, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{nomor_akta_cabang}', $this->nomor_akta_cabang, $preview_data);
        $preview_data = str_replace('{tanggal_cabang}', Yii::$app->formatter->asDate($this->tanggal_cabang, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{nama_notaris_cabang}', $this->nama_notaris_cabang, $preview_data);
        $preview_data = str_replace('{keputusan_cabang}', $this->keputusan_cabang, $preview_data);
        $preview_data = str_replace('{tanggal_keputusan_cabang}', Yii::$app->formatter->asDate($this->tanggal_keputusan_cabang, 'php: d F Y'), $preview_data);
		
		//              
        $preview_data = str_replace('{nik_penanggung_jawab}', $this->nik_penanggung_jawab, $preview_data);  
        $preview_data = str_replace('{nama_penanggung_jawab}', $this->nama_penanggung_jawab, $preview_data);  
        $preview_data = str_replace('{pathir_penanggung_jawab}', $this->tempat_lahir_penanggung_jawab, $preview_data);
        $preview_data = str_replace('{talhir_penanggung_jawab}', Yii::$app->formatter->asDate($this->tanggal_lahir_penanggung_jawab, 'php: d F Y'), $preview_data);
		$preview_data = str_replace('{jenkel_penanggung_jawab}', ($this->jenkel == 'L' ? 'Laki-laki' : 'Perempuan'), $preview_data);
        $preview_data = str_replace('{alamat_penanggung_jawab}', $this->alamat_penanggung_jawab, $preview_data);
        $preview_data = str_replace('{rt_penanggung_jawab}', $this->rt_penanggung_jawab, $preview_data);
        $preview_data = str_replace('{rw_penanggung_jawab}', $this->rw_penanggung_jawab, $preview_data);
        $preview_data = str_replace('{prop_penanggung_jawab}', $this->nama_propinsi_owner, $preview_data);
        $preview_data = str_replace('{kab_penanggung_jawab}', $this->nama_kabkota_owner, $preview_data);
        $preview_data = str_replace('{kec_penanggung_jawab}', $this->nama_kecamatan_owner, $preview_data);
		$preview_data = str_replace('{kel_penanggung_jawab}', $this->nama_kelurahan_owner, $preview_data);
        $preview_data = str_replace('{kdp_penanggung_jawab}', $this->kodepos_penanggung_jawab, $preview_data);
        $preview_data = str_replace('{tel_penanggung_jawab}', $this->telepon_penanggung_jawab, $preview_data);
		$kewarganegaraan = (new \yii\db\Query())->select('id, nama_negara')->from('negara')->where('id =' . $this->kewarganegaraan_id_penanggung_jawab)->one();
        $preview_data = str_replace('{wn_penanggung_jawab}', $kewarganegaraan['nama_negara'], $preview_data);
		$preview_data = str_replace('{kitas_penanggung_jawab}', $this->kitas_penanggung_jawab, $preview_data);
        $preview_data = str_replace('{passport_penanggung_jawab}', $this->passport_penanggung_jawab, $preview_data);
    
    //       
        $preview_data = str_replace('{no_tdup}', $this->no_tdup, $preview_data);
        $preview_data = str_replace('{tgl_tdup}',  Yii::$app->formatter->asDate($this->tanggal_tdup, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{merk}', $this->merk_nama_usaha, $preview_data);
        $preview_data = str_replace('{titik_koordinat}', $this->titik_koordinat, $preview_data);
        $preview_data = str_replace('{gedung_usaha}', $this->nama_gedung_usaha, $preview_data);
        $preview_data = str_replace('{blok_usaha}', $this->blok_usaha, $preview_data);
        $preview_data = str_replace('{alamat_usaha}', $this->alamat_usaha, $preview_data);
        $preview_data = str_replace('{rt_usaha}', $this->rt_usaha, $preview_data);
        $preview_data = str_replace('{rw_usaha}', $this->rw_usaha, $preview_data);
        $preview_data = str_replace('{kelurahan_usaha}', $this->nama_kelurahan_usaha, $preview_data);
        $preview_data = str_replace('{kecamatan_usaha}', $this->nama_kecamatan_usaha, $preview_data);
        $preview_data = str_replace('{kabupaten_usaha}', $this->nama_kabkota_usaha, $preview_data);
        $preview_data = str_replace('{propinsi_usaha}', strtoupper('DKI Jakarta'), $preview_data);
        $preview_data = str_replace('{kodepos_usaha}', $this->kodepos_usaha, $preview_data);
        $preview_data = str_replace('{tlp_usaha}', $this->telpon_usaha, $preview_data);
        $preview_data = str_replace('{fax_usaha}', $this->fax_usaha, $preview_data);
        $preview_data = str_replace('{nop}', $this->nomor_objek_pajak_usaha, $preview_data);
        $preview_data = str_replace('{jmlkaryawan}', $this->jumlah_karyawan, $preview_data);
        $preview_data = str_replace('{npwpd}', $this->npwpd, $preview_data);
        $preview_data = str_replace('{intensitas_jasa_perjalanan}', $this->intensitas_jasa_perjalanan, $preview_data);
        $preview_data = str_replace('{kapasitas_penyedia_akomodasi}', $this->kapasitas_penyedia_akomodasi, $preview_data);
        $preview_data = str_replace('{jmlkursi}', $this->jum_kursi_jasa_manum, $preview_data);
        $preview_data = str_replace('{jmlstand}', $this->jum_stand_jasa_manum, $preview_data);
        $preview_data = str_replace('{jmlpack}', $this->jum_pack_jasa_manum, $preview_data);
        $preview_data = str_replace('{latlong}', $this->titik_koordinat, $preview_data);
        $akta = \backend\models\IzinPariwisataAkta::findAll(['izin_pariwisata_id' => $this->id]);
        $noUrut = 1;
        foreach ($akta as $aktaEach) {
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
        $preview_data = str_replace('{aktaperubahan}', $aktainput, $preview_data);
		$klasifikasiManum = \backend\models\IzinPariwisataJenisManum::findAll(['izin_pariwisata_id' => $this->id]);
		$noKlasifikasiManum = 1;
		foreach ($klasifikasiManum as $aktaEach) {
			$kbli = \backend\models\JenisManum::findOne(['id' => $aktaEach->jenis_manum_id]);
            $inputKlasifikasiManum .='
            <table>
                <tr>
                    <td  width="30">' . $noKlasifikasiManum . '.</td>
                    <td  valign="top"  >
                        <p>' . $kbli->keterangan . '</p>
                    </td>
                </tr>
            </table>';
            $noKlasifikasiManum++;
        }
        $preview_data = str_replace('{klasifikasi_manum}', $inputKlasifikasiManum, $preview_data);
		$klasifikasiTransport = \backend\models\IzinPariwisataKapasitasTransport::findAll(['izin_pariwisata_id' => $this->id]);
		$noKlasifikasiTransport = 1;
		foreach ($klasifikasiTransport as $aktaEach) {
            $inputKlasifikasiTransport .='
            <table>
                <tr>
                    <td  width="30">' . $noKlasifikasiTransport . '.</td>
                    <td valign="top">
                        <p>Jumlah Kapasitas</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $aktaEach->jumlah_kapasitas . '</p>
                    </td>
                </tr>
				<tr>
                    <td  width="30"></td>
                    <td valign="top">
                        <p>Jumlah Unit</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $aktaEach->jumlah_unit . '</p>
                    </td>
                </tr>
            </table>';
            $noKlasifikasiTransport++;
        }
        $preview_data = str_replace('{klasifikasi_transport}', $inputKlasifikasiTransport, $preview_data);
        $preview_data = str_replace('{kapasitas}', $this->kapasitas_penyedia_akomodasi, $preview_data);
		$kapasitasTersedia = \backend\models\IzinPariwisataKapasitasAkomodasi::findAll(['izin_pariwisata_id' => $this->id]);
        $noKapasitasTersedia = 1;
		foreach ($kapasitasTersedia as $aktaEach) {
			$kbli = \backend\models\TipeKamar::findOne(['id' => $aktaEach->tipe_kamar_id]);
            $inputKapasitasTersedia .='
            <table>
                <tr>
                    <td  width="30">' . $noKapasitasTersedia . '.</td>
                    <td valign="top">
                        <p>Tipe Kamar</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $kbli->keterangan . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Jumlah Kapasitas(Orang/Kamar)</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $aktaEach->jumlah_kapasitas . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Jumlah Unit</p>
                    </td>
                    <td valign="top">:</td>
                    <td valign="top">
                        <p>' . $aktaEach->jumlah_unit . '</p>
                    </td>
                </tr>
            </table>';
            $noKapasitasTersedia++;
        }
        $preview_data = str_replace('{kapasitastersedia}', $inputKapasitasTersedia, $preview_data);
		$fasilitas = \backend\models\IzinPariwisataFasilitas::findAll(['izin_pariwisata_id' => $this->id]);
		$noFasilitas = 1;
		foreach ($fasilitas as $aktaEach) {
			$kbli = \backend\models\FasilitasKamar::findOne(['id' => $aktaEach->fasilitas_kamar_id]);
            $inputFasilitas .='
            <table>
                <tr>
                    <td  width="30">' . $noFasilitas . '.</td>
                    <td  valign="top"  >
                        <p>' . $kbli->keterangan . '</p>
                    </td>
                </tr>
            </table>';
            $noFasilitas++;
        }
        $preview_data = str_replace('{fasilitasmilik}', $inputFasilitas, $preview_data);
		$teknis = (new \yii\db\Query())->select('*')->from('izin_pariwisata_teknis')->where('izin_pariwisata_id =' . $this->id)->all();
		$no = 1;
        foreach ($teknis as $aktaEach) {
			$nama_izin = (new \yii\db\Query())->select('nama')->from('jenis_izin_pariwisata')->where('id =' . $aktaEach['jenis_izin_pariwisata_id'])->one();
            $input .='
            <table>
                <tr>
                    <td  width="30">' . $no . '.</td>
                    <td valign="top">
                        <p>Nama Izin</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $nama_izin['nama'] . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Nomor Izin</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $aktaEach['no_izin'] . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Tanggal Izin</p>
                    </td>
                    <td valign="top">:</td>
                    <td valign="top">
                        <p>' . Yii::$app->formatter->asDate($aktaEach['tanggal_izin'], 'php: d F Y') . '</p>
                    </td>
                </tr>
				<tr>
                    <td ></td>
                    <td valign="top">
                        <p>Tanggal Masa Berlaku</p>
                    </td>
                    <td valign="top">:</td>
                    <td valign="top">
                        <p>' . Yii::$app->formatter->asDate($aktaEach['tanggal_masa_berlaku'], 'php: d F Y') . '</p>
                    </td>
                </tr>
            </table>';
            $no++;
        }
        $preview_data = str_replace('{izinteknis}', $input, $preview_data);
		$kbliIzin = \backend\models\IzinPariwisataKbli::findAll(['izin_pariwisata_id' => $this->id]);
		$nokbli = 1;
        foreach ($kbliIzin as $aktaEach) {
			$kbli = \backend\models\Kbli::findOne(['id' => $aktaEach->kbli_id]);
            $inputKbli .='
            <table>
                <tr>
                    <td  width="30">' . $nokbli . '.</td>
                    <td valign="top">
                        <p>Kode KBLI</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $kbli->kode . '</p>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td valign="top">
                        <p>Nama KBLI</p>
                    </td>
                    <td  valign="top">:</td>
                    <td  valign="top"  >
                        <p>' . $kbli->nama . '</p>
                    </td>
                </tr>
            </table>';
            $nokbli++;
        }
		$tujuan_wisata = \backend\models\IzinPariwisataTujuanWisata::findAll(['izin_pariwisata_id' => $this->id]);
		$no_tujuan_wisata = 1;
		foreach ($tujuan_wisata as $aktaEach) {
			$kbli = \backend\models\TujuanWisata::findOne(['id' => $aktaEach->tujuan_wisata_id]);
            $output_tujuan_wisata .='
            <table>
                <tr>
                    <td  width="30">' . $no_tujuan_wisata . '.</td>
                    <td  valign="top"  >
                        <p>' . $kbli->keterangan . '</p>
                    </td>
                </tr>
            </table>';
            $no_tujuan_wisata++;
        }
		
		$preview_data = str_replace('{tujuanwisata}', $output_tujuan_wisata, $preview_data);
		$preview_data = str_replace('{intensitas}', $this->intensitas_jasa_perjalanan, $preview_data);
        $preview_data = str_replace('{kbli}', $inputKbli, $preview_data);
        $preview_data = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
        $preview_data = str_replace('{nama_izin}', $perizinan->izin->nama, $preview_data);

        $this->preview_data = $preview_data;
        //====================template_sk======== 
        $teks_sk = $izin->template_sk;
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
        $teks_sk = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $teks_sk);

        $teks_sk = str_replace('{alias}', strtoupper($izin->alias), $teks_sk);
		$teks_sk = str_replace('{nik}', strtoupper($this->nik), $teks_sk);
		$teks_sk = str_replace('{nama}', strtoupper($this->nama), $teks_sk);
		$teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
		$teks_sk = str_replace('{rt}', $this->rt, $teks_sk);
		$teks_sk = str_replace('{rw}', $this->rw, $teks_sk);
		$teks_sk = str_replace('{p_kelurahan}', $this->nama_kelurahan, $teks_sk);
        $teks_sk = str_replace('{p_kecamatan}', $this->nama_kecamatan, $teks_sk);
        $teks_sk = str_replace('{p_kabupaten}', $this->nama_kabkota, $teks_sk);
        $teks_sk = str_replace('{p_propinsi}', strtoupper($this->nama_propinsi), $teks_sk);
		$teks_sk = str_replace('{nama_penanggung_jawab}', $this->nama_penanggung_jawab, $teks_sk);
		$teks_sk = str_replace('{nama_perusahaan}', $this->nama_perusahaan, $teks_sk);
		$teks_sk = str_replace('{gedung_pt}', $this->nama_gedung_perusahaan, $teks_sk);
		$teks_sk = str_replace('{blok_pt}', $this->blok_perusahaan, $teks_sk);
		$teks_sk = str_replace('{alamat_pt}', strtoupper($this->alamat_perusahaan), $teks_sk);
		$teks_sk = str_replace('{kelurahan_pt}', $this->nama_kelurahan_pt, $teks_sk);
		$teks_sk = str_replace('{kecamatan_pt}', $this->nama_kecamatan_pt, $teks_sk);
		$teks_sk = str_replace('{kabupaten_pt}', $this->nama_kabkota_pt, $teks_sk);
		$teks_sk = str_replace('{propinsi_pt}', strtoupper($this->nama_propinsi_pt), $teks_sk);
		$teks_sk = str_replace('{kodepos_pt}', $this->kodepos_perusahaan, $teks_sk);
		$teks_sk = str_replace('{merk}', $this->merk_nama_usaha, $teks_sk);
		$teks_sk = str_replace('{gedung_usaha}', $this->nama_gedung_usaha, $teks_sk);
		$teks_sk = str_replace('{blok_usaha}', $this->blok_usaha, $teks_sk);
		$teks_sk = str_replace('{alamat_usaha}', strtoupper($this->alamat_usaha), $teks_sk);
		$teks_sk = str_replace('{rt_usaha}', $this->rt_usaha, $teks_sk);
		$teks_sk = str_replace('{rw_usaha}', $this->rw_usaha, $teks_sk);
		$teks_sk = str_replace('{kelurahan_usaha}', $this->nama_kelurahan_usaha, $teks_sk);
		$teks_sk = str_replace('{kecamatan_usaha}', $this->nama_kecamatan_usaha, $teks_sk);
		$teks_sk = str_replace('{kabupaten_usaha}', $this->nama_kabkota_usaha, $teks_sk);
		$teks_sk = str_replace('{kodepos_usaha}', $this->kodepos_usaha, $teks_sk);
		$teks_sk = str_replace('{propinsi_usaha}', strtoupper('DKI Jakarta'), $teks_sk);
        $teks_sk = str_replace('{tipe}', $this->tipe, $teks_sk);
		$bidang = (new \yii\db\Query())->select('id, keterangan')->from('bidang_izin_usaha')->where('id =' . $izin->bidang_izin_id)->one();
        $teks_sk = str_replace('{bidang}', $bidang['keterangan'], $teks_sk);
		$jenis = (new \yii\db\Query())->select('id, keterangan')->from('jenis_usaha')->where('id =' . $izin->jenis_usaha_id)->one();
        $teks_sk = str_replace('{jenis}', $jenis['keterangan'], $teks_sk);
		$subjenis = (new \yii\db\Query())->select('id, keterangan')->from('sub_jenis_usaha')->where('id =' . $izin->sub_jenis_id)->one();
        $teks_sk = str_replace('{subjenis}', $subjenis['keterangan'], $teks_sk);
		$teks_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $teks_sk);
	
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
		$sk_penolakan = $izin->template_penolakan;
		
        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        $kode = Lokasi::findOne(['id' => $perizinan->lokasi_izin_id]);
        $namaKabupaten = Lokasi::findOne(['propinsi' => $kode->propinsi, 'kabupaten_kota' => $kode->kabupaten_kota, 'kecamatan' => '00', 'kelurahan' => '0000'])->nama;
        $namaKecamatan = Lokasi::findOne(['propinsi' => $kode->propinsi, 'kabupaten_kota' => $kode->kabupaten_kota, 'kecamatan' => $kode->kecamatan, 'kelurahan' => '0000'])->nama;
          
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        
		$sk_penolakan = str_replace('{kabupaten}', $namaKabupaten, $sk_penolakan);
        $sk_penolakan = str_replace('{KECAMATAN}', $namaKecamatan, $sk_penolakan);
        $sk_penolakan = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_pos}', $kantorByReg->kodepos, $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{no_reg}', $perizinan->kode_registrasi, $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', $this->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{alamat}', strtoupper($this->alamat), $sk_penolakan);
        $sk_penolakan = str_replace('{rt}', $this->rt, $sk_penolakan);
        $sk_penolakan = str_replace('{rw}', $this->rw, $sk_penolakan);
        $sk_penolakan = str_replace('{p_kelurahan}', $this->nama_kelurahan, $sk_penolakan);
        $sk_penolakan = str_replace('{p_kecamatan}', $this->nama_kecamatan, $sk_penolakan);
        $sk_penolakan = str_replace('{p_kabupaten}', $this->nama_kabkota, $sk_penolakan);
        $sk_penolakan = str_replace('{p_propinsi}', $this->nama_propinsi, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_izin}', $perizinan->izin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{keterangan}', $alasan->keterangan, $sk_penolakan);

        if ($perizinan->plh_id == NULL) {
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
        
        if($perizinan->relasi_id){
            $perizinanParent = Perizinan::findOne($perizinan->relasi_id);
            $sk_penolakan = str_replace('{alias}', $perizinanParent->izin->alias, $sk_penolakan);
            $sk_penolakan = str_replace('{no_sk_lama}', $perizinanParent->no_izin, $sk_penolakan);
            $sk_penolakan = str_replace('{tgl_sk_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_izin, 'php: d F Y'), $sk_penolakan);
            $sk_penolakan = str_replace('{tgl_expired_lama}', Yii::$app->formatter->asDate($perizinanParent->tanggal_expired, 'php: d F Y'), $sk_penolakan);
        }
        
        $this->teks_penolakan = $sk_penolakan;

        //----------------surat pengurusan--------------------
        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perorangan'])->value;
			$pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
			$pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
            $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perusahaan'])->value;
			$pengurusan = str_replace('{nik}', $this->nik_penanggung_jawab, $pengurusan);
			$pengurusan = str_replace('{nama}', $this->nama_penanggung_jawab, $pengurusan);
        }
        $pengurusan = str_replace('{alamat}', strtoupper($alamat_lengkap), $pengurusan);
        
        //Perusahaan
        $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $pengurusan);
        $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($alamat_lengkap_p), $pengurusan);
        
        //Umum
        $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
        $pengurusan = str_replace('{izin}', $perizinan->izin->nama, $pengurusan);
        
        $this->surat_pengurusan = $pengurusan;

        //----------------surat Kuasa--------------------
        if (Yii::$app->user->identity->profile->tipe == 'Perorangan') {
            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perorangan'])->value;
			$kuasa = str_replace('{nik}', $this->nik, $kuasa);
			$kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
            $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perusahaan'])->value;
			$kuasa = str_replace('{nik}', $this->nik_penanggung_jawab, $kuasa);
			$kuasa = str_replace('{nama}', $this->nama_penanggung_jawab, $kuasa);
        }
        $kuasa = str_replace('{alamat}', strtoupper($alamat_lengkap), $kuasa);
        
        //Perusahaan
        $kuasa = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $kuasa);
        $kuasa = str_replace('{alamat_perusahaan}', strtoupper($alamat_lengkap_p), $kuasa);
        
        //Umum
        $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
		$kuasa = str_replace('{izin}', $perizinan->izin->nama, $kuasa);
        
        $this->surat_kuasa = $kuasa;

        //----------------daftar--------------------
        $daftar = \backend\models\Params::findOne(['name' => 'Tanda Registrasi'])->value;
        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
		if (Yii::$app->user->identity->profile->tipe == 'Perorangan') { 
			$daftar = str_replace('{npwp}', $this->nik, $daftar);
			$daftar = str_replace('{nama_ph}', $this->nama, $daftar);
        } elseif (Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
			$daftar = str_replace('{npwp}', $this->npwp_perusahaan, $daftar);
			$daftar = str_replace('{nama_ph}', $this->nama_perusahaan, $daftar);
        }
        if($model->lokasiPengambilan->kecamatan == '00' and $model->lokasiPengambilan->kelurahan == '0000'){
            $tempat='';
        }if($model->lokasiPengambilan->kecamatan <> '00' and $model->lokasiPengambilan->kelurahan == '0000'){
            $tempat='KECAMATAN';
        }if($model->lokasiPengambilan->kecamatan <> '00' and $model->lokasiPengambilan->kelurahan <> '0000'){
            $tempat='KELURAHAN';
        }
        $daftar = str_replace('{kantor_ptsp}', $tempat . '&nbsp;' . $perizinan->lokasiPengambilan->nama, $daftar);
        $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
        $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
        $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
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
