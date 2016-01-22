<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdp;

/**
 * backend\models\IzinTdpSearch represents the model behind the search form about `backend\models\IzinTdp`.
 */
 class IzinTdpSearch extends IzinTdp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bentuk_perusahaan', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'perpanjangan_ke', 'i_3_pemilik_propinsi', 'i_3_pemilik_kabupaten', 'i_3_pemilik_kecamatan', 'i_3_pemilik_kelurahan', 'i_6_pemilik_kewarganegaraan', 'ii_2_perusahaan_propinsi', 'ii_2_perusahaan_kabupaten', 'ii_2_perusahaan_kecamatan', 'ii_2_perusahaan_kelurahan', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_4_jumlah_bank', 'iii_6_status_perusahaan_id', 'iii_8_bentuk_kerjasama_pihak3', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'v_jumlah_pengurus', 'v_jumlah_pengawas', 'v_jumlah_sekutu_aktif', 'v_jumlah_sekutu_pasif', 'v_jumlah_sekutu_aktif_baru', 'v_jumlah_sekutu_pasif_baru', 'vi_jumlah_pemegang_saham', 'vii_e_wni', 'vii_e_wna', 'vii_f_matarantai', 'vii_fa_satuan', 'vii_fb_satuan', 'viii_jenis_perusahaan', 'create_by', 'update_by'], 'integer'],
            [['i_1_pemilik_nama', 'i_2_pemilik_tpt_lahir', 'i_2_pemilik_tgl_lahir', 'i_3_pemilik_alamat', 'i_4_pemilik_telepon', 'i_5_pemilik_no_ktp', 'ii_1_perusahaan_nama', 'ii_2_perusahaan_alamat', 'ii_2_perusahaan_kodepos', 'ii_2_perusahaan_no_telp', 'ii_2_perusahaan_no_fax', 'ii_2_perusahaan_email', 'iii_1_nama_kelompok', 'iii_2_status_prsh', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_5_npwp', 'iii_7a_tgl_pendirian', 'iii_7b_tgl_mulai_kegiatan', 'iii_9a_merek_dagang_nama', 'iii_9a_merek_dagang_nomor', 'iii_9b_hak_paten_nama', 'iii_9b_hak_paten_nomor', 'iii_9c_hak_cipta_nama', 'iii_9c_hak_cipta_nomor', 'iv_a1_nomor', 'iv_a1_tanggal', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_nomor', 'iv_a2_tanggal', 'iv_a2_notaris', 'iv_a3_nomor', 'iv_a3_tanggal', 'iv_a4_nomor', 'iv_a4_tanggal', 'iv_a5_nomor', 'iv_a5_tanggal', 'iv_a6_nomor', 'iv_a6_tanggal', 'vii_b_terbilang', 'vii_f_pengecer', 'create_date', 'update_date'], 'safe'],
            [['vii_b_omset', 'vii_c1_dasar', 'vii_c2_ditempatkan', 'vii_c3_disetor', 'vii_c4_saham', 'vii_c5_nominal', 'vii_c6_aktif', 'vii_c7_pasif', 'vii_d_totalaset', 'vii_fa_jumlah', 'vii_fb_jumlah', 'vii_fc_lokal', 'vii_fc_impor'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = IzinTdp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'bentuk_perusahaan' => $this->bentuk_perusahaan,
            'perizinan_id' => $this->perizinan_id,
            'izin_id' => $this->izin_id,
            'user_id' => $this->user_id,
            'status_id' => $this->status_id,
            'lokasi_id' => $this->lokasi_id,
            'perpanjangan_ke' => $this->perpanjangan_ke,
            'i_2_pemilik_tgl_lahir' => $this->i_2_pemilik_tgl_lahir,
            'i_3_pemilik_propinsi' => $this->i_3_pemilik_propinsi,
            'i_3_pemilik_kabupaten' => $this->i_3_pemilik_kabupaten,
            'i_3_pemilik_kecamatan' => $this->i_3_pemilik_kecamatan,
            'i_3_pemilik_kelurahan' => $this->i_3_pemilik_kelurahan,
            'i_6_pemilik_kewarganegaraan' => $this->i_6_pemilik_kewarganegaraan,
            'ii_2_perusahaan_propinsi' => $this->ii_2_perusahaan_propinsi,
            'ii_2_perusahaan_kabupaten' => $this->ii_2_perusahaan_kabupaten,
            'ii_2_perusahaan_kecamatan' => $this->ii_2_perusahaan_kecamatan,
            'ii_2_perusahaan_kelurahan' => $this->ii_2_perusahaan_kelurahan,
            'iii_2_induk_propinsi' => $this->iii_2_induk_propinsi,
            'iii_2_induk_kabupaten' => $this->iii_2_induk_kabupaten,
            'iii_2_induk_kecamatan' => $this->iii_2_induk_kecamatan,
            'iii_2_induk_kelurahan' => $this->iii_2_induk_kelurahan,
            'iii_3_lokasi_unit_produksi_propinsi' => $this->iii_3_lokasi_unit_produksi_propinsi,
            'iii_3_lokasi_unit_produksi_kabupaten' => $this->iii_3_lokasi_unit_produksi_kabupaten,
            'iii_4_bank_utama_1' => $this->iii_4_bank_utama_1,
            'iii_4_bank_utama_2' => $this->iii_4_bank_utama_2,
            'iii_4_jumlah_bank' => $this->iii_4_jumlah_bank,
            'iii_6_status_perusahaan_id' => $this->iii_6_status_perusahaan_id,
            'iii_7a_tgl_pendirian' => $this->iii_7a_tgl_pendirian,
            'iii_7b_tgl_mulai_kegiatan' => $this->iii_7b_tgl_mulai_kegiatan,
            'iii_8_bentuk_kerjasama_pihak3' => $this->iii_8_bentuk_kerjasama_pihak3,
            'iv_a1_tanggal' => $this->iv_a1_tanggal,
            'iv_a2_tanggal' => $this->iv_a2_tanggal,
            'iv_a3_tanggal' => $this->iv_a3_tanggal,
            'iv_a4_tanggal' => $this->iv_a4_tanggal,
            'iv_a5_tanggal' => $this->iv_a5_tanggal,
            'iv_a6_tanggal' => $this->iv_a6_tanggal,
            'v_jumlah_dirut' => $this->v_jumlah_dirut,
            'v_jumlah_direktur' => $this->v_jumlah_direktur,
            'v_jumlah_komisaris' => $this->v_jumlah_komisaris,
            'v_jumlah_pengurus' => $this->v_jumlah_pengurus,
            'v_jumlah_pengawas' => $this->v_jumlah_pengawas,
            'v_jumlah_sekutu_aktif' => $this->v_jumlah_sekutu_aktif,
            'v_jumlah_sekutu_pasif' => $this->v_jumlah_sekutu_pasif,
            'v_jumlah_sekutu_aktif_baru' => $this->v_jumlah_sekutu_aktif_baru,
            'v_jumlah_sekutu_pasif_baru' => $this->v_jumlah_sekutu_pasif_baru,
            'vi_jumlah_pemegang_saham' => $this->vi_jumlah_pemegang_saham,
            'vii_b_omset' => $this->vii_b_omset,
            'vii_c1_dasar' => $this->vii_c1_dasar,
            'vii_c2_ditempatkan' => $this->vii_c2_ditempatkan,
            'vii_c3_disetor' => $this->vii_c3_disetor,
            'vii_c4_saham' => $this->vii_c4_saham,
            'vii_c5_nominal' => $this->vii_c5_nominal,
            'vii_c6_aktif' => $this->vii_c6_aktif,
            'vii_c7_pasif' => $this->vii_c7_pasif,
            'vii_d_totalaset' => $this->vii_d_totalaset,
            'vii_e_wni' => $this->vii_e_wni,
            'vii_e_wna' => $this->vii_e_wna,
            'vii_f_matarantai' => $this->vii_f_matarantai,
            'vii_fa_jumlah' => $this->vii_fa_jumlah,
            'vii_fa_satuan' => $this->vii_fa_satuan,
            'vii_fb_jumlah' => $this->vii_fb_jumlah,
            'vii_fb_satuan' => $this->vii_fb_satuan,
            'vii_fc_lokal' => $this->vii_fc_lokal,
            'vii_fc_impor' => $this->vii_fc_impor,
            'viii_jenis_perusahaan' => $this->viii_jenis_perusahaan,
            'create_by' => $this->create_by,
            'create_date' => $this->create_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'i_1_pemilik_nama', $this->i_1_pemilik_nama])
            ->andFilterWhere(['like', 'i_2_pemilik_tpt_lahir', $this->i_2_pemilik_tpt_lahir])
            ->andFilterWhere(['like', 'i_3_pemilik_alamat', $this->i_3_pemilik_alamat])
            ->andFilterWhere(['like', 'i_4_pemilik_telepon', $this->i_4_pemilik_telepon])
            ->andFilterWhere(['like', 'i_5_pemilik_no_ktp', $this->i_5_pemilik_no_ktp])
            ->andFilterWhere(['like', 'ii_1_perusahaan_nama', $this->ii_1_perusahaan_nama])
            ->andFilterWhere(['like', 'ii_2_perusahaan_alamat', $this->ii_2_perusahaan_alamat])
            ->andFilterWhere(['like', 'ii_2_perusahaan_kodepos', $this->ii_2_perusahaan_kodepos])
            ->andFilterWhere(['like', 'ii_2_perusahaan_no_telp', $this->ii_2_perusahaan_no_telp])
            ->andFilterWhere(['like', 'ii_2_perusahaan_no_fax', $this->ii_2_perusahaan_no_fax])
            ->andFilterWhere(['like', 'ii_2_perusahaan_email', $this->ii_2_perusahaan_email])
            ->andFilterWhere(['like', 'iii_1_nama_kelompok', $this->iii_1_nama_kelompok])
            ->andFilterWhere(['like', 'iii_2_status_prsh', $this->iii_2_status_prsh])
            ->andFilterWhere(['like', 'iii_2_induk_nama_prsh', $this->iii_2_induk_nama_prsh])
            ->andFilterWhere(['like', 'iii_2_induk_nomor_tdp', $this->iii_2_induk_nomor_tdp])
            ->andFilterWhere(['like', 'iii_2_induk_alamat', $this->iii_2_induk_alamat])
            ->andFilterWhere(['like', 'iii_3_lokasi_unit_produksi', $this->iii_3_lokasi_unit_produksi])
            ->andFilterWhere(['like', 'iii_5_npwp', $this->iii_5_npwp])
            ->andFilterWhere(['like', 'iii_9a_merek_dagang_nama', $this->iii_9a_merek_dagang_nama])
            ->andFilterWhere(['like', 'iii_9a_merek_dagang_nomor', $this->iii_9a_merek_dagang_nomor])
            ->andFilterWhere(['like', 'iii_9b_hak_paten_nama', $this->iii_9b_hak_paten_nama])
            ->andFilterWhere(['like', 'iii_9b_hak_paten_nomor', $this->iii_9b_hak_paten_nomor])
            ->andFilterWhere(['like', 'iii_9c_hak_cipta_nama', $this->iii_9c_hak_cipta_nama])
            ->andFilterWhere(['like', 'iii_9c_hak_cipta_nomor', $this->iii_9c_hak_cipta_nomor])
            ->andFilterWhere(['like', 'iv_a1_nomor', $this->iv_a1_nomor])
            ->andFilterWhere(['like', 'iv_a1_notaris_nama', $this->iv_a1_notaris_nama])
            ->andFilterWhere(['like', 'iv_a1_notaris_alamat', $this->iv_a1_notaris_alamat])
            ->andFilterWhere(['like', 'iv_a1_telpon', $this->iv_a1_telpon])
            ->andFilterWhere(['like', 'iv_a2_nomor', $this->iv_a2_nomor])
            ->andFilterWhere(['like', 'iv_a2_notaris', $this->iv_a2_notaris])
            ->andFilterWhere(['like', 'iv_a3_nomor', $this->iv_a3_nomor])
            ->andFilterWhere(['like', 'iv_a4_nomor', $this->iv_a4_nomor])
            ->andFilterWhere(['like', 'iv_a5_nomor', $this->iv_a5_nomor])
            ->andFilterWhere(['like', 'iv_a6_nomor', $this->iv_a6_nomor])
            ->andFilterWhere(['like', 'vii_b_terbilang', $this->vii_b_terbilang])
            ->andFilterWhere(['like', 'vii_f_pengecer', $this->vii_f_pengecer]);

        return $dataProvider;
    }
}
