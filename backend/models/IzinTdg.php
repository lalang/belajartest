<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdg as BaseIzinTdg;

/**
 * This is the model class for table "izin_tdg".
 */
class IzinTdg extends BaseIzinTdg {

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
    public $teks_penolakan;
    public $surat_pengurusan;
    public $surat_kuasa;
    public $tanda_register;
    public $teks_validasi;

    public function rules() {
        return [
            [['izin_id', 'status_id', 'create_by', 'create_date', 'pemilik_nik', 'pemilik_nama', 'pemilik_alamat', 'pemilik_kodepos', 'perusahaan_npwp', 'perusahaan_nama', 'perusahaan_namajalan', 'perusahaan_kodepos', 'perusahaan_telepon', 'perusahaan_email', 'gudang_namajalan', 'gudang_rt', 'gudang_rw', 'gudang_kodepos', 'gudang_telepon', 'gudang_luas', 'gudang_kapasitas', 'gudang_kapasitas_satuan', 'gudang_nilai', 'gudang_komposisi_nasional', 'gudang_komposisi_asing', 'gudang_kelengkapan', 'gudang_sarana_listrik', 'gudang_sarana_air', 'gudang_sarana_pendingin', 'gudang_sarana_forklif', 'gudang_sarana_komputer', 'gudang_kepemilikan', 'gudang_imb_nomor', 'gudang_imb_tanggal', 'gudang_uug_nomor', 'gudang_uug_tanggal', 'gudang_uug_berlaku', 'gudang_isi'], 'required'],
            [['pemilik_kitas', 'pemilik_paspor', 'pemilik_propinsi', 'pemilik_kabupaten', 'pemilik_kecamatan', 'pemilik_kelurahan', 'perusahaan_blok_lantai', 'perusahaan_propinsi', 'perusahaan_kabupaten', 'perusahaan_kecamatan', 'perusahaan_kelurahan', 'gudang_blok_lantai', 'gudang_propinsi', 'gudang_kabupaten', 'gudang_kecamatan', 'gudang_kelurahan', 'hs_koordinat_1', 'hs_koordinat_2', 'hs_blok_lantai', 'hs_propinsi', 'hs_kabupaten', 'hs_kecamatan', 'hs_kelurahan', 'hs_kodepos', 'hs_telepon', 'hs_fax'], 'string', 'max' => 50],
            [['perizinan_id', 'izin_id', 'status_id', 'gudang_sarana_komputer', 'hs_sarana_forklif', 'hs_sarana_komputer', 'create_by', 'update_by'], 'integer'],
            [['tipe', 'pemilik_alamat', 'gudang_namagedung', 'perusahaan_namajalan', 'gudang_namajalan', 'gudang_kelengkapan', 'gudang_sarana_air', 'gudang_kepemilikan', 'gudang_isi', 'hs_namajalan', 'hs_kapasitas_satuan', 'hs_kelengkapan', 'hs_sarana_air', 'hs_kepemilikan', 'hs_isi', 'catatan_tambahan',
            'hs_per_namagedung', 'hs_per_blok_lantai', 'hs_per_namajalan', 'hs_per_propinsi', 'hs_per_kabupaten', 'hs_per_kecamatan', 'hs_per_kelurahan', 'hs_per_kodepos', 'gudang_kapasitas_satuan', 'gudang_koordinat_1', 'gudang_koordinat_2',], 'string'],
            [['pemilik_telepon', 'pemilik_fax', 'pemilik_kodepos', 'perusahaan_npwp', 'perusahaan_kodepos', 'perusahaan_telepon', 'perusahaan_fax', 'hs_rt', 'hs_rw', 'gudang_rw', 'gudang_rt', 'gudang_luas', 'gudang_kapasitas', 'gudang_nilai', 'gudang_komposisi_nasional', 'gudang_komposisi_asing', 'gudang_sarana_listrik', 'gudang_sarana_pendingin', 'gudang_kodepos', 'gudang_telepon', 'gudang_fax', 'hs_luas', 'hs_kapasitas', 'hs_nilai', 'hs_komposisi_nasional', 'hs_komposisi_asing', 'hs_sarana_listrik', 'hs_sarana_pendingin'], 'number'],
            [['gudang_imb_tanggal', 'gudang_uug_tanggal', 'gudang_uug_berlaku', 'hs_imb_tanggal', 'hs_uug_tanggal', 'create_date', 'update_date'], 'safe'],
            [['pemilik_nama', 'pemilik_email', 'perusahaan_nama', 'perusahaan_namagedung', 'perusahaan_email', 'gudang_email', 'gudang_imb_nomor', 'gudang_uug_nomor', 'hs_namagedung', 'hs_email', 'hs_imb_nomor', 'hs_uug_nomor'], 'string', 'max' => 100],
            [['pemilik_rt', 'pemilik_rw', 'gudang_rt', 'gudang_rw', 'hs_rt', 'hs_rw'], 'string', 'max' => 3],
            [['pemilik_kodepos', 'perusahaan_kodepos', 'gudang_kodepos', 'hs_per_kodepos', 'hs_kodepos'], 'string', 'max' => 5],
            [['kode_registrasi', 'golongan_gudang_id', 'gudang_jenis'], 'string'],
            [['file'], 'file'],
            [['pemilik_nik'], 'string', 'max' => 16],
            [['perusahaan_npwp'], 'string', 'max' => 15],
            [['gudang_sarana_forklif'], 'string', 'max' => 4],
            [['gudang_sarana_komputer'], 'string', 'max' => 4],
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $lokasi = $this->gudang_kabupaten;
                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi);
                $this->perizinan_id = $pid;
            } else {
                $lokasi = $this->gudang_kabupaten;
                $perizinan = Perizinan::findOne(['referrer_id' => $this->id]);
                $perizinan->lokasi_izin_id = $lokasi;
                if ($_SESSION('UpdatePetugas')) {
                    $session = Yii::$app->session;
                    $session->set('UpdatePetugas', 0);
                } else {
                    $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
                }
                $perizinan->save();
            }
            $model->gudang_luas = str_replace('.', '', $model->gudang_luas);
            $model->gudang_kapasitas = str_replace('.', '', $model->gudang_kapasitas);
            $model->gudang_nilai = str_replace('.', '', $model->gudang_nilai);
            $model->gudang_sarana_listrik = str_replace('.', '', $model->gudang_sarana_listrik);
            $model->gudang_kapasitas_satuan = str_replace('.', '', $model->gudang_kapasitas_satuan);
            $model->gudang_sarana_pendingin = str_replace('.', '', $model->gudang_sarana_pendingin);
            $model->gudang_sarana_forklif = str_replace('.', '', $model->gudang_sarana_forklif);
            $model->gudang_sarana_komputer = str_replace('.', '', $model->gudang_sarana_komputer);

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
        //Pemilik
        $pemilikKab = Lokasi::findOne(['id' => $this->pemilik_kabupaten]);
        $pemilikKel = Lokasi::findOne(['id' => $this->pemilik_kelurahan]);
        $pemilikKec = Lokasi::findOne(['id' => $this->pemilik_kecamatan]);
        $p_prop = Lokasi::findOne(['id' => $this->pemilik_propinsi]);
        $pemilikKab = $pemilikKab->nama;
        $pemilikKel = $pemilikKel->nama;
        $pemilikKec = $pemilikKec->nama;
        $p_prop = $p_prop->nama;
        $kwn = $kwn->nama_negara;
        //Perusahaan	
        $perusahaanKab = Lokasi::findOne(['id' => $this->perusahaan_kabupaten]);
        $perusahaanKel = Lokasi::findOne(['id' => $this->perusahaan_kelurahan]);
        $perusahaanKec = Lokasi::findOne(['id' => $this->perusahaan_kecamatan]);
        $pt_prop = Lokasi::findOne(['id' => $this->perusahaan_propinsi]);
        $perusahaanKab = $perusahaanKab->nama;
        $perusahaanKel = $perusahaanKel->nama;
        $perusahaanKec = $perusahaanKec->nama;
        $pt_prop = $pt_prop->nama;
        //Gudang
        $gudKab = Lokasi::findOne(['id' => $this->pemilik_kabupaten]);
        $gudKel = Lokasi::findOne(['id' => $this->pemilik_kelurahan]);
        $gudKec = Lokasi::findOne(['id' => $this->pemilik_kecamatan]);
        $gudProp = Lokasi::findOne(['id' => $this->pemilik_propinsi]);
        $gudKab = $gudKab->nama;
        $gudKel = $gudKel->nama;
        $gudKec = $gudKec->nama;
        $gudProp = $gudProp->nama;

