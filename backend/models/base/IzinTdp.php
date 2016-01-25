<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdp".
 *
 * @property string $id
 * @property string $bentuk_perusahaan
 * @property integer $perizinan_id
 * @property integer $izin_id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $lokasi_id
 * @property integer $perpanjangan_ke
 * @property string $i_1_pemilik_nama
 * @property string $i_2_pemilik_tpt_lahir
 * @property string $i_2_pemilik_tgl_lahir
 * @property string $i_3_pemilik_alamat
 * @property integer $i_3_pemilik_propinsi
 * @property integer $i_3_pemilik_kabupaten
 * @property integer $i_3_pemilik_kecamatan
 * @property integer $i_3_pemilik_kelurahan
 * @property string $i_4_pemilik_telepon
 * @property string $i_5_pemilik_no_ktp
 * @property integer $i_6_pemilik_kewarganegaraan
 * @property string $ii_1_perusahaan_nama
 * @property string $ii_2_perusahaan_alamat
 * @property integer $ii_2_perusahaan_propinsi
 * @property integer $ii_2_perusahaan_kabupaten
 * @property integer $ii_2_perusahaan_kecamatan
 * @property integer $ii_2_perusahaan_kelurahan
 * @property string $ii_2_perusahaan_kodepos
 * @property string $ii_2_perusahaan_no_telp
 * @property string $ii_2_perusahaan_no_fax
 * @property string $ii_2_perusahaan_email
 * @property string $iii_1_nama_kelompok
 * @property string $iii_2_status_prsh
 * @property string $iii_2_induk_nama_prsh
 * @property string $iii_2_induk_nomor_tdp
 * @property string $iii_2_induk_alamat
 * @property integer $iii_2_induk_propinsi
 * @property integer $iii_2_induk_kabupaten
 * @property integer $iii_2_induk_kecamatan
 * @property integer $iii_2_induk_kelurahan
 * @property string $iii_3_lokasi_unit_produksi
 * @property integer $iii_3_lokasi_unit_produksi_propinsi
 * @property integer $iii_3_lokasi_unit_produksi_kabupaten
 * @property integer $iii_4_bank_utama_1
 * @property integer $iii_4_bank_utama_2
 * @property integer $iii_4_jumlah_bank
 * @property string $iii_5_npwp
 * @property string $iii_6_status_perusahaan_id
 * @property string $iii_7a_tgl_pendirian
 * @property string $iii_7b_tgl_mulai_kegiatan
 * @property integer $iii_8_bentuk_kerjasama_pihak3
 * @property string $iii_9a_merek_dagang_nama
 * @property string $iii_9a_merek_dagang_nomor
 * @property string $iii_9b_hak_paten_nama
 * @property string $iii_9b_hak_paten_nomor
 * @property string $iii_9c_hak_cipta_nama
 * @property string $iii_9c_hak_cipta_nomor
 * @property string $iv_a1_nomor
 * @property string $iv_a1_tanggal
 * @property string $iv_a1_notaris_nama
 * @property string $iv_a1_notaris_alamat
 * @property string $iv_a1_telpon
 * @property string $iv_a2_nomor
 * @property string $iv_a2_tanggal
 * @property string $iv_a2_notaris
 * @property string $iv_a3_nomor
 * @property string $iv_a3_tanggal
 * @property string $iv_a4_nomor
 * @property string $iv_a4_tanggal
 * @property string $iv_a5_nomor
 * @property string $iv_a5_tanggal
 * @property string $iv_a6_nomor
 * @property string $iv_a6_tanggal
 * @property integer $v_jumlah_dirut
 * @property integer $v_jumlah_direktur
 * @property integer $v_jumlah_komisaris
 * @property integer $v_jumlah_pengurus
 * @property integer $v_jumlah_pengawas
 * @property integer $v_jumlah_sekutu_aktif
 * @property integer $v_jumlah_sekutu_pasif
 * @property integer $v_jumlah_sekutu_aktif_baru
 * @property integer $v_jumlah_sekutu_pasif_baru
 * @property integer $vi_jumlah_pemegang_saham
 * @property double $vii_b_omset
 * @property string $vii_b_terbilang
 * @property double $vii_c1_dasar
 * @property double $vii_c2_ditempatkan
 * @property double $vii_c3_disetor
 * @property double $vii_c4_saham
 * @property double $vii_c5_nominal
 * @property double $vii_c6_aktif
 * @property double $vii_c7_pasif
 * @property double $vii_d_totalaset
 * @property integer $vii_e_wni
 * @property integer $vii_e_wna
 * @property integer $vii_f_matarantai
 * @property double $vii_fa_jumlah
 * @property integer $vii_fa_satuan
 * @property double $vii_fb_jumlah
 * @property integer $vii_fb_satuan
 * @property string $vii_fc_lokal
 * @property string $vii_fc_impor
 * @property string $vii_f_pengecer
 * @property integer $viii_jenis_perusahaan
 * @property integer $create_by
 * @property string $create_date
 * @property integer $update_by
 * @property string $update_date
 *
 * @property \backend\models\BentukPerusahaan $bentukPerusahaan
 * @property \backend\models\Izin $izin
 * @property \backend\models\Lokasi $lokasi
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Satuan $viiFaSatuan
 * @property \backend\models\Status $status
 * @property \backend\models\StatusPerusahaan $iii6StatusPerusahaan
 * @property \backend\models\User $user
 * @property \backend\models\IzinTdpKantorcabang[] $izinTdpKantorcabangs
 * @property \backend\models\IzinTdpKegiatan[] $izinTdpKegiatans
 * @property \backend\models\IzinTdpLegal[] $izinTdpLegals
 * @property \backend\models\IzinTdpPimpinan[] $izinTdpPimpinans
 * @property \backend\models\IzinTdpSaham[] $izinTdpSahams
 */
