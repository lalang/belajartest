<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdp;

/**
 * frontend\models\IzinTdpSearch represents the model behind the search form about `frontend\models\IzinTdp`.
 */
 class IzinTdpSearch extends IzinTdp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'siup_id', 'user_id', 'tdp_pembaruan_ke', 'tdp_id_perusahaan_induk', 'tdp_id_lokasi_produk_unit', 'izin_tdp_jum_dirut', 'izin_tdp_jum_direktur', 'izin_tdp_komisaris', 'izin_tdp_akta_pendirian_no', 'izin_tdp_akta_perubahan_no', 'izin_tdp_pengesahan_menkuham_no', 'izin_tdp_persetujuan_menkuham_no', 'izin_tdp_perubahan_anggaran_no', 'izin_tdp_perubahan_direksi_no', 'izin_tdp_jum_pemegang_saham', 'izin_tdp_jum_karyawan_wni', 'izin_tdp_jum_karyawan_wna', 'izin_tdp_kapasitas_mesin_terpasang', 'izin_tdp_kapasitas_mesin_produksi', 'izin_tdp_komponen_mesin_lokal', 'izin_tdp_komponen_mesin_impor'], 'integer'],
            [['tdp_jenis_daftar', 'tdp_nama_kelompok', 'tdp_status_perusahaan', 'tdr_perusahaan_induk_no_tdp', 'tdp_tanggal_mulai', 'tdp_jangka_waktu_berdiri', 'tdp_bentuk_kerja_sama', 'tdp_merek_dagang', 'tdp_merek_dagang_no', 'tdp_hak_paten', 'tdp_hak_paten_no', 'tdp_hak_cipta', 'tdp_hak_cipta_no', 'izin_tdp_akta_pendirian_nama_notaris', 'izin_tdp_akta_pendirian_alamat', 'izin_tdp_akta_pendirian_tlpn', 'izin_tdp_akta_pendirian_tgl', 'izin_tdp_akta_perubahan_nama_notaris', 'izin_tdp_akta_perubahan_tgl', 'izin_tdp_pengesahan_menkuham_tgl', 'izin_tdp_persetujuan_menkuham_tgl', 'izin_tdp_perubahan_anggaran_tgl', 'izin_tdp_perubahan_direksi_tgl', 'izin_tdp_komoditi_pokok', 'izin_tdp_komoditi_lainsatu', 'izin_tdp_komoditi_laindua', 'izin_tdp_omset_pertahun_string', 'izin_tdp_bidang_usaha', 'izin_tdp_kapasitas_mesin_terpasang_satuan', 'izin_tdp_kapasitas_mesin_produksi_satuan', 'izin_tdp_jenis_usaha', 'izin_tdp_jenis_perusahaan'], 'safe'],
            [['izin_tdp_omset_pertahun_int'], 'number'],
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
            'siup_id' => $this->siup_id,
            'user_id' => $this->user_id,
            'tdp_pembaruan_ke' => $this->tdp_pembaruan_ke,
            'tdp_id_perusahaan_induk' => $this->tdp_id_perusahaan_induk,
            'tdp_id_lokasi_produk_unit' => $this->tdp_id_lokasi_produk_unit,
            'tdp_tanggal_mulai' => $this->tdp_tanggal_mulai,
            'tdp_jangka_waktu_berdiri' => $this->tdp_jangka_waktu_berdiri,
            'izin_tdp_jum_dirut' => $this->izin_tdp_jum_dirut,
            'izin_tdp_jum_direktur' => $this->izin_tdp_jum_direktur,
            'izin_tdp_komisaris' => $this->izin_tdp_komisaris,
            'izin_tdp_akta_pendirian_no' => $this->izin_tdp_akta_pendirian_no,
            'izin_tdp_akta_pendirian_tgl' => $this->izin_tdp_akta_pendirian_tgl,
            'izin_tdp_akta_perubahan_no' => $this->izin_tdp_akta_perubahan_no,
            'izin_tdp_akta_perubahan_tgl' => $this->izin_tdp_akta_perubahan_tgl,
            'izin_tdp_pengesahan_menkuham_no' => $this->izin_tdp_pengesahan_menkuham_no,
            'izin_tdp_pengesahan_menkuham_tgl' => $this->izin_tdp_pengesahan_menkuham_tgl,
            'izin_tdp_persetujuan_menkuham_no' => $this->izin_tdp_persetujuan_menkuham_no,
            'izin_tdp_persetujuan_menkuham_tgl' => $this->izin_tdp_persetujuan_menkuham_tgl,
            'izin_tdp_perubahan_anggaran_no' => $this->izin_tdp_perubahan_anggaran_no,
            'izin_tdp_perubahan_anggaran_tgl' => $this->izin_tdp_perubahan_anggaran_tgl,
            'izin_tdp_perubahan_direksi_no' => $this->izin_tdp_perubahan_direksi_no,
            'izin_tdp_perubahan_direksi_tgl' => $this->izin_tdp_perubahan_direksi_tgl,
            'izin_tdp_jum_pemegang_saham' => $this->izin_tdp_jum_pemegang_saham,
            'izin_tdp_omset_pertahun_int' => $this->izin_tdp_omset_pertahun_int,
            'izin_tdp_jum_karyawan_wni' => $this->izin_tdp_jum_karyawan_wni,
            'izin_tdp_jum_karyawan_wna' => $this->izin_tdp_jum_karyawan_wna,
            'izin_tdp_kapasitas_mesin_terpasang' => $this->izin_tdp_kapasitas_mesin_terpasang,
            'izin_tdp_kapasitas_mesin_produksi' => $this->izin_tdp_kapasitas_mesin_produksi,
            'izin_tdp_komponen_mesin_lokal' => $this->izin_tdp_komponen_mesin_lokal,
            'izin_tdp_komponen_mesin_impor' => $this->izin_tdp_komponen_mesin_impor,
        ]);

        $query->andFilterWhere(['like', 'tdp_jenis_daftar', $this->tdp_jenis_daftar])
            ->andFilterWhere(['like', 'tdp_nama_kelompok', $this->tdp_nama_kelompok])
            ->andFilterWhere(['like', 'tdp_status_perusahaan', $this->tdp_status_perusahaan])
            ->andFilterWhere(['like', 'tdr_perusahaan_induk_no_tdp', $this->tdr_perusahaan_induk_no_tdp])
            ->andFilterWhere(['like', 'tdp_bentuk_kerja_sama', $this->tdp_bentuk_kerja_sama])
            ->andFilterWhere(['like', 'tdp_merek_dagang', $this->tdp_merek_dagang])
            ->andFilterWhere(['like', 'tdp_merek_dagang_no', $this->tdp_merek_dagang_no])
            ->andFilterWhere(['like', 'tdp_hak_paten', $this->tdp_hak_paten])
            ->andFilterWhere(['like', 'tdp_hak_paten_no', $this->tdp_hak_paten_no])
            ->andFilterWhere(['like', 'tdp_hak_cipta', $this->tdp_hak_cipta])
            ->andFilterWhere(['like', 'tdp_hak_cipta_no', $this->tdp_hak_cipta_no])
            ->andFilterWhere(['like', 'izin_tdp_akta_pendirian_nama_notaris', $this->izin_tdp_akta_pendirian_nama_notaris])
            ->andFilterWhere(['like', 'izin_tdp_akta_pendirian_alamat', $this->izin_tdp_akta_pendirian_alamat])
            ->andFilterWhere(['like', 'izin_tdp_akta_pendirian_tlpn', $this->izin_tdp_akta_pendirian_tlpn])
            ->andFilterWhere(['like', 'izin_tdp_akta_perubahan_nama_notaris', $this->izin_tdp_akta_perubahan_nama_notaris])
            ->andFilterWhere(['like', 'izin_tdp_komoditi_pokok', $this->izin_tdp_komoditi_pokok])
            ->andFilterWhere(['like', 'izin_tdp_komoditi_lainsatu', $this->izin_tdp_komoditi_lainsatu])
            ->andFilterWhere(['like', 'izin_tdp_komoditi_laindua', $this->izin_tdp_komoditi_laindua])
            ->andFilterWhere(['like', 'izin_tdp_omset_pertahun_string', $this->izin_tdp_omset_pertahun_string])
            ->andFilterWhere(['like', 'izin_tdp_bidang_usaha', $this->izin_tdp_bidang_usaha])
            ->andFilterWhere(['like', 'izin_tdp_kapasitas_mesin_terpasang_satuan', $this->izin_tdp_kapasitas_mesin_terpasang_satuan])
            ->andFilterWhere(['like', 'izin_tdp_kapasitas_mesin_produksi_satuan', $this->izin_tdp_kapasitas_mesin_produksi_satuan])
            ->andFilterWhere(['like', 'izin_tdp_jenis_usaha', $this->izin_tdp_jenis_usaha])
            ->andFilterWhere(['like', 'izin_tdp_jenis_perusahaan', $this->izin_tdp_jenis_perusahaan]);

        return $dataProvider;
    }
}