        $koor = $this->DECtoDMS($this->gudang_koordinat_1, $this->gudang_koordinat_2);
        $koordinat = str_replace('-', '', $koor);

        if ($this->pemilik_nik) {
            $ktp = "KTP: " . $this->pemilik_nik . ",";
        } else {
            $ktp = "";
        }
        if ($this->pemilik_paspor) {
            $paspor = "PASPOR: " . $this->pemilik_paspor . ",";
        } else {
            $paspor = "";
        }
        if ($this->pemilik_kitas) {
            $kitas = "KITAS: " . $this->pemilik_kitas;
        } else {
            $kitas = "";
        }

        $kpk = "$ktp $paspor $kitas";

        $v_kel = \backend\models\Lokasi::getLokasi($this->gudang_kelurahan);
        $get_kelurahan = $v_kel['nama'];

        $v_kec = \backend\models\Lokasi::getLokasi($this->gudang_kecamatan);
        $get_kecamatan = $v_kec['nama'];

        $v_kab = \backend\models\Lokasi::getLokasi($this->gudang_kabupaten);
        $get_kota = $v_kab['nama'];

        $gudang_luas = $this->terbilang($this->gudang_luas);
        $gudang_kapasitas = $this->terbilang($this->gudang_kapasitas);
        $get_gudang_kapasitas = explode('.', $this->gudang_kapasitas);
        $get_gudang_luas = explode('.', $this->gudang_luas);
        $gudang_kapasitas2 = number_format($get_gudang_kapasitas[0], 0, ',', '.');
        $gudang_luas2 = number_format($get_gudang_luas[0], 0, ',', '.');

