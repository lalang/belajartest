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
    public $tanda_register;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bentuk_perusahaan', 'user_id', 'status_id', 'i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_2_pemilik_tgl_lahir', 'i_3_pemilik_alamat', 'i_3_pemilik_kelurahan', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'i_6_pemilik_kewarganegaraan', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_kelurahan', 'ii_2_perusahaan_kodepos', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_4_bank_utama_1', 'iii_4_jumlah_bank', 'iii_5_npwp', 'iii_6_status_perusahaan_id', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'vii_b_omset', 'vii_d_totalaset', 'vii_e_wni', 'vii_e_wna','vii_f_matarantai'], 'required'],
			['ii_2_perusahaan_email', 'email'],
            [['bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'perpanjangan_ke', 'i_3_pemilik_propinsi', 'i_3_pemilik_kabupaten', 'i_3_pemilik_kecamatan', 'i_3_pemilik_kelurahan', 'i_6_pemilik_kewarganegaraan', 'ii_2_perusahaan_propinsi', 'ii_2_perusahaan_kabupaten', 'ii_2_perusahaan_kecamatan', 'ii_2_perusahaan_kelurahan', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_4_jumlah_bank', 'iii_6_status_perusahaan_id', 'iii_8_bentuk_kerjasama_pihak3', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham', 'vi_a_kegiatan_utama', 'vii_e_wni', 'vii_e_wna', 'vii_f_matarantai', 'vii_fa_satuan', 'vii_fb_satuan', 'viii_jenis_perusahaan', 'create_by', 'update_by'], 'integer'],
            [['i_2_pemilik_tgl_lahir', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'iv_a1_tanggal', 'iv_a2_tanggal', 'iv_a3_tanggal', 'iv_a4_tanggal', 'iv_a5_tanggal', 'iv_a6_tanggal', 'create_date', 'update_date',
                'vi_c_modal_1a', 'vi_c_modal_1b',  'vi_c_modal_1c',  'vi_c_modal_1d', 'vi_c_modal_2a', 'vi_c_modal_2b', 'vi_c_modal_2c', 'vi_c_modal_2d','vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor','vii_c4_saham',], 'safe'],
            [['vi_c_modal_1a', 'vi_c_modal_1b',  'vi_c_modal_1c',  'vi_c_modal_1d', 'vi_c_modal_2a', 
              'vi_c_modal_2b', 'vi_c_modal_2c', 'vi_c_modal_2d', 'vii_c5_nominal'], 'double'],
            [['iii_2_status_prsh', 'vii_f_pengecer', 'vii_1_koperasi_bentuk','vii_2_koperasi_jenis'], 'string'],
         //   [['vii_b_omset', 'vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal', 'vii_c6_aktif', 'vii_c7_pasif', 'vii_d_totalaset', 'vii_fa_jumlah', 'vii_fb_jumlah', 'vii_fc_lokal', 'vii_fc_impor'], 'number'],
            [['i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_3_pemilik_alamat', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_1_nama_kelompok', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_9a_merek_dagang_nama', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_nomor', 'iv_a2_notaris', 'iv_a3_nomor', 'iv_a4_nomor', 'iv_a5_nomor', 'iv_a6_nomor', 'vii_b_terbilang', 'vi_a_produk_utama'], 'string', 'max' => 200],
            [['iii_5_npwp','no_pembukuan','no_sk_siup'], 'string', 'max' => 50],
			[['i_4_pemilik_telepon','ii_2_perusahaan_no_telp','ii_2_perusahaan_no_fax'],'string', 'max' => 15],
			[['ii_2_perusahaan_kodepos'],'string', 'max' => 8],
			[['i_5_pemilik_no_ktp','iii_9a_merek_dagang_nomor','iii_9b_hak_paten_nama','iii_9b_hak_paten_nomor','iii_9c_hak_cipta_nama','iii_9c_hak_cipta_nomor','iv_a1_nomor',], 'string', 'max' => 20],			
			[['v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham',], 'number', 'max' => 99999999999999999999],
            'emailTrim'     => ['ii_2_perusahaan_email', 'filter', 'filter' => 'trim'],
            'emailRequired' => ['ii_2_perusahaan_email', 'required'],
            'emailPattern'  => ['ii_2_perusahaan_email', 'email'],

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
			$this->vii_c6_aktif = str_replace('.', '', $this->vii_c6_aktif);
			$this->vii_c7_pasif = str_replace('.', '', $this->vii_c7_pasif);
			$this->vii_c5_nominal = str_replace('.', '', $this->vii_c5_nominal);
			$this->vii_d_totalaset = str_replace('.', '', $this->vii_d_totalaset);
            return true;
        } else {
            return false;
        }
    }
    
    public function afterFind() {
        parent::afterFind();
        $izin = Izin::findOne($this->izin_id);
        $perizinan = Perizinan::findOne($this->perizinan_id);
        
        $idParent = Perizinan::findOne($perizinan->parent_id)->referrer_id;
       
        $izinParent = IzinSiup::findOne($idParent);
                
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
        }$qry = \backend\models\Kbli::findOne(['id' => $kd]);
        $k=  IzinTdpKegiatan::findOne(['izin_tdp_id'=>  $this->id]);
        $kb=  Kbli::findOne(['id'=>  $k->kbli_id]);
//        echo '<pre>';
//        die(print_r($kb));
		$status = Status::findOne($this->status_id);
		//$user = User::findOne($perizinan->pengesah_id);	 
		//$profile = Profile::findOne($user->id);
		//$lokasi = Lokasi::findOne($this->kelurahan_id);
		//$this->nama_kelurahan = Lokasi::findOne(['id'=>$this->kelurahan_id])->nama;
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
           $bank=  Bank::findOne(['id'=> $this->iii_4_bank_utama_1]);
           $bank2=  Bank::findOne(['id'=> $this->iii_4_bank_utama_2]);
//             foreach ($bank as $banks) {
//             		Bank::findOne(['id' => $banks-> iii_4_bank_utama_1]);
//                 	$kdbank1=Bank::findOne(['id' => $banks->iii_4_bank_utama_1]);
//                 	$kdbank2=$banks-> iii_4_bank_utama_2;
//             }
             $kdbank1=$bank-> nama;
             $kdbank2=$bank2-> nama;
             $statusmodal=  StatusPerusahaan::findOne(['id'=> $this->iii_6_status_perusahaan_id]);
             $statusmodal=$statusmodal->nama;
             $pemilikKab= Lokasi::findOne(['id'=> $this->i_3_pemilik_kabupaten]);
             $pemilikKel= Lokasi::findOne(['id'=> $this->i_3_pemilik_kelurahan]);
             $pemilikKec= Lokasi::findOne(['id'=> $this->i_3_pemilik_kecamatan]);
             $p_prop= Lokasi::findOne(['id'=> $this->i_3_pemilik_propinsi]);
             $kwn=  Negara::findOne(['id'=> $this->i_6_pemilik_kewarganegaraan]);
             $pemilikKab=$pemilikKab->nama;
             $pemilikKel=$pemilikKel->nama;
             $pemilikKec=$pemilikKec->nama;
             $p_prop=$p_prop->nama;
             $kwn=$kwn->nama_negara;
             $perusahaanKab= Lokasi::findOne(['id'=> $this->ii_2_perusahaan_kabupaten]);
             $perusahaanKel= Lokasi::findOne(['id'=> $this->ii_2_perusahaan_kelurahan]);
             $perusahaanKec= Lokasi::findOne(['id'=> $this->ii_2_perusahaan_kecamatan]);
             $perusahaanKab=$perusahaanKab->nama;
             $perusahaanKel=$perusahaanKel->nama;
             $perusahaanKec=$perusahaanKec->nama;
             $jumlah=$this->vii_e_wni+$this->vii_e_wna; 
             
             $induk_prop=Lokasi::findOne(['id'=> $this->iii_2_induk_propinsi]);
             $induk_prop=$induk_prop->nama;
             $induk_kab=Lokasi::findOne(['id'=> $this->iii_3_lokasi_unit_produksi_kabupaten]);
             $induk_kab=$induk_kab->nama;
             $induk_kec=Lokasi::findOne(['id'=> $this->iii_2_induk_kecamatan]);
             $induk_kec=$induk_kec->nama;
             $induk_kel=Lokasi::findOne(['id'=> $this->iii_2_induk_kelurahan]);
             $induk_kel=$induk_kel->nama;
             
             $unit_prop=Lokasi::findOne(['id'=> $this->iii_3_lokasi_unit_produksi_propinsi]);
             $unit_prop=$unit_prop->nama;
             $unit_kab=Lokasi::findOne(['id'=> $this->iii_3_lokasi_unit_produksi_kabupaten]);
             $unit_kab=$unit_kab->nama;
             $unit_kab=Lokasi::findOne(['id'=>  $this->vii_f_matarantai]);
             $unit_kab=$unit_kab->nama;
            //die($kdbank2);  
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
			$preview_sk = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $preview_sk);
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
			$preview_sk = str_replace('{nama}', $this->i_1_pemilik_nama, $preview_sk);
			//$preview_sk = str_replace('{nm_kepala}', $this->perpanjangan_ke, $preview_sk);
			//$preview_sk = str_replace('{nip_kepala}', $this->perpanjangan_ke, $preview_sk);
			
			$this->teks_preview = $preview_sk;

	//        //====================preview data========
			 $preview_data = $izin->preview_data;
			 $preview_data = str_replace('{nik}', $this->i_5_pemilik_no_ktp, $preview_data);
			 $preview_data = str_replace('{ktp}', $this->i_5_pemilik_no_ktp, $preview_data);
			 $preview_data = str_replace('{nama}', $this->i_1_pemilik_nama, $preview_data);
			 $preview_data = str_replace('{jabatan}',strtoupper($izinParent->jabatan_perusahaan), $preview_data);
			 $preview_data = str_replace('{alamat}', $this->i_3_pemilik_alamat, $preview_data);
			 $preview_data = str_replace('{ttl}', $this->i_2_pemilik_tpt_lahir.','.Yii::$app->formatter->asDate($this->i_2_pemilik_tgl_lahir, 'php: d F Y'), $preview_data);
			 $preview_data = str_replace('{telp}', $this->i_4_pemilik_telepon, $preview_data);
			 $preview_data = str_replace('{p_propinsi}', $p_prop, $preview_data);
			 $preview_data = str_replace('{p_kabupaten}', $pemilikKab, $preview_data);
			 $preview_data = str_replace('{p_kecamatan}', $pemilikKec, $preview_data);
			 $preview_data = str_replace('{p_keluranhan}', $pemilikKel, $preview_data);
			
	//         $preview_data = str_replace('{fax}', $this->fax, $preview_data);
	//         $preview_data = str_replace('{passport}', $this->passport, $preview_data);
			 $preview_data = str_replace('{kewarganegaraan}', $kwn, $preview_data);
	//         $preview_data = str_replace('{jabatan_perusahaan}', $this->jabatan_perusahaan, $preview_data);
			 //II
			 $preview_data = str_replace('{nama_perusahaan}', $this->ii_1_perusahaan_nama, $preview_data);
	//         $preview_data = str_replace('{bentuk_perusahaan}', $this->bentuk_perusahaan, $preview_data);
			 $preview_data = str_replace('{alamat_perusahaan}', $this->ii_2_perusahaan_alamat, $preview_data);
			 $preview_data = str_replace('{propinsi}','DKI Jakarta', $preview_data);
			 $preview_data = str_replace('{kabupaten}', $perusahaanKab, $preview_data);
			 $preview_data = str_replace('{kecamatan}', $perusahaanKec, $preview_data);
			 $preview_data = str_replace('{kelurahan}', $perusahaanKel, $preview_data);
			 $preview_data = str_replace('{kode_pos}', $this->ii_2_perusahaan_kodepos, $preview_data);
			 $preview_data = str_replace('{telepon_perusahaan}', $this->ii_2_perusahaan_no_telp, $preview_data);
			 $preview_data = str_replace('{fax_perusahaan}', $this->ii_2_perusahaan_no_fax, $preview_data);
			 $preview_data = str_replace('{perusahaan_email}', $this->ii_2_perusahaan_email, $preview_data);
	//         $preview_data = str_replace('{status_perusahaan}', $this->status_perusahaan, $preview_data);
			 //III
			 $preview_data = str_replace('{group}', $this->iii_1_nama_kelompok, $preview_data);
			 $preview_data = str_replace('{induk_usaha}', $this->iii_2_induk_nama_prsh, $preview_data);
			 $preview_data = str_replace('{no_tdp}', $this->iii_2_induk_nomor_tdp, $preview_data);
			 $preview_data = str_replace('{status_usaha}', $this->iii_2_status_prsh, $preview_data);
			 $preview_data = str_replace('{prop_induk}', $induk_prop, $preview_data);
			 $preview_data = str_replace('{kab_induk}', $induk_kab, $preview_data);
			 $preview_data = str_replace('{kec_induk}', $induk_kec, $preview_data);
			 $preview_data = str_replace('{kel_induk}', $induk_kel, $preview_data);
			 $preview_data = str_replace('{alamat_usaha}', $this->iii_2_induk_alamat, $preview_data);
			 
			 $preview_data = str_replace('{lokasi_unit}', $this->iii_3_lokasi_unit_produksi, $preview_data);
			  
			 $preview_data = str_replace('{unit_prop}', $unit_prop, $preview_data);
			 $preview_data = str_replace('{unit_kab}', $unit_kab, $preview_data);
			 $preview_data = str_replace('{bank1}', $kdbank1, $preview_data);
			 $preview_data = str_replace('{bank2}', $kdbank2, $preview_data);
			 $preview_data = str_replace('{jml_bank}', $this->iii_4_jumlah_bank, $preview_data);
			 $preview_data = str_replace('{npwp_perusahaan}', $this->iii_5_npwp, $preview_data);
			 $preview_data = str_replace('{bentuk_modal}', $statusmodal, $preview_data);
			 //Yii::$app->formatter->asDate($this->iii_7a_tgl_pendirian, 'php: d F Y')
			 $preview_data = str_replace('{tgl_mulai}', Yii::$app->formatter->asDate($this->iii_7b_tgl_mulai_kegiatan, 'php: d F Y'), $preview_data);
			 $preview_data = str_replace('{tgl_pendirian}', Yii::$app->formatter->asDate($this->iii_7a_tgl_pendirian, 'php: d F Y'), $preview_data);
			 $preview_data = str_replace('{bentuk_kerjasama}', $this->iii_8_bentuk_kerjasama_pihak3, $preview_data);
			 $preview_data = str_replace('{merek_dagang}', $this->iii_9a_merek_dagang_nama, $preview_data);
			 $preview_data = str_replace('{no_dagang}', $this->iii_9a_merek_dagang_nomor, $preview_data);
			 $preview_data = str_replace('{hak_ptn}', $this->iii_9b_hak_paten_nama, $preview_data);
			 $preview_data = str_replace('{no_hakptn}', $this->iii_9b_hak_paten_nomor, $preview_data);
			 $preview_data = str_replace('{hak_cipta}', $this->iii_9c_hak_cipta_nama, $preview_data);
			 $preview_data = str_replace('{no_hakcipta}', $this->iii_9c_hak_cipta_nomor, $preview_data);
			 
			 //IV
			 $preview_data = str_replace('{akta_pendirian_no}', $this->iv_a1_nomor, $preview_data);
			 $preview_data = str_replace('{akta_pendirian_tanggal}', Yii::$app->formatter->asDate($this->iv_a1_tanggal, 'php: d F Y'), $preview_data);
			 $preview_data = str_replace('{notaris_nama}', $this->iv_a1_notaris_nama, $preview_data);
			 $preview_data = str_replace('{notaris_tlp}', $this->iv_a1_telpon, $preview_data);
			 $preview_data = str_replace('{notaris_alamat}', $this->iv_a1_notaris_alamat, $preview_data);
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
			 $preview_data = str_replace('{akta_pendirian_no5}', $this->iv_a5_nomor, $preview_data);
			 $preview_data = str_replace('{akta_pendirian_tanggal5}', Yii::$app->formatter->asDate($this->iv_a5_tanggal, 'php: d F Y'), $preview_data);
			 $preview_data = str_replace('{akta_pendirian_no6}', $this->iv_a6_nomor, $preview_data);
			 $preview_data = str_replace('{akta_pendirian_tanggal6}', Yii::$app->formatter->asDate($this->iv_a6_tanggal, 'php: d F Y'), $preview_data);
			 $preview_data = str_replace('{jml_pemegang_saham}', $this->vi_jumlah_pemegang_saham, $preview_data);
			 $preview_data = str_replace('{jenis_perusahaan}', $this->viii_jenis_perusahaan, $preview_data);
			 //V 
		   
	//         $preview_data = str_replace('{propinsi_usaha}', $this->ii_2_perusahaan_propinsi, $preview_data);
	//         $preview_data = str_replace('{kabupaten_usaha}', $this->ii_2_perusahaan_kabupaten, $preview_data);
	//         $preview_data = str_replace('{kelurahan_usaha}', $this->ii_2_perusahaan_kelurahan, $preview_data);
	//         $preview_data = str_replace('{kecamatan_usaha}', $this->ii_2_perusahaan_kecamatan, $preview_data);
		   
	//         $preview_data = str_replace('{modal}', number_format($this->modal, 2, ',', '.'), $preview_data);
	//         $preview_data = str_replace('{saham_pma}',number_format($this->nilai_saham_pma, 2, ',', '.'), $preview_data);
	//         $preview_data = str_replace('{saham_nasional}', $this->saham_nasional, $preview_data);
	//         $preview_data = str_replace('{saham_asing}', $this->saham_asing, $preview_data);
	//         $preview_data = str_replace('{kelembagaan}', $this->kelembagaan, $preview_data);
        //Saham
        $a = 1;
        $shm = IzinTdpSaham::findAll(['izin_tdp_id' => $this->id]); // $this->izinSiupKblis;
        $kode_shm = '';
//        $list_legal = '<ul>';
        foreach ($shm as $shms) {
                
            $wn= Negara::findOne(['id'=>$shms->kewarganegaraan]);
            $alamat = $shms->alamat;
            $nama = $shms->nama_lengkap ;
            $kd_pos= $shms->kodepos;
            $no_tlp = $shms->no_telp;
            $wn = $wn->nama_negara;
            $npwp = $shms->npwp;
            $jml_saham = $shms->jumlah_saham;
            $jml_modal = $shms->jumlah_modal;
            $kode_shm .='
            <tr>
                <td  width="34" valign="top">
                   '. $a .'.
                </td>
                <td width="150">
                    <p>Nama Lengkap</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="480">
                    <p>'.$nama.'</p>
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
                    Kode Pos
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$kd_pos.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    No Telepon
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$no_tlp.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Kewarganegaraan
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$wn.'</p>
                </td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td valign="top">
                   NPWP
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$npwp.'</p>
                </td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td valign="top">
                  Jumlah Saham
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$jml_saham.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Jumlah Modal
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$jml_modal.'</p>
                </td>
            </tr>
            ';
            $a++;
//            echo '<pre>';
//         die(print_r($kode_legal));
        }
         $stock='<table border=0>'.$kode_shm.'</table>';
         $preview_data = str_replace('{saham}', $stock, $preview_data);
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
         $preview_data = str_replace('{sekutu}', $this->v_jumlah_sekutu_aktif, $preview_data);
         $preview_data = str_replace('{direktur}', $this->v_jumlah_direktur, $preview_data);
         $preview_data = str_replace('{komisaris}', $this->v_jumlah_komisaris, $preview_data);
         $preview_data = str_replace('{pengurus}', $this->v_jumlah_pengurus, $preview_data);
         $preview_data = str_replace('{pengawas}', $this->v_jumlah_pengawas, $preview_data);
         $preview_data = str_replace('{sekutu_pasif}', $this->v_jumlah_sekutu_pasif, $preview_data);
         $preview_data = str_replace('{sekutu_baru}', $this->v_jumlah_sekutu_aktif_baru, $preview_data);
         $preview_data = str_replace('{sekutu_pasif_baru}', $this->v_jumlah_sekutu_pasif_baru, $preview_data);
         $preview_data = str_replace('{sekutu_aktif_modal}', $this->vii_c6_aktif, $preview_data);
         $preview_data = str_replace('{sekutu_pasif_modal}', $this->vii_c7_pasif, $preview_data);
         
         $preview_data = str_replace('{jumlah}', $jumlah, $preview_data);
         
         $preview_data = str_replace('{wni}', $this->vii_e_wni, $preview_data);
         $preview_data = str_replace('{wna}', $this->vii_e_wna, $preview_data);
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
         $preview_data = str_replace('{koperasi}', $this->vi_c_modal_2b, $preview_data);
         $preview_data = str_replace('{pnjm_bank}', $this->vi_c_modal_2c, $preview_data);
         $preview_data = str_replace('{lain}', $this->vi_c_modal_2d, $preview_data);
       //VI      
         $preview_data = str_replace('{matarantai}', $this->vii_f_matarantai, $preview_data);
         $preview_data = str_replace('{kapasitas_pasang}', $this->vii_fa_jumlah, $preview_data);
         $preview_data = str_replace('{satuan_pasang}', $this->vii_fa_satuan, $preview_data);
         $preview_data = str_replace('{kapasitas_prod}', $this->vii_fb_jumlah, $preview_data);
         $preview_data = str_replace('{satuan_prod}', $this->vii_fb_satuan, $preview_data);
         $preview_data = str_replace('{kandungan_lokal}', $this->vii_fc_lokal, $preview_data);
         $preview_data = str_replace('{kandungan_impor}', $this->vii_fc_impor, $preview_data);
         $preview_data = str_replace('{pengecer}', $this->vii_f_pengecer, $preview_data);
         //VII  
         $preview_data = str_replace('{bentuk_kop}', $this->vii_1_koperasi_bentuk, $preview_data);
         $preview_data = str_replace('{jenis_kop}', $this->vii_2_koperasi_jenis, $preview_data);
         $preview_data = str_replace('{angota_kop}', $this->vii_3_koperasi_anggota, $preview_data);
         
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
         $preview_data = str_replace('{pimpinan}', $leaderss, $preview_data);
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
            //die($kode);
		
            $kode_kblii .='
            <tr>
                <td>
                   '. $a .'.
                </td>
                <td>
                    Kegiatan Usaha Pokok
                </td>
                <td>:</td>
                <td>
                    '.$rincian.'
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                   Komoditi/Produk Utama
                </td>
                <td>:</td>
                <td>
                   '. $kbli->produk.'
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
         //Kantor Cabang
         $a = 1;
        $cbg = IzinTdpKantorcabang::findAll(['izin_tdp_id' => $this->id]); // $this->izinSiupKblis;
        $kode_cbg = '';
//        $list_legal = '<ul>';
        foreach ($cbg as $cbgs) {
            $prop = Lokasi::findOne(['id' => $cbgs->propinsi_id]);
            $kab = Lokasi::findOne(['id' => $cbgs->kabupaten_id]);
            $stat_pt =  StatusPerusahaan::findOne(['id' => $cbgs->status_prsh]);
            $kbl = Kbli::findOne(['id' => $cbgs->kbli_id]);
            $nama = $cbgs->nama;
            $no_tdp = $cbgs->no_tdp;
            $alamat = $cbgs->alamat ;
            $prop= $prop->nama;
            $kab = $kab->nama;
            $kd_pos = $cbgs->kodepos;
            $no_tlp = $cbgs->no_telp;
            $stat_pt =$stat_pt->nama;
            $kbl = $kbl->nama;
            $kode_cbg .='
            <tr>
                <td  width="34" valign="top">
                   '. $a .'.
                </td>
                <td width="150">
                    <p>nama</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="480">
                    <p>'.$nama.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    No TDP
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$no_tdp.'</p>
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
                  Propinsi
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$prop.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Kabupaten
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$kab.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                   No Telepon
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$no_tlp.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Kode Pos
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$kd_pos.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Status Perusahaan
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$stat_pt.'</p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Jenis Kegiatan Usaha
                </td>
                <td valign="top">:</td>
                <td>
                    <p>'.$kbl.'</p>
                </td>
            </tr>
            ';
            $a++;
//            echo '<pre>';
//         die(print_r($kode_legal));
        }
         $tcbg='<table border=0>'.$kode_cbg.'</table>';
         $preview_data = str_replace('{cabang}', $tcbg, $preview_data);
         
         
         $this->preview_data = $preview_data;
//        
        //====================template_sk========
        $teks_sk = $izin->template_sk;
        $bentuk_usaha = BentukPerusahaan::findOne($this->bentuk_perusahaan)->nama;
        $kbliSK = Kbli::findOne($this->vi_a_kegiatan_utama);
        $statusNama = Status::findOne($this->status_id)->nama;
        
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $teks_sk = str_replace('{no_sk}', $perizinan->no_izin, $teks_sk);
            $teks_sk = str_replace('{nm_kepala}', $user->profile->name, $teks_sk);
            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
            $teks_sk = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        }
        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKIFIX.png" width="64px" height="73px"/>', $teks_sk);

        $teks_sk = str_replace('{namawil}', $perizinan->lokasiIzin->nama, $teks_sk);
        $teks_sk = str_replace('{tipe_usaha}', $bentuk_usaha, $teks_sk);
        $teks_sk = str_replace('{no_tdp}', strtoupper($this->no_pembukuan), $teks_sk);
        $teks_sk = str_replace('{status_pendaftaran}', $statusNama, $teks_sk);
        $teks_sk = str_replace('{status_pembaharuan}', ($this->perpanjangan_ke == ''? '-' : $this->perpanjangan_ke), $teks_sk);
        $teks_sk = str_replace('{nm_perusahaan}', $this->ii_1_perusahaan_nama, $teks_sk);
        $teks_sk = str_replace('{status_perusahaan}', $this->iii_2_status_prsh, $teks_sk);
        $teks_sk = str_replace('{nm_pengurus}', $this->i_1_pemilik_nama, $teks_sk);
