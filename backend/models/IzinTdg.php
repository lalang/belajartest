<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdg as BaseIzinTdg;

/**
 * This is the model class for table "izin_tdg".
 */
class IzinTdg extends BaseIzinTdg
{
    
    /**
     * @inheritdoc
     */
	public $preview_data;
	public $teks_preview;
	public $perizinan_proses_id;		
	public $file;
	public $kode_registrasi;
	public $url_back;
	public $teks_sk;
	public $surat_pengurusan;
    public $surat_kuasa;
	public $tanda_register;
	
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'status_id', 'create_by', 'create_date'], 'required'],
            [['perizinan_id', 'izin_id', 'status_id', 'gudang_sarana_forklif', 'gudang_sarana_komputer', 'hs_sarana_forklif', 'hs_sarana_komputer', 'create_by', 'update_by'], 'integer'],
            [['tipe', 'pemilik_alamat', 'gudang_namagedung','gudang_rt', 'gudang_rw','perusahaan_namajalan', 'gudang_namajalan', 'hs_rt','hs_rw','gudang_kapasitas_satuan', 'gudang_kelengkapan', 'gudang_sarana_air', 'gudang_kepemilikan', 'gudang_isi', 'hs_namajalan', 'hs_kapasitas_satuan', 'hs_kelengkapan', 'hs_sarana_air', 'hs_kepemilikan', 'hs_isi', 'catatan_tambahan',
			'hs_per_namagedung','hs_per_blok_lantai','hs_per_namajalan','hs_per_propinsi','hs_per_kabupaten','hs_per_kecamatan','hs_per_kelurahan','hs_per_kodepos'], 'string'],
            [['gudang_luas', 'gudang_kapasitas', 'gudang_nilai', 'gudang_komposisi_nasional', 'gudang_komposisi_asing', 'gudang_sarana_listrik', 'gudang_sarana_pendingin', 'hs_luas', 'hs_kapasitas', 'hs_nilai', 'hs_komposisi_nasional', 'hs_komposisi_asing', 'hs_sarana_listrik', 'hs_sarana_pendingin'], 'number'],
            [['gudang_imb_tanggal', 'gudang_uug_tanggal', 'gudang_uug_berlaku', 'hs_imb_tanggal', 'hs_uug_tanggal', 'create_date', 'update_date'], 'safe'],
            [['pemilik_nik','pemilik_kitas','pemilik_paspor', 'pemilik_rt', 'pemilik_rw', 'pemilik_propinsi', 'pemilik_kabupaten', 'pemilik_kecamatan', 'pemilik_kelurahan', 'pemilik_kodepos', 'pemilik_telepon', 'pemilik_fax', 'perusahaan_npwp', 'perusahaan_blok_lantai', 'perusahaan_propinsi', 'perusahaan_kabupaten', 'perusahaan_kecamatan', 'perusahaan_kelurahan', 'perusahaan_kodepos', 'perusahaan_telepon', 'perusahaan_fax', 'gudang_koordinat_1', 'gudang_koordinat_2','gudang_blok_lantai', 'gudang_propinsi', 'gudang_kabupaten', 'gudang_kecamatan', 'gudang_kelurahan', 'gudang_kodepos', 'gudang_telepon', 'gudang_fax', 'hs_koordinat_1', 'hs_koordinat_2', 'hs_blok_lantai', 'hs_propinsi', 'hs_kabupaten', 'hs_kecamatan', 'hs_kelurahan', 'hs_kodepos', 'hs_telepon', 'hs_fax'], 'string', 'max' => 50],
            [['pemilik_nama', 'pemilik_email', 'perusahaan_nama', 'perusahaan_namagedung', 'perusahaan_email', 'gudang_email', 'gudang_imb_nomor', 'gudang_uug_nomor', 'hs_namagedung', 'hs_email', 'hs_imb_nomor', 'hs_uug_nomor'], 'string', 'max' => 100],
            [['bapl_file'], 'string', 'max' => 200],
			[['kode_registrasi'],'string'],
			[['file'],'file'],
        ];
    }
	
	public function beforeSave($insert) 
	{	
        if (parent::beforeSave($insert)) {
		
            if ($this->isNewRecord) {
				$lokasi = $this->gudang_kabupaten;				
                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi);
                $this->perizinan_id = $pid;
            } else {
                $lokasi = $this->gudang_kabupaten;
				$perizinan = Perizinan::findOne(['referrer_id' => $this->id]);
				$perizinan->lokasi_izin_id = $lokasi;
				$perizinan->tanggal_mohon = date("Y-m-d H:i:s");
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
		
		//lokasi izin
        if ($perizinan->lokasiIzin->kecamatan == '00' and $perizinan->lokasiIzin->kelurahan == '0000') {
            $tempat_izin = '';
        }if ($perizinan->lokasiIzin->kecamatan <> '00' and $perizinan->lokasiIzin->kelurahan == '0000') {
            $tempat_izin = 'KECAMATAN';
        }if ($perizinan->lokasiIzin->kecamatan <> '00' and $perizinan->lokasiIzin->kelurahan <> '0000') {
            $tempat_izin = 'KELURAHAN';
        }
		
		//====================preview_sk========
		$preview_sk = str_replace('{pemilik_nm}', $this->pemilik_nama, $izin->template_preview);
		$preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
		$preview_sk = str_replace('{pemilik_ktp_paspor_kitas}', '('.$this->pemilik_paspor.')'. $this->pemilik_nik, $preview_sk);
		$preview_sk = str_replace('{pemilik_alamat}', $this->pemilik_alamat, $preview_sk);
		$preview_sk = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon.', '.$this->pemilik_fax.', '.$this->pemilik_email, $preview_sk);
		$preview_sk = str_replace('{alamat_gudang}', $this->gudang_blok_lantai.', '.$this->gudang_namajalan, $preview_sk);
		$preview_sk = str_replace('{titik_koordinat}', $this->gudang_koordinat_1, $preview_sk);		
		$preview_sk = str_replace('{telepon_fax_email}', $this->gudang_telepon.', '.$this->gudang_fax.', '.$this->gudang_email, $preview_sk);	
		$preview_sk = str_replace('{luas}', $this->gudang_luas, $preview_sk);
		$preview_sk = str_replace('{luas_huruf}', 'lalang', $preview_sk);
		$preview_sk = str_replace('{kapasitas}', $this->gudang_kapasitas, $preview_sk);
		$preview_sk = str_replace('{satuan_kapasitas}', $this->gudang_kapasitas_satuan, $preview_sk);		
		$preview_sk = str_replace('{kapasitas_huruf}', '', $preview_sk);
		$preview_sk = str_replace('{golongan}', $this->gudang_kelengkapan, $preview_sk);
		
		$this->teks_preview = $preview_sk;
		
		//====================preview data========
		$preview_data = str_replace('{pemilik_nm}', $this->pemilik_nama, $izin->preview_data);
		$preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
		$preview_data = str_replace('{pemilik_ktp_paspor_kitas}', '('.$this->pemilik_paspor.')'. $this->pemilik_nik, $preview_data);
		$preview_data = str_replace('{pemilik_alamat}', $this->pemilik_alamat, $preview_data);
		$preview_data = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon.', '.$this->pemilik_fax.', '.$this->pemilik_email, $preview_data);
		$preview_data = str_replace('{alamat_gudang}', $this->gudang_blok_lantai.', '.$this->gudang_namajalan, $preview_data);
		$preview_data = str_replace('{titik_koordinat}', $this->gudang_koordinat_1, $preview_data);		
		$preview_data = str_replace('{telepon_fax_email}', $this->gudang_telepon.', '.$this->gudang_fax.', '.$this->gudang_email, $preview_data);	
		$preview_data = str_replace('{luas}', $this->gudang_luas, $preview_data);
		$preview_data = str_replace('{luas_huruf}', 'lalang', $preview_data);
		$preview_data = str_replace('{kapasitas}', $this->gudang_kapasitas, $preview_data);
		$preview_data = str_replace('{satuan_kapasitas}', $this->gudang_kapasitas_satuan, $preview_data);		
		$preview_data = str_replace('{kapasitas_huruf}', '', $preview_data);
		$preview_data = str_replace('{golongan}', $this->gudang_kelengkapan, $preview_data);
		
		$this->preview_data = $preview_data;
		
		//====================template_sk========
        $teks_sk = $izin->template_sk;
		$koordinat = $this->DECtoDMS($this->hs_koordinat_1,$this->hs_koordinat_2); 
		$teks_sk = str_replace('{pemilik_nm}', $this->pemilik_nama, $izin->template_preview);
		$teks_sk = str_replace('{no_izin}', $perizinan->no_izin, $teks_sk);
		$teks_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $teks_sk);
		$teks_sk = str_replace('{pemilik_ktp_paspor_kitas}', '('.$this->pemilik_paspor.')'. $this->pemilik_nik, $teks_sk);
		$teks_sk = str_replace('{pemilik_alamat}', $this->pemilik_alamat, $teks_sk);
		$teks_sk = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon.', '.$this->pemilik_fax.', '.$this->pemilik_email, $teks_sk);
		$teks_sk = str_replace('{alamat_gudang}', $this->hs_blok_lantai.', '.$this->hs_namajalan, $teks_sk);
		$teks_sk = str_replace('{titik_koordinat}', $koordinat, $teks_sk);		
		$teks_sk = str_replace('{telepon_fax_email}', $this->hs_telepon.', '.$this->hs_fax.', '.$this->hs_email, $teks_sk);	
		$teks_sk = str_replace('{luas}', $this->hs_luas, $teks_sk);
		//$teks_sk = str_replace('{luas_huruf}', 'lalang', $teks_sk);
		$teks_sk = str_replace('{kapasitas}', $this->hs_kapasitas, $teks_sk);
		$teks_sk = str_replace('{satuan_kapasitas}', $this->hs_kapasitas_satuan, $teks_sk);		
		$teks_sk = str_replace('{kapasitas_huruf}', '', $teks_sk);
		$teks_sk = str_replace('{golongan}', $this->hs_kelengkapan, $teks_sk);
       
        
        $this->teks_sk = $teks_sk;
		
		//----------------surat pengurusan--------------------
         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan'])->value;
         $pengurusan = str_replace('{nik}', $this->pemilik_nik, $pengurusan);