        $get_gudang_kapasitas2 = explode('.', $this->hs_kapasitas);
        $get_gudang_luas2 = explode('.', $this->hs_luas);
        $gudang_kapasitas3 = number_format($get_gudang_kapasitas2[0], 0, ',', '.');
        $gudang_luas3 = number_format($get_gudang_luas2[0], 0, ',', '.');
        //====================Valid========
        $validasi = $izin->template_valid;
        $validasi = str_replace('{nama}', $this->pemilik_nama, $validasi);

        $validasi = str_replace('{pemilik_ktp_paspor_kitas}', $kpk, $validasi);
        $validasi = str_replace('{pemilik_alamat}', $this->pemilik_alamat . ', ' . $pemilikKel . ', ' . $perusahaanKec . ', ' . $perusahaanKab, $validasi);
        $validasi = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon . ', ' . $this->pemilik_fax . ', ' . $this->pemilik_email, $validasi);
        $validasi = str_replace('{npwp_perusahaan}', $this->perusahaan_npwp, $validasi);
        $validasi = str_replace('{alamat_gudang}', $this->gudang_nilai . ', ' . $this->gudang_blok_lantai . ', ' . $this->gudang_namajalan . ', ' . $get_kelurahan . ', ' . $get_kecamatan . ', ' . $get_kota, $validasi);

        $validasi = str_replace('{titik_koordinat}', $koordinat, $validasi);
        $validasi = str_replace('{telepon_fax_email}', $this->gudang_telepon . ', ' . $this->gudang_fax . ', ' . $this->gudang_email, $validasi);
        $validasi = str_replace('{luas}', $gudang_luas3, $validasi);
        $validasi = str_replace('{terbilang_luas}', $gudang_luas, $validasi);
        $validasi = str_replace('{kapasitas}', $gudang_kapasitas3, $validasi);
        $validasi = str_replace('{satuan_kapasitas}', $this->gudang_kapasitas_satuan, $validasi);
        $validasi = str_replace('{terbilang_kapasitas}', $gudang_kapasitas, $validasi);
        $validasi = str_replace('{kapasitas_huruf}', '', $validasi);
        $validasi = str_replace('{golongan}', $this->gudang_kelengkapan, $validasi);
        //Pemilik 
        $validasi = str_replace('{p_kecamatan}', $pemilikKec, $validasi);
        $validasi = str_replace('{p_kelurahan}', $pemilikKel, $validasi);
        $validasi = str_replace('{p_kabupaten}', $pemilikKab, $validasi);
        $validasi = str_replace('{p_prop}', $p_prop, $validasi);
        //Perusahaan
        $validasi = str_replace('{kecamatan}', $perusahaanKec, $validasi);
        $validasi = str_replace('{kelurahan}', $perusahaanKel, $validasi);
        $validasi = str_replace('{kabupaten}', $perusahaanKab, $validasi);
        $validasi = str_replace('{pt_prop}', $pt_prop, $validasi);
        $validasi = str_replace('{nama_perusahaan}', $this->perusahaan_nama, $validasi);
        $validasi = str_replace('{npwp_perusahaan}', $this->perusahaan_npwp, $validasi);
        $validasi = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $validasi);
        $this->teks_validasi = $validasi;

        //====================preview_sk========
        $preview_sk = str_replace('{nama}', strtoupper($this->pemilik_nama), $izin->template_preview);
        $preview_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $preview_sk);
        $preview_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_sk);
        $preview_sk = str_replace('{pemilik_ktp_paspor_kitas}', $kpk, $preview_sk);
        $preview_sk = str_replace('{pemilik_alamat}', strtoupper($this->pemilik_alamat), $preview_sk);
        $preview_sk = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon . ', ' . $this->pemilik_fax . ', ' . $this->pemilik_email, $preview_sk);
        //$preview_sk = str_replace('{alamat_gudang}', $this->gudang_nilai.', '.$this->gudang_blok_lantai.', '.$this->gudang_namajalan.', '.$get_kelurahan.', '.$get_kecamatan.', '.$get_kota, $preview_sk);
        //$preview_sk = str_replace('{alamat_gudang}', $this->gudang_namagedung. ', '.$this->gudang_blok_lantai.', '.$this->gudang_namajalan, $preview_sk);
        $preview_sk = str_replace('{alamat_gudang}', strtoupper($this->gudang_namajalan), $preview_sk);
        $preview_sk = str_replace('{gudang_nama_gedung}', strtoupper($this->gudang_namagedung), $preview_sk);
        $preview_sk = str_replace('{gudang_blok_lantai}', strtoupper($this->gudang_blok_lantai), $preview_sk);
        $preview_sk = str_replace('{gdg_prop}', $gudProp, $preview_sk);
        $preview_sk = str_replace('{gdg_kab}', strtoupper($gudKab), $preview_sk);
        $preview_sk = str_replace('{gdg_kel}', strtoupper($gudKel), $preview_sk);
        $preview_sk = str_replace('{gdg_kec}', strtoupper($gudKec), $preview_sk);
        $preview_sk = str_replace('{gdg_rt}', $this->gudang_rt, $preview_sk);
        $preview_sk = str_replace('{gdg_rw}', $this->gudang_rw, $preview_sk);
        $preview_sk = str_replace('{titik_koordinat}', $koordinat, $preview_sk);
        $preview_sk = str_replace('{telepon_fax_email}', $this->gudang_telepon . ', ' . $this->gudang_fax . ', ' . $this->gudang_email, $preview_sk);
        $preview_sk = str_replace('{luas}', $gudang_luas2, $preview_sk);
        $preview_sk = str_replace('{terbilang_luas}', $gudang_luas, $preview_sk);
        $preview_sk = str_replace('{kapasitas}', $gudang_kapasitas2, $preview_sk);
        $preview_sk = str_replace('{satuan_kapasitas}', $this->gudang_kapasitas_satuan, $preview_sk);
        $preview_sk = str_replace('{terbilang_kapasitas}', $gudang_kapasitas, $preview_sk);
        $preview_sk = str_replace('{kapasitas_huruf}', '', $preview_sk);
        $preview_sk = str_replace('{golongan}', $this->gudang_kelengkapan, $preview_sk);
        //Pemilik 
        $preview_sk = str_replace('{p_kecamatan}', strtoupper($pemilikKec), $preview_sk);
        $preview_sk = str_replace('{p_kelurahan}', strtoupper($pemilikKel), $preview_sk);
        $preview_sk = str_replace('{p_kabupaten}', strtoupper($pemilikKab), $preview_sk);
        $preview_sk = str_replace('{p_prop}', strtoupper($p_prop), $preview_sk);
        //Perusahaan
        $preview_sk = str_replace('{kecamatan}', strtoupper($perusahaanKec), $preview_sk);
        $preview_sk = str_replace('{kelurahan}', strtoupper($perusahaanKel), $preview_sk);
        $preview_sk = str_replace('{kabupaten}', strtoupper($perusahaanKab), $preview_sk);
        $preview_sk = str_replace('{pt_prop}', strtoupper($pt_prop), $preview_sk);
        $preview_sk = str_replace('{nama_perusahaan}', strtoupper($this->perusahaan_nama), $preview_sk);
        $preview_sk = str_replace('{npwp_perusahaan}', $this->perusahaan_npwp, $preview_sk);
        $preview_sk = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_sk);

        $this->teks_preview = $preview_sk;

        //====================preview data======== 
        $preview_data = str_replace('{nama}', strtoupper($this->pemilik_nama), $izin->preview_data);
        $preview_data = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $preview_data);
        //$preview_data = str_replace('{pemilik_ktp_paspor_kitas}', $kpk, $preview_data);
        $preview_data = str_replace('{nik}', $this->pemilik_nik, $preview_data);
        $preview_data = str_replace('{paspor}', $this->pemilik_paspor, $preview_data);
        $preview_data = str_replace('{kitas}', $this->pemilik_kitas, $preview_data);
        $preview_data = str_replace('{pemilik_alamat}', strtoupper($this->pemilik_alamat), $preview_data);