class IzinTdp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bentuk_perusahaan' => Yii::t('app', 'Bentuk Perusahaan'),
            'perizinan_id' => Yii::t('app', 'Perizinan ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
            'perpanjangan_ke' => Yii::t('app', 'Perpanjangan Ke'),
            'i_1_pemilik_nama' => Yii::t('app', 'Nama Pengurus/ Penanggungjawab'),
            'i_2_pemilik_tpt_lahir' => Yii::t('app', 'Tempat Lahir'),
            'i_2_pemilik_tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'i_3_pemilik_alamat' => Yii::t('app', 'Alamat'),
            'i_3_pemilik_propinsi' => Yii::t('app', 'Propinsi'),
            'i_3_pemilik_kabupaten' => Yii::t('app', 'Kabupaten'),
            'i_3_pemilik_kecamatan' => Yii::t('app', 'Kecamatan'),
            'i_3_pemilik_kelurahan' => Yii::t('app', 'Kelurahan'),
            'i_4_pemilik_telepon' => Yii::t('app', 'Telepon'),
            'i_5_pemilik_no_ktp' => Yii::t('app', 'Nomor KTP'),
            'i_6_pemilik_kewarganegaraan' => Yii::t('app', 'Kewarganegaraan'),
            'ii_1_perusahaan_nama' => Yii::t('app', 'Nama Perusahaan'),
            'ii_2_perusahaan_alamat' => Yii::t('app', 'Alamat Perusahaan'),
            'ii_2_perusahaan_propinsi' => Yii::t('app', 'Propinsi'),
            'ii_2_perusahaan_kabupaten' => Yii::t('app', 'Kabupaten'),
            'ii_2_perusahaan_kecamatan' => Yii::t('app', 'Kecamatan'),
            'ii_2_perusahaan_kelurahan' => Yii::t('app', 'Kelurahan'),
            'ii_2_perusahaan_kodepos' => Yii::t('app', 'Kodepos'),
            'ii_2_perusahaan_no_telp' => Yii::t('app', 'No Telp'),
            'ii_2_perusahaan_no_fax' => Yii::t('app', 'No Fax'),
            'ii_2_perusahaan_email' => Yii::t('app', 'E-mail'),
            'iii_1_nama_kelompok' => Yii::t('app', 'Nama Kelompok Perusahaan/Group (bila ada)'),
            'iii_2_status_prsh' => Yii::t('app', 'Status Perusahaan'),
            'iii_2_induk_nama_prsh' => Yii::t('app', 'Nama Perusahaan Induk'),
            'iii_2_induk_nomor_tdp' => Yii::t('app', 'Nomor TDP'),
            'iii_2_induk_alamat' => Yii::t('app', 'Alamat Perusahaan Induk'),
            'iii_2_induk_propinsi' => Yii::t('app', 'Propinsi'),
            'iii_2_induk_kabupaten' => Yii::t('app', 'Kabupaten'),
            'iii_2_induk_kecamatan' => Yii::t('app', 'Kecamatan'),
            'iii_2_induk_kelurahan' => Yii::t('app', 'Kelurahan'),
            'iii_3_lokasi_unit_produksi' => Yii::t('app', 'Lokasi Unit Produksi (apabila ada)'),
            'iii_3_lokasi_unit_produksi_propinsi' => Yii::t('app', 'Lokasi Unit Produksi Propinsi'),
            'iii_3_lokasi_unit_produksi_kabupaten' => Yii::t('app', 'Lokasi Unit Produksi Kabupaten'),
            'iii_4_bank_utama_1' => Yii::t('app', 'Bank Utama 1'),
            'iii_4_bank_utama_2' => Yii::t('app', 'Bank Utama 2'),
            'iii_4_jumlah_bank' => Yii::t('app', 'Jumlah Bank dimana perusahaan ini menjadi nasabah'),
            'iii_5_npwp' => Yii::t('app', 'NPWP'),
            'iii_6_status_perusahaan_id' => Yii::t('app', 'Bentuk Penanaman Modal'),
            'iii_7a_tgl_pendirian' => Yii::t('app', 'Tanggal Pendirian'),
            'iii_7b_tgl_mulai_kegiatan' => Yii::t('app', 'Tanggal Mulai Kegiatan'),
            'iii_8_bentuk_kerjasama_pihak3' => Yii::t('app', 'Bentuk Kerjasama Pihak Ketiga (apabila ada)'),
            'iii_9a_merek_dagang_nama' => Yii::t('app', 'Merek Dagang (apabila ada)'),
            'iii_9a_merek_dagang_nomor' => Yii::t('app', 'No.'),
            'iii_9b_hak_paten_nama' => Yii::t('app', 'Pemegang Hak Paten (apabila ada)'),
            'iii_9b_hak_paten_nomor' => Yii::t('app', 'No.'),
            'iii_9c_hak_cipta_nama' => Yii::t('app', 'Pemegang Hak Cipta (apabila ada)'),
            'iii_9c_hak_cipta_nomor' => Yii::t('app', 'No.'),
            'iv_a1_nomor' => Yii::t('app', 'Nomor'),
            'iv_a1_tanggal' => Yii::t('app', 'Tanggal Pengesahan'),
            'iv_a1_notaris_nama' => Yii::t('app', 'Nama Notaris'),
            'iv_a1_notaris_alamat' => Yii::t('app', 'Alamat'),
            'iv_a1_telpon' => Yii::t('app', 'No. Telpon'),
            'iv_a2_nomor' => Yii::t('app', 'Nomor'),
            'iv_a2_tanggal' => Yii::t('app', 'Tanggal Pengesahan'),
            'iv_a2_notaris' => Yii::t('app', 'Nama Notaris'),
            'iv_a3_nomor' => Yii::t('app', 'Nomor'),
            'iv_a3_tanggal' => Yii::t('app', 'Tanggal Pengesahan'),
            'iv_a4_nomor' => Yii::t('app', 'Nomor'),
            'iv_a4_tanggal' => Yii::t('app', 'Tanggal Pengesahan'),
            'iv_a5_nomor' => Yii::t('app', 'Nomor'),
            'iv_a5_tanggal' => Yii::t('app', 'Tanggal Pengesahan'),
            'iv_a6_nomor' => Yii::t('app', 'Nomor'),
            'iv_a6_tanggal' => Yii::t('app', 'Tanggal Pengesahan'),
            'v_jumlah_dirut' => Yii::t('app', 'Dirut/Dir.Cabang/Penanggungjawab'),
            'v_jumlah_direktur' => Yii::t('app', 'Direktur'),
            'v_jumlah_komisaris' => Yii::t('app', 'Komisaris'),
            'v_jumlah_pengurus' => Yii::t('app', 'Pengurus'),
            'v_jumlah_pengawas' => Yii::t('app', 'Pengawas'),
            'v_jumlah_sekutu_aktif' => Yii::t('app', 'V Jumlah Sekutu Aktif'),
            'v_jumlah_sekutu_pasif' => Yii::t('app', 'V Jumlah Sekutu Pasif'),
            'v_jumlah_sekutu_aktif_baru' => Yii::t('app', 'V Jumlah Sekutu Aktif Baru'),
            'v_jumlah_sekutu_pasif_baru' => Yii::t('app', 'V Jumlah Sekutu Pasif Baru'),
            'vi_jumlah_pemegang_saham' => Yii::t('app', 'Jumlah Pemegang Saham (Selain Komisaris dan Direktur)'),
            'vii_b_omset' => Yii::t('app', 'Omset perusahaan ini per tahun (setelah perusahaan beroprasi)'),
            'vii_b_terbilang' => Yii::t('app', 'Terbilang'),
            'vii_c1_dasar' => Yii::t('app', 'Modal Dasar'),
            'vii_c2_ditempatkan' => Yii::t('app', 'Modal Ditempatkan'),
            'vii_c3_disetor' => Yii::t('app', 'Modal Disetor'),
            'vii_c4_saham' => Yii::t('app', 'Banyaknya Saham (lembar)'),
            'vii_c5_nominal' => Yii::t('app', 'Nilai Nominal per Saham'),
            'vii_c6_aktif' => Yii::t('app', 'Vii C6 Aktif'),
            'vii_c7_pasif' => Yii::t('app', 'Vii C7 Pasif'),
            'vii_d_totalaset' => Yii::t('app', 'Total Asset (setelah perusahaan beroprasi)'),
            'vii_e_wni' => Yii::t('app', 'WNI'),
            'vii_e_wna' => Yii::t('app', 'WNA'),
            'vii_f_matarantai' => Yii::t('app', 'Kedudukan dalam  mata rantai kegiatan usaha'),
            'vii_fa_jumlah' => Yii::t('app', 'Kapasitas Terpasang'),
            'vii_fa_satuan' => Yii::t('app', 'Satuan'),
            'vii_fb_jumlah' => Yii::t('app', 'Kapasitas Produksi per Tahun'),
            'vii_fb_satuan' => Yii::t('app', 'Satuan'),
            'vii_fc_lokal' => Yii::t('app', 'Lokal'),
            'vii_fc_impor' => Yii::t('app', 'Impor'),
            'vii_f_pengecer' => Yii::t('app', 'Jenis Usaha Pengecer'),
            'viii_jenis_perusahaan' => Yii::t('app', 'Jenis Perusahaan'),
            'create_by' => Yii::t('app', 'Create By'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_by' => Yii::t('app', 'Update By'),
            'update_date' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBentukPerusahaan()
    {
        return $this->hasOne(\backend\models\BentukPerusahaan::className(), ['id' => 'bentuk_perusahaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinan()
    {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'perizinan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViiFaSatuan()
    {
        return $this->hasOne(\backend\models\Satuan::className(), ['id' => 'vii_fa_satuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\backend\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIii6StatusPerusahaan()
    {
        return $this->hasOne(\backend\models\StatusPerusahaan::className(), ['id' => 'iii_6_status_perusahaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpKantorcabangs()
    {
        return $this->hasMany(\backend\models\IzinTdpKantorcabang::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpKegiatans()
    {
        return $this->hasMany(\backend\models\IzinTdpKegiatan::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpLegals()
    {
        return $this->hasMany(\backend\models\IzinTdpLegal::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpPimpinans()
    {
        return $this->hasMany(\backend\models\IzinTdpPimpinan::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpSahams()
    {
        return $this->hasMany(\backend\models\IzinTdpSaham::className(), ['izin_tdp_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpQuery(get_called_class());
    }
}
