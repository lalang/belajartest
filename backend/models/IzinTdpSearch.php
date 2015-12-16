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
            [['id', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'perpanjangan_ke', 'iii_2_induk_propinsi', 'iii_2_induk_kabupaten', 'iii_2_induk_kecamatan', 'iii_2_induk_kelurahan', 'iii_3_lokasi_unit_produksi_propinsi', 'iii_3_lokasi_unit_produksi_kabupaten', 'iii_4_jumlah_bank', 'v_jumlah_dirut', 'v_jumlah_direktur', 'v_jumlah_komisaris', 'vi_jumlah_pemegang_saham'], 'integer'],
            [['bentuk_perusahaan', 'iii_1_nama_kelompok', 'iii_2_status_prsh', 'iii_2_induk_nama_prsh', 'iii_2_induk_nomor_tdp', 'iii_2_induk_alamat', 'iii_3_lokasi_unit_produksi', 'iii_4_bank_utama_1', 'iii_4_bank_utama_2', 'iii_7b_tgl_mulai_kegiatan', 'iii_8_bentuk_kerjasama_pihak3', 'iii_9a_merek_dagang_nama', 'iii_9a_merek_dagang_nomor', 'iii_9b_hak_paten_nama', 'iii_9b_hak_paten_nomor', 'iii_9c_hak_cipta_nama', 'iii_9c_hak_cipta_nomor', 'iv_a1_notaris_nama', 'iv_a1_notaris_alamat', 'iv_a1_telpon', 'iv_a2_notaris', 'iv_a4_nomor', 'iv_a4_tanggal', 'iv_a5_nomor', 'iv_a5_tanggal', 'iv_a6_nomor', 'iv_a6_tanggal'], 'safe'],
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
            'perizinan_id' => $this->perizinan_id,
            'izin_id' => $this->izin_id,
            'user_id' => $this->user_id,
            'status_id' => $this->status_id,
            'perpanjangan_ke' => $this->perpanjangan_ke,
            'iii_2_induk_propinsi' => $this->iii_2_induk_propinsi,
            'iii_2_induk_kabupaten' => $this->iii_2_induk_kabupaten,
            'iii_2_induk_kecamatan' => $this->iii_2_induk_kecamatan,
            'iii_2_induk_kelurahan' => $this->iii_2_induk_kelurahan,
            'iii_3_lokasi_unit_produksi_propinsi' => $this->iii_3_lokasi_unit_produksi_propinsi,
            'iii_3_lokasi_unit_produksi_kabupaten' => $this->iii_3_lokasi_unit_produksi_kabupaten,
            'iii_4_jumlah_bank' => $this->iii_4_jumlah_bank,
            'iii_7b_tgl_mulai_kegiatan' => $this->iii_7b_tgl_mulai_kegiatan,
            'iv_a4_tanggal' => $this->iv_a4_tanggal,
            'iv_a5_tanggal' => $this->iv_a5_tanggal,
            'iv_a6_tanggal' => $this->iv_a6_tanggal,
            'v_jumlah_dirut' => $this->v_jumlah_dirut,
            'v_jumlah_direktur' => $this->v_jumlah_direktur,
            'v_jumlah_komisaris' => $this->v_jumlah_komisaris,
            'vi_jumlah_pemegang_saham' => $this->vi_jumlah_pemegang_saham,
        ]);

        $query->andFilterWhere(['like', 'bentuk_perusahaan', $this->bentuk_perusahaan])
            ->andFilterWhere(['like', 'iii_1_nama_kelompok', $this->iii_1_nama_kelompok])
            ->andFilterWhere(['like', 'iii_2_status_prsh', $this->iii_2_status_prsh])
            ->andFilterWhere(['like', 'iii_2_induk_nama_prsh', $this->iii_2_induk_nama_prsh])
            ->andFilterWhere(['like', 'iii_2_induk_nomor_tdp', $this->iii_2_induk_nomor_tdp])
            ->andFilterWhere(['like', 'iii_2_induk_alamat', $this->iii_2_induk_alamat])
            ->andFilterWhere(['like', 'iii_3_lokasi_unit_produksi', $this->iii_3_lokasi_unit_produksi])
            ->andFilterWhere(['like', 'iii_4_bank_utama_1', $this->iii_4_bank_utama_1])
            ->andFilterWhere(['like', 'iii_4_bank_utama_2', $this->iii_4_bank_utama_2])
            ->andFilterWhere(['like', 'iii_8_bentuk_kerjasama_pihak3', $this->iii_8_bentuk_kerjasama_pihak3])
            ->andFilterWhere(['like', 'iii_9a_merek_dagang_nama', $this->iii_9a_merek_dagang_nama])
            ->andFilterWhere(['like', 'iii_9a_merek_dagang_nomor', $this->iii_9a_merek_dagang_nomor])
            ->andFilterWhere(['like', 'iii_9b_hak_paten_nama', $this->iii_9b_hak_paten_nama])
            ->andFilterWhere(['like', 'iii_9b_hak_paten_nomor', $this->iii_9b_hak_paten_nomor])
            ->andFilterWhere(['like', 'iii_9c_hak_cipta_nama', $this->iii_9c_hak_cipta_nama])
            ->andFilterWhere(['like', 'iii_9c_hak_cipta_nomor', $this->iii_9c_hak_cipta_nomor])
            ->andFilterWhere(['like', 'iv_a1_notaris_nama', $this->iv_a1_notaris_nama])
            ->andFilterWhere(['like', 'iv_a1_notaris_alamat', $this->iv_a1_notaris_alamat])
            ->andFilterWhere(['like', 'iv_a1_telpon', $this->iv_a1_telpon])
            ->andFilterWhere(['like', 'iv_a2_notaris', $this->iv_a2_notaris])
            ->andFilterWhere(['like', 'iv_a4_nomor', $this->iv_a4_nomor])
            ->andFilterWhere(['like', 'iv_a5_nomor', $this->iv_a5_nomor])
            ->andFilterWhere(['like', 'iv_a6_nomor', $this->iv_a6_nomor]);

        return $dataProvider;
    }
}