//		$preview_data = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon.', '.$this->pemilik_fax.', '.$this->pemilik_email, $preview_data);

        $preview_data = str_replace('{titik_koordinat}', $koordinat, $preview_data);
        $preview_data = str_replace('{telepon_fax_email}', $this->gudang_telepon . ', ' . $this->gudang_fax . ', ' . $this->gudang_email, $preview_data);
        $preview_data = str_replace('{luas}', $gudang_luas2, $preview_data);
        $preview_data = str_replace('{terbilang_luas}', $gudang_luas, $preview_data);
        $preview_data = str_replace('{kapasitas}', $gudang_kapasitas2, $preview_data);
        $preview_data = str_replace('{satuan_kapasitas}', $this->gudang_kapasitas_satuan, $preview_data);
        $preview_data = str_replace('{terbilang_kapasitas}', $gudang_kapasitas, $preview_data);
        $preview_data = str_replace('{kapasitas_huruf}', '', $preview_data);
        $preview_data = str_replace('{golongan}', $this->gudang_kelengkapan, $preview_data);

        $preview_data = str_replace('{no_imb}', $this->hs_imb_nomor, $preview_data);
        $preview_data = str_replace('{tgl_imb}', $this->hs_imb_tanggal, $preview_data);

        $preview_data = str_replace('{no_uug}', $this->hs_uug_nomor, $preview_data);
        $preview_data = str_replace('{tgl_sk_uug}', $this->hs_uug_tanggal, $preview_data);
        $preview_data = str_replace('{uug_berlaku}', $this->hs_uug_berlaku, $preview_data);
        //Pemilik 
        $preview_data = str_replace('{p_kecamatan}', strtoupper($pemilikKec), $preview_data);
        $preview_data = str_replace('{p_kelurahan}', strtoupper($pemilikKel), $preview_data);
        $preview_data = str_replace('{p_kabupaten}', strtoupper($pemilikKab), $preview_data);
        $preview_data = str_replace('{p_prop}', strtoupper($p_prop), $preview_data);
        $preview_data = str_replace('{p_tlp}', $this->pemilik_telepon, $preview_data);
        $preview_data = str_replace('{p_fax}', $this->pemilik_fax, $preview_data);
        $preview_data = str_replace('{p_email}', $this->pemilik_email, $preview_data);
        //Perusahaan
        $preview_data = str_replace('{kecamatan}', strtoupper($perusahaanKec), $preview_data);
        $preview_data = str_replace('{kelurahan}', strtoupper($perusahaanKel), $preview_data);
        $preview_data = str_replace('{kabupaten}', strtoupper($perusahaanKab), $preview_data);
        $preview_data = str_replace('{pt_prop}', strtoupper($pt_prop), $preview_data);
        $preview_data = str_replace('{tlp}', $this->perusahaan_telepon, $preview_data);
        $preview_data = str_replace('{fax}', $this->perusahaan_fax, $preview_data);
        $preview_data = str_replace('{email}', $this->perusahaan_email, $preview_data);
        $preview_data = str_replace('{nama_perusahaan}', strtoupper($this->perusahaan_nama), $preview_data);
        $preview_data = str_replace('{alamat_perusahaan}', $this->perusahaan_namajalan, $preview_data);
        $preview_data = str_replace('{npwp_perusahaan}', $this->perusahaan_npwp, $preview_data);
        $preview_data = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $preview_data);
        //Gudang
        //$preview_data = str_replace('{alamat_gudang}', $this->gudang_namagedung. ', '.$this->gudang_blok_lantai.', '.$this->gudang_namajalan, $preview_data);
        $preview_data = str_replace('{alamat_gudang}', strtoupper($this->gudang_namajalan), $preview_data);
        $preview_data = str_replace('{gudang_nama_gedung}', strtoupper($this->gudang_namagedung), $preview_data);
        $preview_data = str_replace('{gudang_blok_lantai}', strtoupper($this->gudang_blok_lantai), $preview_data);
        $preview_data = str_replace('{gdg_prop}', strtoupper($gudProp), $preview_data);
        $preview_data = str_replace('{gdg_kab}', strtoupper($gudKab), $preview_data);
        $preview_data = str_replace('{gdg_kel}', strtoupper($gudKel), $preview_data);
        $preview_data = str_replace('{gdg_kec}', strtoupper($gudKec), $preview_data);
        $preview_data = str_replace('{gdg_rt}', $this->gudang_rt, $preview_data);
        $preview_data = str_replace('{gdg_rw}', $this->gudang_rw, $preview_data);
        $preview_data = str_replace('{gdg_tlp}', $this->gudang_telepon, $preview_data);
        $preview_data = str_replace('{gdg_fax}', $this->gudang_fax, $preview_data);
        $preview_data = str_replace('{gdg_email}', $this->gudang_email, $preview_data);
        $preview_data = str_replace('{gdg_nilai}', $this->gudang_nilai, $preview_data);
        $preview_data = str_replace('{gdg_nasional}', $this->gudang_komposisi_nasional, $preview_data);
        $preview_data = str_replace('{gdg_asing}', $this->gudang_komposisi_asing, $preview_data);
        $preview_data = str_replace('{gdg_listrik}', $this->gudang_sarana_listrik, $preview_data);
        $preview_data = str_replace('{gdg_air}', $this->gudang_sarana_air, $preview_data);
        $preview_data = str_replace('{gdg_ac}', $this->gudang_sarana_pendingin, $preview_data);
        $preview_data = str_replace('{gdg_forklif}', $this->gudang_sarana_forklif, $preview_data);
        $preview_data = str_replace('{gdg_komp}', $this->gudang_sarana_komputer, $preview_data);

        $this->preview_data = $preview_data;

        //====================template_sk========
        $teks_sk = $izin->template_sk;
        $koor = $this->DECtoDMS($this->hs_koordinat_1, $this->hs_koordinat_2);
        $koordinat = str_replace('-', '', $koor);

        $teks_sk = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $teks_sk);
        $teks_sk = str_replace('{nama}', strtoupper($this->pemilik_nama), $teks_sk);
        $teks_sk = str_replace('{no_izin}', $perizinan->no_izin, $teks_sk);
        $teks_sk = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $teks_sk);
        $teks_sk = str_replace('{pemilik_ktp_paspor_kitas}', $kpk, $teks_sk);
        $teks_sk = str_replace('{pemilik_alamat}', strtoupper($this->pemilik_alamat), $teks_sk);
        $teks_sk = str_replace('{pemilik_telepon_fax_email}', $this->pemilik_telepon . ', ' . $this->pemilik_fax . ', ' . $this->pemilik_email, $teks_sk);
