<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdp as BaseIzinTdp;

/**
 * This is the model class for table "izin_tdp".
 */
class IzinTdp extends BaseIzinTdp
{
    public $teks_preview;
    public $preview_data;
    public $nama_kelurahan;
    public $teks_sk;
    public $surat_pengurusan;
    public $surat_kuasa;
    public $url_back;
    public $usaha;
	public $perizinan_proses_id;		
	public $kode_registrasi;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bentuk_perusahaan', 'user_id', 'status_id', 'i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_2_pemilik_tgl_lahir', 'i_3_pemilik_alamat', 'i_3_pemilik_kelurahan', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'i_6_pemilik_kewarganegaraan', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_kelurahan', 'ii_2_perusahaan_kodepos', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_4_bank_utama_1', 'iii_4_jumlah_bank', 'iii_5_npwp', 'iii_6_status_perusahaan_id', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'vii_b_omset', 'vii_d_totalaset', 'vii_e_wni', 'vii_e_wna'], 'required'],
            [['bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'perpanjangan_ke', 'i_3_pemilik_propinsi', 'i_3_pemilik_kabupaten', 'i_3_pemilik_kecamatan', 'i_3_pemilik_kelurahan', 'i_6_pemilik_kewarganegaraan', 'ii_2_perusahaan_propinsi', 'ii_2_perusahaan_kabupaten', 'ii_2_perusahaan_kecamatan', 'ii_2_perusahaan_kelurahan', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_4_jumlah_bank', 'iii_6_status_perusahaan_id', 'iii_8_bentuk_kerjasama_pihak3', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham', 'vii_e_wni', 'vii_e_wna', 'vii_f_matarantai', 'vii_fa_satuan', 'vii_fb_satuan', 'viii_jenis_perusahaan', 'create_by', 'update_by'], 'integer'],
            [['i_2_pemilik_tgl_lahir', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'iv_a1_tanggal', 'iv_a2_tanggal', 'iv_a3_tanggal', 'iv_a4_tanggal', 'iv_a5_tanggal', 'iv_a6_tanggal', 'create_date', 'update_date',
                'vi_c_modal_1a', 'vi_c_modal_1b',  'vi_c_modal_1c',  'vi_c_modal_1d', 'vi_c_modal_2a', 'vi_c_modal_2b', 'vi_c_modal_2c', 'vi_c_modal_2d','vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal',], 'safe'],
            [['vi_c_modal_1a', 'vi_c_modal_1b',  'vi_c_modal_1c',  'vi_c_modal_1d', 'vi_c_modal_2a', 
              'vi_c_modal_2b', 'vi_c_modal_2c', 'vi_c_modal_2d'], 'double'],
            [['iii_2_status_prsh', 'vii_f_pengecer'], 'string'],
         //   [['vii_b_omset', 'vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal', 'vii_c6_aktif', 'vii_c7_pasif', 'vii_d_totalaset', 'vii_fa_jumlah', 'vii_fb_jumlah', 'vii_fc_lokal', 'vii_fc_impor'], 'number'],
            [['i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_3_pemilik_alamat', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_1_nama_kelompok', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_9a_merek_dagang_nama', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_nomor', 'iv_a2_notaris', 'iv_a3_nomor', 'iv_a4_nomor', 'iv_a5_nomor', 'iv_a6_nomor', 'vii_b_terbilang'], 'string', 'max' => 200],
            [['iii_5_npwp','no_pembukuan','no_sk_siup'], 'string', 'max' => 50],
			[['i_4_pemilik_telepon','ii_2_perusahaan_no_telp','ii_2_perusahaan_no_fax'],'string', 'max' => 15],
			[['ii_2_perusahaan_kodepos'],'string', 'max' => 8],
			[['i_5_pemilik_no_ktp','iii_9a_merek_dagang_nomor','iii_9b_hak_paten_nama','iii_9b_hak_paten_nomor','iii_9c_hak_cipta_nama','iii_9c_hak_cipta_nomor','iv_a1_nomor','v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham',], 'string', 'max' => 20],

        ];
    }
    
    public function beforeSave($insert) 
	{
        if (parent::beforeSave($insert)) 
		{
            if ($this->isNewRecord) {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;

                switch ($wewenang) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->ii_2_perusahaan_kabupaten;
                        break;
                    case 3:
                        $lokasi = $this->ii_2_perusahaan_kecamatan;
                        break;
                    case 4:
                        $lokasi = $this->ii_2_perusahaan_kelurahan;
                        break;
                    default:
                        $lokasi = 11;
                }

                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi, $this->user_id);

                $this->perizinan_id = $pid;
                    $session = Yii::$app->session;
                    $session->set('id_simul',$pid);
                $this->lokasi_id = $lokasi;
            } else {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
                switch ($wewenang) {
                        case 1:
                            $lokasi = 11;
                            break;
                        case 2:
                            $lokasi = $this->ii_2_perusahaan_kabupaten;
                            break;
                        case 3:
                            $lokasi = $this->ii_2_perusahaan_kecamatan;
                            break;
                        case 4:
                            $lokasi = $this->ii_2_perusahaan_kelurahan;
                            break;
                        default:
                            $lokasi = 11;
                }
                $this->lokasi_id = $lokasi;
                $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
                $perizinan->lokasi_izin_id = $lokasi;
                $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
                $perizinan->save();
            }
			
			$this->vii_b_omset = str_replace('.', '', $this->vii_b_omset);
			$this->vii_c1_dasar = str_replace('.', '', $this->vii_c1_dasar);
			$this->vii_c2_ditempatkan = str_replace('.', '', $this->vii_c2_ditempatkan);
			$this->vii_c3_disetor = str_replace('.', '', $this->vii_c3_disetor);

            return true;
        } else {
            return false;
        }
    }
    