//        $teks_sk = str_replace('{tgl_sp_rtrw}', Yii::$app->formatter->asDate($this->tanggal_surat, 'php: d F Y'), $teks_sk);
        $teks_sk = str_replace('{alamat_perusahaan}', $this->ii_2_perusahaan_alamat, $teks_sk);
        $teks_sk = str_replace('{npwp}', $this->iii_5_npwp, $teks_sk);
        $teks_sk = str_replace('{telephone}', $this->ii_2_perusahaan_no_telp, $teks_sk);
        $teks_sk = str_replace('{fax}', $this->ii_2_perusahaan_no_fax, $teks_sk);
        $teks_sk = str_replace('{tgl_sekarang}', Yii::$app->formatter->asDate(date('Y-m-d'), 'php: d F Y'), $teks_sk);
//        $teks_sk = str_replace('{foto}', '<img src="' . Yii::getAlias('@front') . '/uploads/' . $perizinan->pemohon_id . '/' . $perizinan->perizinanBerkas[0]->userFile->filename . '" width="120px" height="160px"/>', $teks_sk);
        $teks_sk = str_replace('{kegiatan}', $kbliSK->nama, $teks_sk);
        $teks_sk = str_replace('{kbli}', $kbliSK->kode, $teks_sk);

        
        $this->teks_sk = $teks_sk;

