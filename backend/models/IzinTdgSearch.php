<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdg;

/**
 * backend\models\IzinTdgSearch represents the model behind the search form about `backend\models\IzinTdg`.
 */
class IzinTdgSearch extends IzinTdg {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'perizinan_id', 'izin_id', 'status_id', 'gudang_sarana_forklif', 'gudang_sarana_komputer', 'hs_sarana_forklif', 'hs_sarana_komputer', 'create_by', 'update_by'], 'integer'],
            [['tipe', 'pemilik_nik', 'pemilik_pengenal', 'pemilik_nama', 'pemilik_alamat', 'pemilik_rt', 'pemilik_rw', 'pemilik_propinsi', 'pemilik_kabupaten', 'pemilik_kecamatan', 'pemilik_kelurahan', 'pemilik_kodepos', 'pemilik_telepon', 'pemilik_fax', 'pemilik_email', 'perusahaan_npwp', 'perusahaan_nama', 'perusahaan_namagedung', 'perusahaan_blok_lantai', 'perusahaan_namajalan', 'perusahaan_propinsi', 'perusahaan_kabupaten', 'perusahaan_kecamatan', 'perusahaan_kelurahan', 'perusahaan_kodepos', 'perusahaan_fax', 'perusahaan_email', 'gudang_koordinat_1', 'gudang_koordinat_2', 'gudang_blok_lantai', 'gudang_namajalan', 'gudang_propinsi', 'gudang_kabupaten', 'gudang_kecamatan', 'gudang_kelurahan', 'gudang_kodepos', 'gudang_telepon', 'gudang_fax', 'gudang_email', 'gudang_kapasitas_satuan', 'gudang_kelengkapan', 'gudang_sarana_air', 'gudang_kepemilikan', 'gudang_imb_nomor', 'gudang_imb_tanggal', 'gudang_uug_nomor', 'gudang_uug_tanggal', 'gudang_uug_berlaku', 'gudang_isi', 'hs_koordinat_1', 'hs_koordinat_2', 'hs_namagedung', 'hs_blok_lantai', 'hs_namajalan', 'hs_propinsi', 'hs_kabupaten', 'hs_kecamatan', 'hs_kelurahan', 'hs_kodepos', 'hs_telepon', 'hs_fax', 'hs_email', 'hs_kapasitas_satuan', 'hs_kelengkapan', 'hs_sarana_air', 'hs_kepemilikan', 'hs_imb_nomor', 'hs_imb_tanggal', 'hs_uug_nomor', 'hs_uug_tanggal', 'hs_isi', 'bapl_file', 'catatan_tambahan', 'create_date', 'update_date'], 'safe'],
            [['gudang_luas', 'gudang_kapasitas', 'gudang_nilai', 'gudang_komposisi_nasional', 'gudang_komposisi_asing', 'gudang_sarana_listrik', 'gudang_sarana_pendingin', 'hs_luas', 'hs_kapasitas', 'hs_nilai', 'hs_komposisi_nasional', 'hs_komposisi_asing', 'hs_sarana_listrik', 'hs_sarana_pendingin'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = IzinTdg::find();

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
            'status_id' => $this->status_id,
            'gudang_luas' => $this->gudang_luas,
            'gudang_kapasitas' => $this->gudang_kapasitas,
            'gudang_nilai' => $this->gudang_nilai,
            'gudang_komposisi_nasional' => $this->gudang_komposisi_nasional,
            'gudang_komposisi_asing' => $this->gudang_komposisi_asing,
            'gudang_sarana_listrik' => $this->gudang_sarana_listrik,
            'gudang_sarana_pendingin' => $this->gudang_sarana_pendingin,
            'gudang_sarana_forklif' => $this->gudang_sarana_forklif,
            'gudang_sarana_komputer' => $this->gudang_sarana_komputer,
            'gudang_imb_tanggal' => $this->gudang_imb_tanggal,
            'gudang_uug_tanggal' => $this->gudang_uug_tanggal,
            'gudang_uug_berlaku' => $this->gudang_uug_berlaku,
            'hs_luas' => $this->hs_luas,
            'hs_kapasitas' => $this->hs_kapasitas,
            'hs_nilai' => $this->hs_nilai,
            'hs_komposisi_nasional' => $this->hs_komposisi_nasional,
            'hs_komposisi_asing' => $this->hs_komposisi_asing,
            'hs_sarana_listrik' => $this->hs_sarana_listrik,
            'hs_sarana_pendingin' => $this->hs_sarana_pendingin,
            'hs_sarana_forklif' => $this->hs_sarana_forklif,
            'hs_sarana_komputer' => $this->hs_sarana_komputer,
            'hs_imb_tanggal' => $this->hs_imb_tanggal,
            'hs_uug_tanggal' => $this->hs_uug_tanggal,
            'create_by' => $this->create_by,
            'create_date' => $this->create_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'tipe', $this->tipe])
                ->andFilterWhere(['like', 'pemilik_nik', $this->pemilik_nik])
                ->andFilterWhere(['like', 'pemilik_pengenal', $this->pemilik_pengenal])
                ->andFilterWhere(['like', 'pemilik_nama', $this->pemilik_nama])
                ->andFilterWhere(['like', 'pemilik_alamat', $this->pemilik_alamat])
                ->andFilterWhere(['like', 'pemilik_rt', $this->pemilik_rt])
                ->andFilterWhere(['like', 'pemilik_rw', $this->pemilik_rw])
                ->andFilterWhere(['like', 'pemilik_propinsi', $this->pemilik_propinsi])
                ->andFilterWhere(['like', 'pemilik_kabupaten', $this->pemilik_kabupaten])
                ->andFilterWhere(['like', 'pemilik_kecamatan', $this->pemilik_kecamatan])
                ->andFilterWhere(['like', 'pemilik_kelurahan', $this->pemilik_kelurahan])
                ->andFilterWhere(['like', 'pemilik_kodepos', $this->pemilik_kodepos])
                ->andFilterWhere(['like', 'pemilik_telepon', $this->pemilik_telepon])
                ->andFilterWhere(['like', 'pemilik_fax', $this->pemilik_fax])
                ->andFilterWhere(['like', 'pemilik_email', $this->pemilik_email])
                ->andFilterWhere(['like', 'perusahaan_npwp', $this->perusahaan_npwp])
                ->andFilterWhere(['like', 'perusahaan_nama', $this->perusahaan_nama])
                ->andFilterWhere(['like', 'perusahaan_namagedung', $this->perusahaan_namagedung])
                ->andFilterWhere(['like', 'perusahaan_blok_lantai', $this->perusahaan_blok_lantai])
                ->andFilterWhere(['like', 'perusahaan_namajalan', $this->perusahaan_namajalan])
                ->andFilterWhere(['like', 'perusahaan_propinsi', $this->perusahaan_propinsi])
                ->andFilterWhere(['like', 'perusahaan_kabupaten', $this->perusahaan_kabupaten])
                ->andFilterWhere(['like', 'perusahaan_kecamatan', $this->perusahaan_kecamatan])
                ->andFilterWhere(['like', 'perusahaan_kelurahan', $this->perusahaan_kelurahan])
                ->andFilterWhere(['like', 'perusahaan_kodepos', $this->perusahaan_kodepos])
                ->andFilterWhere(['like', 'perusahaan_fax', $this->perusahaan_fax])
                ->andFilterWhere(['like', 'perusahaan_email', $this->perusahaan_email])
                ->andFilterWhere(['like', 'gudang_koordinat_1', $this->gudang_koordinat_1])
                ->andFilterWhere(['like', 'gudang_koordinat_2', $this->gudang_koordinat_2])
                ->andFilterWhere(['like', 'gudang_blok_lantai', $this->gudang_blok_lantai])
                ->andFilterWhere(['like', 'gudang_namajalan', $this->gudang_namajalan])
                ->andFilterWhere(['like', 'gudang_propinsi', $this->gudang_propinsi])
                ->andFilterWhere(['like', 'gudang_kabupaten', $this->gudang_kabupaten])
                ->andFilterWhere(['like', 'gudang_kecamatan', $this->gudang_kecamatan])
                ->andFilterWhere(['like', 'gudang_kelurahan', $this->gudang_kelurahan])
                ->andFilterWhere(['like', 'gudang_kodepos', $this->gudang_kodepos])
                ->andFilterWhere(['like', 'gudang_telepon', $this->gudang_telepon])
                ->andFilterWhere(['like', 'gudang_fax', $this->gudang_fax])
                ->andFilterWhere(['like', 'gudang_email', $this->gudang_email])
                ->andFilterWhere(['like', 'gudang_kapasitas_satuan', $this->gudang_kapasitas_satuan])
                ->andFilterWhere(['like', 'gudang_kelengkapan', $this->gudang_kelengkapan])
                ->andFilterWhere(['like', 'gudang_sarana_air', $this->gudang_sarana_air])
                ->andFilterWhere(['like', 'gudang_kepemilikan', $this->gudang_kepemilikan])
                ->andFilterWhere(['like', 'gudang_imb_nomor', $this->gudang_imb_nomor])
                ->andFilterWhere(['like', 'gudang_uug_nomor', $this->gudang_uug_nomor])
                ->andFilterWhere(['like', 'gudang_isi', $this->gudang_isi])
                ->andFilterWhere(['like', 'hs_koordinat_1', $this->hs_koordinat_1])
                ->andFilterWhere(['like', 'hs_koordinat_2', $this->hs_koordinat_2])
                ->andFilterWhere(['like', 'hs_namagedung', $this->hs_namagedung])
                ->andFilterWhere(['like', 'hs_blok_lantai', $this->hs_blok_lantai])
                ->andFilterWhere(['like', 'hs_namajalan', $this->hs_namajalan])
                ->andFilterWhere(['like', 'hs_propinsi', $this->hs_propinsi])
                ->andFilterWhere(['like', 'hs_kabupaten', $this->hs_kabupaten])
                ->andFilterWhere(['like', 'hs_kecamatan', $this->hs_kecamatan])
                ->andFilterWhere(['like', 'hs_kelurahan', $this->hs_kelurahan])
                ->andFilterWhere(['like', 'hs_kodepos', $this->hs_kodepos])
                ->andFilterWhere(['like', 'hs_telepon', $this->hs_telepon])
                ->andFilterWhere(['like', 'hs_fax', $this->hs_fax])
                ->andFilterWhere(['like', 'hs_email', $this->hs_email])
                ->andFilterWhere(['like', 'hs_kapasitas_satuan', $this->hs_kapasitas_satuan])
                ->andFilterWhere(['like', 'hs_kelengkapan', $this->hs_kelengkapan])
                ->andFilterWhere(['like', 'hs_sarana_air', $this->hs_sarana_air])
                ->andFilterWhere(['like', 'hs_kepemilikan', $this->hs_kepemilikan])
                ->andFilterWhere(['like', 'hs_imb_nomor', $this->hs_imb_nomor])
                ->andFilterWhere(['like', 'hs_uug_nomor', $this->hs_uug_nomor])
                ->andFilterWhere(['like', 'hs_isi', $this->hs_isi])
                ->andFilterWhere(['like', 'bapl_file', $this->bapl_file])
                ->andFilterWhere(['like', 'catatan_tambahan', $this->catatan_tambahan]);

        return $dataProvider;
    }

}