//		$teks_sk = str_replace('{alamat_gudang}', $this->hs_blok_lantai.', '.$this->hs_namajalan, $teks_sk);
        $teks_sk = str_replace('{alamat_gudang}', strtoupper($this->gudang_namajalan), $teks_sk);
        $teks_sk = str_replace('{gudang_nama_gedung}', strtoupper($this->gudang_namagedung), $teks_sk);
        $teks_sk = str_replace('{gudang_blok_lantai}', strtoupper($this->gudang_blok_lantai), $teks_sk);
        $teks_sk = str_replace('{gdg_prop}', $gudProp, $teks_sk);
        $teks_sk = str_replace('{gdg_kab}', $gudKab, $teks_sk);
        $teks_sk = str_replace('{gdg_kel}', $gudKel, $teks_sk);
        $teks_sk = str_replace('{gdg_kec}', $gudKec, $teks_sk);
        $teks_sk = str_replace('{gdg_rt}', $this->gudang_rt, $teks_sk);
        $teks_sk = str_replace('{gdg_rw}', $this->gudang_rw, $teks_sk);
        $teks_sk = str_replace('{titik_koordinat}', $koordinat, $teks_sk);
        $teks_sk = str_replace('{telepon_fax_email}', $this->hs_telepon . ', ' . $this->hs_fax . ', ' . $this->hs_email, $teks_sk);
        $teks_sk = str_replace('{luas}', $gudang_luas3, $teks_sk);
        $teks_sk = str_replace('{terbilang_luas}', $gudang_luas, $teks_sk);
        $teks_sk = str_replace('{kapasitas}', $gudang_kapasitas3, $teks_sk);
        $teks_sk = str_replace('{satuan_kapasitas}', $this->hs_kapasitas_satuan, $teks_sk);
        $teks_sk = str_replace('{terbilang_kapasitas}', $gudang_kapasitas, $teks_sk);
        $teks_sk = str_replace('{golongan}', $this->hs_kelengkapan, $teks_sk);
        $teks_sk = str_replace('{tanggal_sekarang}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $teks_sk);
        //Pemilik 
        $teks_sk = str_replace('{p_kecamatan}', strtoupper($pemilikKec), $teks_sk);
        $teks_sk = str_replace('{p_kelurahan}', strtoupper($pemilikKel), $teks_sk);
        $teks_sk = str_replace('{p_kabupaten}', strtoupper($pemilikKab), $teks_sk);
        $teks_sk = str_replace('{p_prop}', strtoupper($p_prop), $teks_sk);
        //Perusahaan
        $teks_sk = str_replace('{kecamatan}', strtoupper($perusahaanKec), $teks_sk);
        $teks_sk = str_replace('{kelurahan}', strtoupper($perusahaanKel), $teks_sk);
        $teks_sk = str_replace('{kabupaten}', strtoupper($perusahaanKab), $teks_sk);
        $teks_sk = str_replace('{pt_prop}', $pt_prop, $teks_sk);
        $teks_sk = str_replace('{nama_perusahaan}', strtoupper($this->perusahaan_nama), $teks_sk);
        $teks_sk = str_replace('{npwp_perusahaan}', $this->perusahaan_npwp, $teks_sk);
        $teks_sk = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $teks_sk);
        if ($perizinan->plh_id == NULL) {
            $teks_sk = str_replace('{plh}', "", $teks_sk);
        } else {
            $teks_sk = str_replace('{plh}', "PLH", $teks_sk);
        }
        if ($perizinan->no_izin !== null) {
            $user = \dektrium\user\models\User::findIdentity($perizinan->pengesah_id);
            $teks_sk = str_replace('{no_izin}', $perizinan->no_izin, $teks_sk);
            $teks_sk = str_replace('{nm_kepala}', strtoupper($user->profile->name), $teks_sk);
            $teks_sk = str_replace('{nip_kepala}', $user->no_identitas, $teks_sk);
            $teks_sk = str_replace('{expired}', Yii::$app->formatter->asDate($perizinan->tanggal_expired, 'php: d F Y'), $teks_sk);
        }
        $this->teks_sk = $teks_sk;
        //================================== Penolakan
        //Samuel
        $sk_penolakan = $izin->template_penolakan;

        $kantorByReg = \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_izin_id]);
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);

        $sk_penolakan = str_replace('{logo}', '<img src="' . Yii::getAlias('@front') . '/uploads/logo/LogoDKI.jpg" width="98px" height="109px"/>', $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_kantor}', $kantorByReg->alamat, $sk_penolakan);
        $sk_penolakan = str_replace('{kpos}', $kantorByReg->kodepos, $sk_penolakan);
        //$sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate(date('d M Y'), 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{tgl_surat}', Yii::$app->formatter->asDate($perizinan->tanggal_izin, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{no_sk}', $perizinan->no_izin, $sk_penolakan);
        $sk_penolakan = str_replace('{nama}', strtoupper($this->pemilik_nama), $sk_penolakan);

