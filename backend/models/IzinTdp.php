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
    public $tipe;
    public $perizinan_proses_id;		
    public $kode_registrasi;
    public $izin_siup_id;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bentuk_perusahaan', 'user_id', 'status_id', 'i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_2_pemilik_tgl_lahir', 'i_3_pemilik_alamat', 'i_3_pemilik_kelurahan', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'i_6_pemilik_kewarganegaraan', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_kelurahan', 'ii_2_perusahaan_kodepos', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_4_bank_utama_1', 'iii_4_jumlah_bank', 'iii_5_npwp', 'iii_6_status_perusahaan_id', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'vii_b_omset', 'vii_d_totalaset', 'vii_e_wni', 'vii_e_wna'], 'required'],
            [['bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'perpanjangan_ke', 'i_3_pemilik_propinsi', 'i_3_pemilik_kabupaten', 'i_3_pemilik_kecamatan', 'i_3_pemilik_kelurahan', 'i_6_pemilik_kewarganegaraan', 'ii_2_perusahaan_propinsi', 'ii_2_perusahaan_kabupaten', 'ii_2_perusahaan_kecamatan', 'ii_2_perusahaan_kelurahan', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_4_jumlah_bank', 'iii_6_status_perusahaan_id', 'iii_8_bentuk_kerjasama_pihak3', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham', 'vi_a_kegiatan_utama', 'vii_e_wni', 'vii_e_wna', 'vii_f_matarantai', 'vii_fa_satuan', 'vii_fb_satuan', 'viii_jenis_perusahaan', 'create_by', 'update_by'], 'integer'],
            [['i_2_pemilik_tgl_lahir', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'iv_a1_tanggal', 'iv_a2_tanggal', 'iv_a3_tanggal', 'iv_a4_tanggal', 'iv_a5_tanggal', 'iv_a6_tanggal', 'create_date', 'update_date',
                'vi_c_modal_1a', 'vi_c_modal_1b',  'vi_c_modal_1c',  'vi_c_modal_1d', 'vi_c_modal_2a', 'vi_c_modal_2b', 'vi_c_modal_2c', 'vi_c_modal_2d','vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal',], 'safe'],
            [['vi_c_modal_1a', 'vi_c_modal_1b',  'vi_c_modal_1c',  'vi_c_modal_1d', 'vi_c_modal_2a', 
              'vi_c_modal_2b', 'vi_c_modal_2c', 'vi_c_modal_2d'], 'double'],
            [['iii_2_status_prsh', 'vii_f_pengecer'], 'string'],
         //   [['vii_b_omset', 'vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal', 'vii_c6_aktif', 'vii_c7_pasif', 'vii_d_totalaset', 'vii_fa_jumlah', 'vii_fb_jumlah', 'vii_fc_lokal', 'vii_fc_impor'], 'number'],
            [['i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_3_pemilik_alamat', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_1_nama_kelompok', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_9a_merek_dagang_nama', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_nomor', 'iv_a2_notaris', 'iv_a3_nomor', 'iv_a4_nomor', 'iv_a5_nomor', 'iv_a6_nomor', 'vii_b_terbilang', 'vi_a_produk_utama'], 'string', 'max' => 200],
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
        $kblis = IzinTdpKegiatan::findAll(['izin_tdp_id' => $this->id]); // $this->izinSiupKblis;
        $kode_kbli = '';
        $list_kbli = '<ul>';
        foreach ($kblis as $kbli) {
             $kd = \backend\models\Kbli::findOne(['kode' => $kbli->kbli->kode])->parent_id;
             if($kd == ''){
                 $kode=$kbli->kbli->kode;
                 $rincian = $kbli->kbli->nama;
             } else{
                 $qry = \backend\models\Kbli::findOne(['id' => $kd]);
             $kode = $qry->kode;
             $rincian = $qry->nama;
             }
            $kode_kbli = $kode;
            $list_kbli= $rincian;
        }
		$status = Status::findOne($this->status_id);
	//	$user = User::findOne($perizinan->pengesah_id);	
	//	$profile = Profile::findOne($user->id);

   //     $lokasi = Lokasi::findOne($this->kelurahan_id);
    //    $this->nama_kelurahan = Lokasi::findOne(['id'=>$this->kelurahan_id])->nama;
            if($this->izin_id == 491 || $this->izin_id == 598 || $this->izin_id == 599){
                 $this->usaha='Perseroan Terbatas (PT)';
                 $this->tipe='PERUSAHAAN';
                }
            elseif ($this->izin_id == 604 || $this->izin_id == 605 || $this->izin_id == 606) {
                $this->usaha='Badan Usaha Lain (BUL)';
                $this->tipe='PERUSAHAAN';
            }
            elseif ($this->izin_id == 601 || $this->izin_id == 602 || $this->izin_id == 603) {
                $this->usaha='Koperasi (KOP)'; 
                $this->tipe='KOPERASI';
            }
            elseif ($this->izin_id == 607 || $this->izin_id == 608 || $this->izin_id == 609) {
                $this->usaha='Komanditer (CV)';
                $this->tipe='PERUSAHAAN';
            }
            elseif ($this->izin_id == 610 || $this->izin_id == 611 || $this->izin_id == 612) {
                $this->usaha='PERSEKUTUAN FORMA (FA)';
                $this->tipe='PERUSAHAAN';
            }
            elseif ($this->izin_id == 610 || $this->izin_id == 611 || $this->izin_id == 612) {
                $this->usaha='Perorangan (PO)';
                $this->tipe='PERUSAHAAN';
            }
            
           // die(print_r($this->izin_id));
		//====================preview_sk========
                
		$preview_sk = str_replace('{no_tdp}', $this->no_pembukuan, $izin->template_preview);
//                $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $preview_sk);
//                if ($perizinan->no_izin !== null) {
//            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
//            $preview_sk = str_replace('{no_izin}', $perizinan->no_izin, $preview_sk);
//            $preview_sk = str_replace('{nm_kepala}', $user->profile->name, $preview_sk);
//            $preview_sk = str_replace('{nip_kepala}', $user->no_identitas, $preview_sk);
//            $preview_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $preview_sk);
//        }
                
                $preview_sk = str_replace('{tipe_usaha}', $this->usaha, $preview_sk);
                $preview_sk = str_replace('{tipe}', $this->tipe, $preview_sk);
		$preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
                $preview_sk = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $preview_sk);
		//$preview_sk = str_replace('{tanggal}', $this->iii_7b_tgl_mulai_kegiatan, $preview_sk);
		$preview_sk = str_replace('{status_pendaftaran}', $status->nama, $preview_sk);
		$preview_sk = str_replace('{status_pembaharuan}', $this->perpanjangan_ke, $preview_sk);
		$preview_sk = str_replace('{nm_perusahaan}', $this->ii_1_perusahaan_nama, $preview_sk);
		$preview_sk = str_replace('{status_perusahaan}', $this->iii_2_status_prsh, $preview_sk);
		$preview_sk = str_replace('{alamat_perusahaan}', $this->ii_2_perusahaan_alamat, $preview_sk);
		$preview_sk = str_replace('{npwp}', $this->iii_5_npwp, $preview_sk);		
		$preview_sk = str_replace('{telephone}', $this->ii_2_perusahaan_no_telp, $preview_sk);
		$preview_sk = str_replace('{fax}', $this->ii_2_perusahaan_no_fax, $preview_sk);
		$preview_sk = str_replace('{kegiatan}',$list_kbli, $preview_sk);
		$preview_sk = str_replace('{kbli}',$kode_kbli, $preview_sk);
		
		//$preview_sk = str_replace('{nm_kepala}', $this->perpanjangan_ke, $preview_sk);
		//$preview_sk = str_replace('{nip_kepala}', $this->perpanjangan_ke, $preview_sk);
		
		$this->teks_preview = $preview_sk;

//        //====================preview data========
         $preview_data = $izin->preview_data;
         $preview_data = str_replace('{nik}', $this->i_5_pemilik_no_ktp, $preview_data);
         $preview_data = str_replace('{ktp}', $this->i_5_pemilik_no_ktp, $preview_data);
         $preview_data = str_replace('{nama}', $this->i_1_pemilik_nama, $preview_data);
         $preview_data = str_replace('{alamat}', $this->i_3_pemilik_alamat, $preview_data);
         $preview_data = str_replace('{ttl}', $this->i_2_pemilik_tpt_lahir.','.Yii::$app->formatter->asDate($this->i_2_pemilik_tgl_lahir, 'php: d F Y'), $preview_data);
         $preview_data = str_replace('{telp}', $this->i_4_pemilik_telepon, $preview_data);
//         $preview_data = str_replace('{fax}', $this->fax, $preview_data);
//         $preview_data = str_replace('{passport}', $this->passport, $preview_data);
         $preview_data = str_replace('{kewarganegaraan}', $this->i_6_pemilik_kewarganegaraan, $preview_data);
//         $preview_data = str_replace('{jabatan_perusahaan}', $this->jabatan_perusahaan, $preview_data);
         //II
         $preview_data = str_replace('{nama_perusahaan}', $this->ii_1_perusahaan_nama, $preview_data);
//         $preview_data = str_replace('{bentuk_perusahaan}', $this->bentuk_perusahaan, $preview_data);
         $preview_data = str_replace('{alamat_perusahaan}', $this->ii_2_perusahaan_alamat, $preview_data);
         $preview_data = str_replace('{propinsi}', $this->ii_2_perusahaan_propinsi, $preview_data);
         $preview_data = str_replace('{kabupaten}', $this->ii_2_perusahaan_kabupaten, $preview_data);
         $preview_data = str_replace('{kecamatan}', $this->ii_2_perusahaan_kecamatan, $preview_data);
         $preview_data = str_replace('{kelurahan}', $this->ii_2_perusahaan_kelurahan, $preview_data);
         $preview_data = str_replace('{kode_pos}', $this->ii_2_perusahaan_kodepos, $preview_data);
         $preview_data = str_replace('{telpon_perusahaan}', $this->ii_2_perusahaan_no_telp, $preview_data);
         $preview_data = str_replace('{fax_perusahaan}', $this->ii_2_perusahaan_no_fax, $preview_data);
//         $preview_data = str_replace('{status_perusahaan}', $this->status_perusahaan, $preview_data);
         //III
         $preview_data = str_replace('{group}', $this->iii_1_nama_kelompok, $preview_data);
         $preview_data = str_replace('{induk_usaha}', $this->iii_2_induk_nama_prsh, $preview_data);
         $preview_data = str_replace('{no_tdp}', $this->iii_2_induk_nomor_tdp, $preview_data);
         $preview_data = str_replace('{status_usaha}', $this->iii_2_status_prsh, $preview_data);
         $preview_data = str_replace('{prop_induk}', $this->iii_2_induk_propinsi, $preview_data);
         $preview_data = str_replace('{kab_induk}', $this->iii_2_induk_kabupaten, $preview_data);
         $preview_data = str_replace('{kec_induk}', $this-> iii_2_induk_kecamatan, $preview_data);
         $preview_data = str_replace('{kel_induk}', $this-> iii_2_induk_kelurahan, $preview_data);
         $preview_data = str_replace('{alamat_usaha}', $this->iii_2_induk_alamat, $preview_data);
         $preview_data = str_replace('{unit_prop}', $this->iii_3_lokasi_unit_produksi_propinsi, $preview_data);
         $preview_data = str_replace('{unit_kab}', $this->iii_3_lokasi_unit_produksi_kabupaten, $preview_data);
         $preview_data = str_replace('{bank1}', $this->iii_4_bank_utama_1, $preview_data);
         $preview_data = str_replace('{bank2}', $this->iii_4_bank_utama_2, $preview_data);
         $preview_data = str_replace('{jml_bank}', $this->iii_4_jumlah_bank, $preview_data);
         $preview_data = str_replace('{npwp_perusahaan}', $this->iii_5_npwp, $preview_data);
         $preview_data = str_replace('{bntk_modal}', $this->iii_6_status_perusahaan_id, $preview_data);
         $preview_data = str_replace('{tgl_mulai}', $this->iii_7b_tgl_mulai_kegiatan, $preview_data);
         $preview_data = str_replace('{tgl_pendirian}', $this->iii_7a_tgl_pendirian, $preview_data);
         $preview_data = str_replace('{btk_kerjasama}', $this->iii_8_bentuk_kerjasama_pihak3, $preview_data);
         $preview_data = str_replace('{merek_dagang}', $this->iii_9a_merek_dagang_nama, $preview_data);
         $preview_data = str_replace('{no_dagang}', $this->iii_9a_merek_dagang_nomor, $preview_data);
         $preview_data = str_replace('{hak_ptn}', $this->iii_9b_hak_paten_nama, $preview_data);
         $preview_data = str_replace('{no_hakptn}', $this->iii_9b_hak_paten_nomor, $preview_data);
         $preview_data = str_replace('{hak_cipta}', $this->iii_9c_hak_cipta_nama, $preview_data);
         $preview_data = str_replace('{no_hakcipta}', $this->iii_9c_hak_cipta_nomor, $preview_data);
         $preview_data = str_replace('{akta_pendirian_no}', $this->iv_a1_nomor, $preview_data);
         //IV
         $preview_data = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->iv_a1_tanggal, 'php: d F Y'), $preview_data);
         $preview_data = str_replace('{notaris_nama}', $this->iv_a1_notaris_nama, $preview_data);
         $preview_data = str_replace('{notaris_tlp}', $this->iv_a1_telpon, $preview_data);
         //  
         $preview_data = str_replace('{akta_pendirian_no2}', $this->iv_a2_nomor, $preview_data);
         $preview_data = str_replace('{akta_pendirian_tanggal2}', Yii::$app->formatter->asDate($this->iv_a2_tanggal, 'php: d F Y'), $preview_data);
         $preview_data = str_replace('{notaris_nama2}', $this->iv_a2_notaris, $preview_data);
         //
         $preview_data = str_replace('{akta_pendirian_no3}', $this->iv_a3_nomor, $preview_data);
         $preview_data = str_replace('{akta_pendirian_tanggal3}', Yii::$app->formatter->asDate($this->iv_a3_tanggal, 'php: d F Y'), $preview_data);
         //$preview_data = str_replace('{notaris_nama3}', $this->iv_a3_notaris, $preview_data);
         //
         $preview_data = str_replace('{akta_pendirian_no4}', $this->iv_a4_nomor, $preview_data);
         $preview_data = str_replace('{akta_pendirian_tanggal4}', Yii::$app->formatter->asDate($this->iv_a4_tanggal, 'php: d F Y'), $preview_data);
         //$preview_data = str_replace('{notaris_nama4}', $this->iv_a4_notaris, $preview_data);
         
         //V
       
//         $preview_data = str_replace('{propinsi_usaha}', $this->ii_2_perusahaan_propinsi, $preview_data);
//         $preview_data = str_replace('{kabupaten_usaha}', $this->ii_2_perusahaan_kabupaten, $preview_data);
//         $preview_data = str_replace('{kelurahan_usaha}', $this->ii_2_perusahaan_kelurahan, $preview_data);
//         $preview_data = str_replace('{kecamatan_usaha}', $this->ii_2_perusahaan_kecamatan, $preview_data);
         
         $preview_data = str_replace('{no_dagang}', $this->iii_9a_merek_dagang_nomor, $preview_data);
         $preview_data = str_replace('{hak_ptn}', $this->iii_9b_hak_paten_nama, $preview_data);
         $preview_data = str_replace('{no_hakptn}', $this->iii_9b_hak_paten_nomor, $preview_data);
         $preview_data = str_replace('{hak_cipta}', $this->iii_9c_hak_cipta_nama, $preview_data);
         $preview_data = str_replace('{no_hakcipta}', $this->iii_9c_hak_cipta_nomor, $preview_data);
         
//         $preview_data = str_replace('{modal}', number_format($this->modal, 2, ',', '.'), $preview_data);
//         $preview_data = str_replace('{saham_pma}',number_format($this->nilai_saham_pma, 2, ',', '.'), $preview_data);
//         $preview_data = str_replace('{saham_nasional}', $this->saham_nasional, $preview_data);
//         $preview_data = str_replace('{saham_asing}', $this->saham_asing, $preview_data);
//         $preview_data = str_replace('{kelembagaan}', $this->kelembagaan, $preview_data);
        
         //Legal
        $a = 1;
        $legals = IzinTdpLegal::findAll(['izin_tdp_id' => $this->id]); // $this->izinSiupKblis;
        $kode_legal = '';
        $list_legal = '<ul>';
        foreach ($legals as $legall) {
                
            $jenis_izin = JenisIzin::findOne(['id' => $legall->jenis]);
            $kode = $legall->nomor;
            $rincian = $jenis_izin->nama ;
            $oleh = $legall->dikeluarkan_oleh;
            $tgl_klr = Yii::$app->formatter->asDate($legall->tanggal_dikeluarkan, 'php: d F Y');
            $masa = $legall->masa_laku." ".$legall->masa_laku_satuan;
          
            $kode_legal .='
            <tr>
                <td  width="34" valign="top">
                   '. $a .'.
                </td>
                <td width="150">
                    <p>Nomor</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="480">
                    <p>'.$kode.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Jenis
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$rincian.'</p>
                </td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Di keluarkan Oleh
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$oleh.'</p>
                </td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td valign="top">
                  Tanggal Keluar
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$tgl_klr.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Masa Berlaku
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$masa.'</p>
                </td>
            </tr>
            ';
            $a++;
//            echo '<pre>';
//         die(print_r($kode_legal));
        }
         $legal='<table border=0>'.$kode_legal.'</table>';
         $preview_data = str_replace('{legal}', $legal, $preview_data);
         
         //Pimpinan
         $preview_data = str_replace('{dirut}', $this->v_jumlah_dirut, $preview_data);
         $preview_data = str_replace('{direktur}', $this->v_jumlah_direktur, $preview_data);
         $preview_data = str_replace('{komisaris}', $this->v_jumlah_komisaris, $preview_data);
         $preview_data = str_replace('{pengurus}', $this->v_jumlah_pengurus, $preview_data);
         $preview_data = str_replace('{pengawas}', $this->v_jumlah_pengawas, $preview_data);
         
         $preview_data = str_replace('{staffi}', $this->vii_e_wni, $preview_data);
         $preview_data = str_replace('{staffa}', $this->vii_e_wna, $preview_data);
         $preview_data = str_replace('{total_aset}', $this->vii_d_totalaset, $preview_data);
         $preview_data = str_replace('{omset}', $this->vii_b_omset, $preview_data);
         
         $preview_data = str_replace('{terbilang}', $this->vii_b_terbilang, $preview_data);
         $preview_data = str_replace('{mdasar}', $this->vii_c1_dasar, $preview_data);
         $preview_data = str_replace('{msaham}', $this->vii_c4_saham, $preview_data);
         $preview_data = str_replace('{mditempatkan}', $this->vii_c2_ditempatkan, $preview_data);
         $preview_data = str_replace('{nominal}', $this->vii_c5_nominal, $preview_data);
         $preview_data = str_replace('{disetor}', $this->vii_c3_disetor, $preview_data);
         $preview_data = str_replace('{pokok}', $this->vi_c_modal_1a, $preview_data);
         $preview_data = str_replace('{wajib}', $this->vi_c_modal_1b, $preview_data);
         $preview_data = str_replace('{dana_cadangan}', $this->vi_c_modal_1c, $preview_data);
         $preview_data = str_replace('{hibah}', $this->vi_c_modal_1d, $preview_data);
         $preview_data = str_replace('{anggota}', $this->vi_c_modal_2a, $preview_data);
         $preview_data = str_replace('{koprasi}', $this->vi_c_modal_2b, $preview_data);
         $preview_data = str_replace('{pnjm_bank}', $this->vi_c_modal_2c, $preview_data);
         $preview_data = str_replace('{lain}', $this->vi_c_modal_2d, $preview_data);
       
        $a = 1;
        $lead = IzinTdpPimpinan::findAll(['izin_tdp_id' => $this->id]); // $this->izinSiupKblis;
        $leaders = '';
//        $list_legal = '<ul>';
        foreach ($lead as $leader) {
                //jabatan_lain_id kewarganegaraan_id
            $jenis_pim = Jabatan::findOne(['id' => $leader->jabatan_id]);
            $wn = Negara::findOne(['id' => $leader->kewarganegaraan_id]);
            $jabatan = $jenis_pim->nama_jabatan;
            $nama_pim = $leader->nama_lengkap ;
            $negara = $wn->nama_negara;
            //$tgll = Yii::$app->formatter->asDate($leader->tgllahir, 'php: d F Y');
            $tmpt_lahir = $leader->tmplahir . ", ".
            Yii::$app->formatter->asDate($leader->tgllahir, 'php: d F Y');
            $alamat= $leader->alamat_lengkap . "," .$leader->kodepos;
            $tlp= $leader->telepon;
            if($leader->jabatan_lain_id !=='')
            {
                $jenis_pim = Jabatan::findOne(['id' => $leader->jabatan_lain_id]);
                $jabatan_lain = $jenis_pim->nama_jabatan;
            }
            else{ $jabatan_lain = "-";
            
            }
            
            $leaders .='
            <tr>
                <td  width="34" valign="top">
                   '. $a .'.
                </td>
                <td width="150">
                    <p>Nama</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="480">
                    <p>'.$nama_pim.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Jabatan
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$jabatan.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Jabatan Lain
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$jabatan_lain.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Kewarganegaraan
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$negara.'</p>
                </td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Tempat Tgl Lahir
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$tmpt_lahir.'</p>
                </td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td valign="top">
                  Alamat
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$alamat.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    No Tlp
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$tlp.'</p>
                </td>
            </tr>
            ';
            $a++;
//            echo '<pre>';
//         die(print_r($kode_legal));
        }
         $leaderss='<table border=0>'.$leaders.'</table>';
         $preview_data = str_replace('{leaders}', $leaderss, $preview_data);
//         
//         KBLI
        $a = 1;
        $kblis = IzinTdpKegiatan::findAll(['izin_tdp_id' => $this->id]); // $this->izinSiupKblis;
        $kode_kbli = '';
        $list_kbli = '<ul>';
        foreach ($kblis as $kbli) {
             $kd = \backend\models\Kbli::findOne(['kode' => $kbli->kbli->kode])->parent_id;
             if($kd == ''){
                 $kode=$kbli->kbli->kode;
                 $rincian = $kbli->kbli->nama;
             } else{
                 $qry = \backend\models\Kbli::findOne(['id' => $kd]);
             $kode = $qry->kode;
             $rincian = $qry->nama;
             }
            
		
            $kode_kblii .='
            <tr>
                <td  width="34" valign="top">
                   '. $a .'.
                </td>
                <td width="150">
                    <p>Kode KBLI</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="480">
                    <p>'.$kode.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Nama KBLI
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$rincian.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Keterangan
                </td>
                <td valign="top">:</td>
                <td>
                   '. $kblii->keterangan.'
                </td>
            </tr>';
            $a++;
        }
        $dkbli='<table border=0>'.$kode_kblii.'</table>';
          $akt = \backend\models\IzinSiupAkta::findOne(['izin_siup_id'=> $this->id])->nomor_akta;
        if( $akt <> ''){
           // $akta = \backend\models\IzinSiupAkta::findOne(['izin_siup_id'=> $this->id]);
            $akta = \backend\models\IzinSiupAkta::findBySql('SELECT * FROM izin_siup_akta where izin_siup_id = "'.$this->id.'"order by tanggal_akta desc')->one();
$perubahan .='<table>	<tr><td  width="30">2.</td>
            <td  valign="top"  width="200">
                <p>Akta Perubahan</p>
            </td>
            <td  valign="top" width="2"></td>
            <td  valign="top" width="308">
                <p></p>
            </td>
        </tr>
	<tr><td ></td>
            <td valign="top">
                <p>a. Nomor & Tgl Akta</p>
            </td>
            <td  valign="top">:</td>
            <td  valign="top"  >
                <p>'.$akta->nomor_akta.' &nbsp; & &nbsp;'.Yii::$app->formatter->asDate($akta->tanggal_akta, 'php: d F Y').'</p>
            </td>
        </tr>
        <tr><td ></td>
            <td valign="top">
                <p>b. Nomor & tgl Pengesahan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p>'.$akta->nomor_pengesahan.' &nbsp; & &nbsp;'.Yii::$app->formatter->asDate($akta->tanggal_pengesahan, 'php: d F Y').'</p>
            </td>
        </tr></table>';
    }
         $preview_data = str_replace('{kblii}', $dkbli, $preview_data);
         $preview_data = str_replace('{akta_perubahan}', $perubahan, $preview_data);
         $preview_data = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
         
         $this->preview_data = $preview_data;
//        
//        //====================template_sk========
        $teks_sk = $izin->template_sk;
        
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);
//        if ($perizinan->no_izin !== null) {
//            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
//            $sk_siup = str_replace('{no_izin}', $perizinan->no_izin, $sk_siup);
//            $sk_siup = str_replace('{nm_kepala}', $user->profile->name, $sk_siup);
//            $sk_siup = str_replace('{nip_kepala}', $user->no_identitas, $sk_siup);
//            $sk_siup = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $sk_siup);
//        }
        $teks_sk = str_replace('{no_tdp}', $this->no_pembukuan, $izin->template_sk);
        
        
        $teks_sk = str_replace('{tipe_usaha}', $this->usaha, $teks_sk);
        $teks_sk = str_replace('{tipe}', $this->tipe, $teks_sk);
        $teks_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $teks_sk);
        $teks_sk = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        //$preview_sk = str_replace('{tanggal}', $this->iii_7b_tgl_mulai_kegiatan, $preview_sk);
        $teks_sk = str_replace('{status_pendaftaran}', $status->nama, $teks_sk);
        $teks_sk = str_replace('{status_pembaharuan}', $this->perpanjangan_ke, $teks_sk);
        $teks_sk = str_replace('{nm_perusahaan}', $this->ii_1_perusahaan_nama, $teks_sk);
        $teks_sk = str_replace('{status_perusahaan}', $this->iii_2_status_prsh, $teks_sk);
        $teks_sk = str_replace('{alamat_perusahaan}', $this->ii_2_perusahaan_alamat, $teks_sk);
        $teks_sk = str_replace('{npwp}', $this->iii_5_npwp, $teks_sk);		
        $teks_sk = str_replace('{telephone}', $this->ii_2_perusahaan_no_telp, $teks_sk);
        $teks_sk = str_replace('{fax}', $this->ii_2_perusahaan_no_fax, $teks_sk);
        $teks_sk = str_replace('{kegiatan}',$list_kbli, $teks_sk);
        $teks_sk = str_replace('{kbli}',$kode_kbli, $teks_sk);
        
       
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
        
        $this->teks_sk = $teks_sk;
        $teks_sk = $izin->template_sk;
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
