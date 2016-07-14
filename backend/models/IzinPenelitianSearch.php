<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPenelitian;

/**
 * backend\models\IzinPenelitianSearch represents the model behind the search form about `backend\models\IzinPenelitian`.
 */
class IzinPenelitianSearch extends IzinPenelitian {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'kelurahan_pemohon', 'kecamatan_pemohon', 'kabupaten_pemohon', 'provinsi_pemohon', 'kelurahan_instansi', 'kecamatan_instansi', 'kabupaten_instansi', 'provinsi_instansi', 'kab_penelitian', 'kec_penelitian', 'kel_penelitian', 'anggota'], 'integer'],
            [['nama', 'tempat_lahir', 'tanggal_lahir', 'alamat_pemohon', 'rt', 'rw', 'telepon_pemohon', 'email', 'kode_pos', 'pekerjaan_pemohon', 'npwp', 'nama_instansi', 'fakultas', 'alamat_instansi', 'email_instansi', 'kodepos_instansi', 'telepon_instansi', 'fax_instansi', 'tema', 'instansi_penelitian', 'alamat_penelitian', 'bidang_penelitian', 'tgl_mulai_penelitian', 'tgl_akhir_penelitian'], 'safe'],
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
        $query = IzinPenelitian::find();

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
            'lokasi_id' => $this->lokasi_id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'kelurahan_pemohon' => $this->kelurahan_pemohon,
            'kecamatan_pemohon' => $this->kecamatan_pemohon,
            'kabupaten_pemohon' => $this->kabupaten_pemohon,
            'provinsi_pemohon' => $this->provinsi_pemohon,
            'kelurahan_instansi' => $this->kelurahan_instansi,
            'kecamatan_instansi' => $this->kecamatan_instansi,
            'kabupaten_instansi' => $this->kabupaten_instansi,
            'provinsi_instansi' => $this->provinsi_instansi,
            'kab_penelitian' => $this->kab_penelitian,
            'kec_penelitian' => $this->kec_penelitian,
            'kel_penelitian' => $this->kel_penelitian,
            'tgl_mulai_penelitian' => $this->tgl_mulai_penelitian,
            'tgl_akhir_penelitian' => $this->tgl_akhir_penelitian,
            'anggota' => $this->anggota,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
                ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
                ->andFilterWhere(['like', 'alamat_pemohon', $this->alamat_pemohon])
                ->andFilterWhere(['like', 'rt', $this->rt])
                ->andFilterWhere(['like', 'rw', $this->rw])
                ->andFilterWhere(['like', 'telepon_pemohon', $this->telepon_pemohon])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
                ->andFilterWhere(['like', 'pekerjaan_pemohon', $this->pekerjaan_pemohon])
                ->andFilterWhere(['like', 'npwp', $this->npwp])
                ->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi])
                ->andFilterWhere(['like', 'fakultas', $this->fakultas])
                ->andFilterWhere(['like', 'alamat_instansi', $this->alamat_instansi])
                ->andFilterWhere(['like', 'email_instansi', $this->email_instansi])
                ->andFilterWhere(['like', 'kodepos_instansi', $this->kodepos_instansi])
                ->andFilterWhere(['like', 'telepon_instansi', $this->telepon_instansi])
                ->andFilterWhere(['like', 'fax_instansi', $this->fax_instansi])
                ->andFilterWhere(['like', 'tema', $this->tema])
                ->andFilterWhere(['like', 'instansi_penelitian', $this->instansi_penelitian])
                ->andFilterWhere(['like', 'alamat_penelitian', $this->alamat_penelitian])
                ->andFilterWhere(['like', 'bidang_penelitian', $this->bidang_penelitian]);

        return $dataProvider;
    }

}