//        $sk_penolakan = str_replace('{kabupaten}', $this->nama_kabkota, $sk_penolakan);
//        $sk_penolakan = str_replace('{kecamatan}', $this->nama_kecamatan, $sk_penolakan);
//        $sk_penolakan = str_replace('{kelurahan}', $this->nama_kelurahan, $sk_penolakan);
        $sk_penolakan = str_replace('{telepon}', $kantorByReg->telepon, $sk_penolakan);
        $sk_penolakan = str_replace('{namaKantor}', strtoupper($kantorByReg->nama), $sk_penolakan);
        $sk_penolakan = str_replace('{fax}', $kantorByReg->fax, $sk_penolakan);
        $sk_penolakan = str_replace('{email}', $kantorByReg->email_jak_go_id, $sk_penolakan);


        $sk_penolakan = str_replace('{nama_perusahaan}', strtoupper($this->perusahaan_nama), $sk_penolakan);
        $sk_penolakan = str_replace('{alamat_perusahaan}', $this->perusahaan_namajalan, $sk_penolakan);
        $sk_penolakan = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $sk_penolakan);
        $sk_penolakan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $sk_penolakan);
        $sk_penolakan = str_replace('{nama_izin}', $izin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{keterangan}', $alasan->keterangan, $sk_penolakan);

        $sk_penolakan = str_replace('{namawil}', $tempat_izin . '&nbsp;' . $perizinan->lokasiIzin->nama, $sk_penolakan);
        $sk_penolakan = str_replace('{nama_kepala}', strtoupper($user->profile->name), $sk_penolakan);
        $sk_penolakan = str_replace('{nip_kepala}', $user->no_identitas, $sk_penolakan);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        if ($perizinan->plh_id == NULL) {
            $sk_penolakan = str_replace('{plh}', "", $sk_penolakan);
        } else {
            $sk_penolakan = str_replace('{plh}', "PLH", $sk_penolakan);
        }

        $this->teks_penolakan = $sk_penolakan;

        //----------------surat pengurusan--------------------
        $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan'])->value;
        $pengurusan = str_replace('{nik}', $this->pemilik_nik, $pengurusan);
        $pengurusan = str_replace('{jabatan}', strtoupper('Tidak ada'), $pengurusan);
        $pengurusan = str_replace('{nama}', strtoupper($this->pemilik_nama), $pengurusan);
        $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
        $this->surat_pengurusan = $pengurusan;

        //----------------surat Kuasa--------------------
        $kuasa = \backend\models\Params::findOne(['name' => 'Surat Kuasa Perorangan'])->value;
        $kuasa = str_replace('{nik}', $this->pemilik_nik, $kuasa);
        $kuasa = str_replace('{alamat}', strtoupper($this->pemilik_alamat), $kuasa);
        $kuasa = str_replace('{nama}', strtoupper($this->pemilik_nama), $kuasa);
        $kuasa = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $kuasa);
        $this->surat_kuasa = $kuasa;
        //----------------surat pengurusan--------------------
        $pengurusan = \backend\models\Params::findOne(['name' => 'Surat Pengurusan Perorangan'])->value;
        $pengurusan = str_replace('{nik}', $this->pemilik_nik, $pengurusan);
        $pengurusan = str_replace('{alamat}', strtoupper($this->pemilik_alamat), $pengurusan);
        $pengurusan = str_replace('{nama}', strtoupper($this->pemilik_nama), $pengurusan);
        $pengurusan = str_replace('{tanggal_mohon}', Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y'), $pengurusan);
        $this->surat_pengurusan = $pengurusan;

        //----------------daftar--------------------
        $daftar = \backend\models\Params::findOne(['name' => 'Tanda Registrasi'])->value;
        $daftar = str_replace('{kode_registrasi}', $perizinan->kode_registrasi, $daftar);
        $daftar = str_replace('{nama_izin}', $izin->nama, $daftar);
        $daftar = str_replace('{npwp}', $this->perusahaan_npwp, $daftar);
        $daftar = str_replace('{nama_ph}', $this->perusahaan_nama, $daftar);
        $daftar = str_replace('{kantor_ptsp}', $tempat_ambil . '&nbsp;' . $perizinan->lokasiPengambilan->nama, $daftar);
        $daftar = str_replace('{tanggal}', Yii::$app->formatter->asDate($perizinan->pengambilan_tanggal, 'php: l, d F Y'), $daftar);
        $daftar = str_replace('{sesi}', $perizinan->pengambilan_sesi, $daftar);
        $daftar = str_replace('{waktu}', \backend\models\Params::findOne($perizinan->pengambilan_sesi)->value, $daftar);
        $daftar = str_replace('{alamat}', \backend\models\Kantor::findOne(['lokasi_id' => $perizinan->lokasi_pengambilan_id])->alamat, $daftar);
        $this->tanda_register = $daftar;
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

    function terbilang($satuan) {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");

        if ($satuan < 12) {
            return " " . $huruf[$satuan];
        } elseif ($satuan < 20) {
            return $this->terbilang($satuan - 10) . " belas";
        } elseif ($satuan < 100) {
            return $this->terbilang($satuan / 10) . " puluh" . $this->terbilang($satuan % 10);
        } elseif ($satuan < 200) {
            return "seratus" . $this->terbilang($satuan - 100);
        } elseif ($satuan < 1000) {
            return $this->terbilang($satuan / 100) . " ratus" . $this->terbilang($satuan % 100);
        } elseif ($satuan < 2000) {
            return "seribu" . $this->terbilang($satuan - 1000);
        } elseif ($satuan < 1000000) {
            return $this->terbilang($satuan / 1000) . " ribu" . $this->terbilang($satuan % 1000);
        } elseif ($satuan < 1000000000) {
            return $this->terbilang($satuan / 1000000) . " juta" . $this->terbilang($satuan % 1000000);
        }
    }

}