//         $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $pengurusan);
//         $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_perusahaan), $pengurusan);
         $pengurusan = str_replace('{jabatan}', strtoupper('Tidak ada'), $pengurusan);
         $pengurusan = str_replace('{nama}', strtoupper($this->pemilik_nama), $pengurusan);
         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
         
         //----------------surat Kuasa--------------------
         $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perorangan'])->value;
         $kuasa = str_replace('{nik}', $this->pemilik_nik, $kuasa);
         $kuasa = str_replace('{alamat}', strtoupper($this->pemilik_alamat), $kuasa);
         $kuasa = str_replace('{nama}', strtoupper($this->pemilik_nama), $kuasa);
         $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
         $this->surat_kuasa=$kuasa;
         //----------------surat pengurusan--------------------
         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perorangan'])->value;
         $pengurusan = str_replace('{nik}', $this->pemilik_nik, $pengurusan);
         $pengurusan = str_replace('{alamat}', strtoupper($this->pemilik_alamat), $pengurusan);
         $pengurusan = str_replace('{nama}', strtoupper($this->pemilik_nama), $pengurusan);
         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
		 
		 //----------------daftar--------------------
         $daftar= \backend\models\Params::findOne(['name'=> 'Tanda Registrasi'])->value;
         $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
         $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
         $daftar = str_replace('{npwp}', $this->perusahaan_npwp, $daftar);
         $daftar = str_replace('{nama_ph}', $this->perusahaan_nama, $daftar);
        $daftar = str_replace('{kantor_ptsp}', $tempat_ambil.'&nbsp;'.$perizinan->lokasiPengambilan->nama, $daftar);
         $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
         $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
         $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
        $this->tanda_register = $daftar;
	}
	
	function DECtoDMS($latitude, $longitude)
	{
		$latitudeDirection = $latitude < 0 ? 'S': 'N';
		$longitudeDirection = $longitude < 0 ? 'W': 'E';

		$latitudeNotation = $latitude < 0 ? '-': '';
		$longitudeNotation = $longitude < 0 ? '-': '';

		$latitudeInDegrees = floor(abs($latitude));
		$longitudeInDegrees = floor(abs($longitude));

		$latitudeDecimal = abs($latitude)-$latitudeInDegrees;
		$longitudeDecimal = abs($longitude)-$longitudeInDegrees;

		$_precision = 3;
		$latitudeMinutes = round($latitudeDecimal*60,$_precision);
		$longitudeMinutes = round($longitudeDecimal*60,$_precision);

		return sprintf('%s%s&deg; %s %s %s%s&deg; %s %s',
			$latitudeNotation,
			$latitudeInDegrees,
			$latitudeMinutes,
			$latitudeDirection,
			$longitudeNotation,
			$longitudeInDegrees,
			$longitudeMinutes,
			$longitudeDirection
		);

	}

}