    public function afterFind() {
        parent::afterFind();
        $izin = Izin::findOne($this->izin_id);
        $perizinan = Perizinan::findOne($this->perizinan_id);
        
		$status = Status::findOne($this->status_id);
	//	$user = User::findOne($perizinan->pengesah_id);	
	//	$profile = Profile::findOne($user->id);

   //     $lokasi = Lokasi::findOne($this->kelurahan_id);
    //    $this->nama_kelurahan = Lokasi::findOne(['id'=>$this->kelurahan_id])->nama;
            if($this->izin_id == 491 || $this->izin_id == 598 || $this->izin_id == 599){
                 $this->usaha='Perseroan Terbatas (PT)';
                }
            elseif ($this->izin_id == 604 || $this->izin_id == 605 || $this->izin_id == 606) {
                $this->usaha='Badan Usaha Lain (BUL)';  
            }
            elseif ($this->izin_id == 601 || $this->izin_id == 602 || $this->izin_id == 603) {
                $this->usaha='Koperasi (KOP)';  
            }
            elseif ($this->izin_id == 607 || $this->izin_id == 608 || $this->izin_id == 609) {
                $this->usaha='Badan Usaha Lain (CV)';  
            }
            elseif ($this->izin_id == 610 || $this->izin_id == 611 || $this->izin_id == 612) {
                $this->usaha='PERSEKUTUAN FORMA (FA)';  
            }
            elseif ($this->izin_id == 610 || $this->izin_id == 611 || $this->izin_id == 612) {
                $this->usaha='Perorangan (PO)';  
            }
            
           // die(print_r($this->izin_id));
		//====================preview_sk========
                
		$preview_sk = str_replace('{no_tdp}', $this->no_pembukuan, $izin->template_preview);
                $preview_sk = str_replace('{tipe_usaha}', $this->usaha, $preview_sk);
		$preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
		$preview_sk = str_replace('{tanggal}', $this->iii_7b_tgl_mulai_kegiatan, $preview_sk);
		$preview_sk = str_replace('{status_pendaftaran}', $status->nama, $preview_sk);
		$preview_sk = str_replace('{status_pembaharuan}', $this->perpanjangan_ke, $preview_sk);
		$preview_sk = str_replace('{nm_perusahaan}', $this->ii_1_perusahaan_nama, $preview_sk);
		$preview_sk = str_replace('{status_perusahaan}', $this->iii_2_status_prsh, $preview_sk);
		$preview_sk = str_replace('{alamat_perusahaan}', $this->ii_2_perusahaan_alamat, $preview_sk);
		$preview_sk = str_replace('{npwp}', $this->iii_5_npwp, $preview_sk);		
		$preview_sk = str_replace('{telephone}', $this->ii_2_perusahaan_no_telp, $preview_sk);
		$preview_sk = str_replace('{fax}', $this->ii_2_perusahaan_no_fax, $preview_sk);
		$preview_sk = str_replace('{kegiatan}', $this->perpanjangan_ke, $preview_sk);
		$preview_sk = str_replace('{kbli}', $this->perpanjangan_ke, $preview_sk);
	//	$preview_sk = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
		//$preview_sk = str_replace('{nm_kepala}', $this->perpanjangan_ke, $preview_sk);
		//$preview_sk = str_replace('{nip_kepala}', $this->perpanjangan_ke, $preview_sk);
		
		$this->teks_preview = $preview_sk;
		
		
		
//        $preview_sk = $izin->template_preview;       
//        
//        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);
//
//        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
//        $preview_sk = str_replace('{no_indentitas}', strtoupper($this->nik), $preview_sk);
//        $preview_sk = str_replace('{nama}', strtoupper($this->nama), $preview_sk);
//        $preview_sk = str_replace('{alamat}', strtoupper($this->alamat), $preview_sk);
//        $preview_sk = str_replace('{pathir}', $this->tempat_lahir, $preview_sk);
//        $preview_sk = str_replace('{talhir}', Yii::$app->formatter->asDate($this->tanggal_lahir, 'php: d F Y'), $preview_sk);
//        $preview_sk = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $preview_sk);
//        $preview_sk = str_replace('{agamal}', $this->agama, $preview_sk);
//        $preview_sk = str_replace('{pekerjaan}', $this->pekerjaan, $preview_sk);
//        $preview_sk = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $preview_sk);
//        $preview_sk = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $preview_sk);
//        $preview_sk = str_replace('{pada}', $this->instansi_tujuan, $preview_sk);
//        $preview_sk = str_replace('{keperluan}', $this->keperluan_administrasi, $preview_sk);
//        $preview_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $preview_sk);
//        $preview_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_sk);
//        $preview_sk = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);
//        
//        $preview_sk = str_replace('{administrasi}', $this->keperluan_administrasi, $preview_sk);
//        $preview_sk = str_replace('{tujuan}', $this->tujuan, $preview_sk);
//        if($this->pilihan == 1){
//            $preview_sk = str_replace('{atas_nama}', $this->nama, $preview_sk);
//        } else {
//            $preview_sk = str_replace('{atas_nama}', $this->nama_orang_lain, $preview_sk);
//        }   
//        
//        $preview_sk = str_replace('{kode_pos}', $this->kodepos, $preview_sk);
//        
//        $this->teks_preview = $preview_sk;
//        
//        
//        //====================preview data========
//        $preview_data = $izin->preview_data;
//        
//        $preview_data = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_data);
//
//        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
//        $preview_data = str_replace('{no_indentitas}', strtoupper($this->nik), $preview_data);
//        $preview_data = str_replace('{nama}', strtoupper($this->nama), $preview_data);
//        $preview_data = str_replace('{alamat}', strtoupper($this->alamat), $preview_data);
//        $preview_data = str_replace('{pathir}', $this->tempat_lahir, $preview_data);
//        $preview_data = str_replace('{talhir}', $this->tanggal_lahir, $preview_data);
//        $preview_data = str_replace('{telp}', $this->telepon, $preview_data);
//        $preview_data = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $preview_data);
//        $preview_data = str_replace('{agamal}', $this->agama, $preview_data);
//        $preview_data = str_replace('{pekerjaan}', $this->pekerjaan, $preview_data);
//        $preview_data = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $preview_data);
//        $preview_data = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $preview_data);
//        $preview_data = str_replace('{pada}', $this->instansi_tujuan, $preview_data);
//        $preview_data = str_replace('{keperluan}', $this->keperluan_administrasi, $preview_data);
//        $preview_data = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $preview_data);
//        $preview_data = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $preview_data);
//        $preview_data = str_replace('{kelurahan}', $this->nama_kelurahan, $preview_data);
//        $preview_data = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
//        $preview_data = str_replace('{tgl_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
//        $preview_data = str_replace('{administrasi}', $this->keperluan_administrasi, $preview_data);
//        $preview_data = str_replace('{tujuan}', $this->tujuan, $preview_data);
//        if($this->pilihan == 1){
//            $preview_data = str_replace('{nama_lain}', $this->nama, $preview_data);
//            $preview_data = str_replace('{no_nik_lain}', $this->nik, $preview_data);
//            $preview_data = str_replace('{no_kk_lain}', $this->no_kk, $preview_data);
//            $preview_data = str_replace('{alamat_lain}', $this->alamat, $preview_data);
//            $preview_data = str_replace('{pekerjaan_lain}', $this->pekerjaan, $preview_data);
//        } else {
//            $preview_data = str_replace('{nama_lain}', $this->nama_orang_lain, $preview_data);
//            $preview_data = str_replace('{no_nik_lain}', $this->nik_orang_lain, $preview_data);
//            $preview_data = str_replace('{no_kk_lain}', $this->no_kk_orang_lain, $preview_data);
//            $preview_data = str_replace('{alamat_lain}', $this->alamat_orang_lain, $preview_data);
//            $preview_data = str_replace('{pekerjaan_lain}', $this->pekerjaan_orang_lain, $preview_data);
//        }
//        $preview_data = str_replace('{kode_pos}', $this->kodepos, $preview_data);
//        
//        $this->preview_data = $preview_data;
//        
//        //====================template_sk========
//        $teks_sk = $izin->template_sk;
//        
//        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
//
//        $teks_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $teks_sk);
//        $teks_sk = str_replace('{no_indentitas}', strtoupper($this->nik), $teks_sk);
//        $teks_sk = str_replace('{nama}', strtoupper($this->nama), $teks_sk);
//        $teks_sk = str_replace('{alamat}', strtoupper($this->alamat), $teks_sk);
//        $teks_sk = str_replace('{pathir}', $this->tempat_lahir, $teks_sk);
//        $teks_sk = str_replace('{talhir}', $this->tanggal_lahir, $teks_sk);
//        $teks_sk = str_replace('{jenkel}', ($this->jenkel == 'L'? 'Laki-laki' : 'Perempuan'), $teks_sk);
//        $teks_sk = str_replace('{agamal}', $this->agama, $teks_sk);
//        $teks_sk = str_replace('{pekerjaan}', $this->pekerjaan, $teks_sk);
//        $teks_sk = str_replace('{no_sp_rtrw}', $this->no_surat_pengantar, $teks_sk);
//        $teks_sk = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{pada}', $this->instansi_tujuan, $teks_sk);
//        $teks_sk = str_replace('{keperluan}', $this->keperluan_administrasi, $teks_sk);
//        $teks_sk = str_replace('{administrasi}', $this->keperluan_administrasi, $teks_sk);
//        $teks_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
//        $teks_sk = str_replace('{kode_pos}', $this->kodepos, $teks_sk);
//        $teks_sk = str_replace('{tujuan}', $this->tujuan, $teks_sk);
//        if($this->pilihan == 1){
//            $teks_sk = str_replace('{nama_lain}', $this->nama, $teks_sk);
//            $teks_sk = str_replace('{no_nik_lain}', $this->nik, $teks_sk);
//            $teks_sk = str_replace('{no_kk_lain}', $this->no_kk, $teks_sk);
//            $teks_sk = str_replace('{alamat_lain}', $this->alamat, $teks_sk);
//            $teks_sk = str_replace('{pekerjaan_lain}', $this->pekerjaan, $teks_sk);
//        } else {
//            $teks_sk = str_replace('{nama_lain}', $this->nama_orang_lain, $teks_sk);
//            $teks_sk = str_replace('{no_nik_lain}', $this->nik_orang_lain, $teks_sk);
//            $teks_sk = str_replace('{no_kk_lain}', $this->no_kk_orang_lain, $teks_sk);
//            $teks_sk = str_replace('{alamat_lain}', $this->alamat_orang_lain, $teks_sk);
//            $teks_sk = str_replace('{pekerjaan_lain}', $this->pekerjaan_orang_lain, $teks_sk);
//        }
//        
//        $this->teks_sk = $teks_sk;
//        
//        //----------------surat pengurusan--------------------
//         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan'])->value;
//         $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
////         $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->nama_perusahaan), $pengurusan);
////         $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($this->alamat_perusahaan), $pengurusan);
//         $pengurusan = str_replace('{jabatan}', strtoupper($this->pekerjaan), $pengurusan);
//         $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
//         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
//         $this->surat_pengurusan=$pengurusan;
//         
//         //----------------surat Kuasa--------------------
//         $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perorangan'])->value;
//         $kuasa = str_replace('{nik}', $this->nik, $kuasa);
//         $kuasa = str_replace('{alamat}', strtoupper($this->alamat), $kuasa);
//         $kuasa = str_replace('{nama}', strtoupper($this->nama), $kuasa);
//         $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
//         $this->surat_kuasa=$kuasa;
//         //----------------surat pengurusan--------------------
//         $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perorangan'])->value;
//         $pengurusan = str_replace('{nik}', $this->nik, $pengurusan);
//         $pengurusan = str_replace('{alamat}', strtoupper($this->alamat), $pengurusan);
//         $pengurusan = str_replace('{nama}', strtoupper($this->nama), $pengurusan);
//         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
//         $this->surat_pengurusan=$pengurusan;
        
    }
	
}