//        
         //----------------surat Kuasa--------------------
         if(Yii::$app->user->identity->profile->tipe == 'Perorangan'){
             $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perorangan'])->value;
         } elseif(Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
             $kuasa= \backend\models\Params::findOne(['name'=> 'Surat Kuasa Perusahaan'])->value;
         }
         $kuasa = str_replace('{nik}', $this->i_5_pemilik_no_ktp, $kuasa);
         $kuasa = str_replace('{alamat}', strtoupper($this->i_3_pemilik_alamat), $kuasa);
         $kuasa = str_replace('{nama_perusahaan}', strtoupper($this->ii_1_perusahaan_nama), $kuasa);
         $kuasa = str_replace('{alamat_perusahaan}', strtoupper($this->ii_2_perusahaan_alamat), $kuasa);
         $kuasa = str_replace('{jabatan}', strtoupper($izinParent->jabatan_perusahaan), $kuasa);
         $kuasa = str_replace('{nama}', strtoupper($this->i_1_pemilik_nama), $kuasa);
         $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
         $this->surat_kuasa=$kuasa;
         //----------------surat pengurusan--------------------
         if(Yii::$app->user->identity->profile->tipe == 'Perorangan'){
             $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perorangan'])->value;
         } elseif(Yii::$app->user->identity->profile->tipe == 'Perusahaan') {
             $pengurusan= \backend\models\Params::findOne(['name'=> 'Surat Pengurusan Perusahaan'])->value;
         }
         $pengurusan = str_replace('{nik}', $this->i_5_pemilik_no_ktp, $pengurusan);
         $pengurusan = str_replace('{alamat}', strtoupper($this->i_3_pemilik_alamat), $pengurusan);
         $pengurusan = str_replace('{nama_perusahaan}', strtoupper($this->ii_1_perusahaan_nama), $pengurusan);
         $pengurusan = str_replace('{alamat_perusahaan}', strtoupper($this->ii_2_perusahaan_alamat), $pengurusan);
         $pengurusan = str_replace('{jabatan}', strtoupper($izinParent->jabatan_perusahaan), $pengurusan);
         $pengurusan = str_replace('{nama}', strtoupper($this->i_1_pemilik_nama), $pengurusan);
         $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
         $this->surat_pengurusan=$pengurusan;
         //----------------daftar--------------------
         $daftar= \backend\models\Params::findOne(['name'=> 'Tanda Registrasi'])->value;
         $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
         $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
         $daftar = str_replace('{npwp}', $this->iii_5_npwp, $daftar);
         $daftar = str_replace('{nama_ph}', $this->ii_1_perusahaan_nama, $daftar);
         $daftar = str_replace('{kantor_ptsp}', $tempat_ambil.'&nbsp;'.$perizinan->lokasiPengambilan->nama, $daftar);
         $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
         $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
         $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
        $this->tanda_register = $daftar;
        
    }
	
}
