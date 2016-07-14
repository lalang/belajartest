<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPm1;

/**
 * backend\models\IzinPm1Search represents the model behind the search form about `backend\models\IzinPm1`.
 */
class IzinPm1Search extends IzinPm1 {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'lokasi_id', 'wilayah_id_orang_lain', 'kecamatan_id_orang_lain', 'kelurahan_id_orang_lain', 'wilayah_id_saksi1', 'kecamatan_id_saksi1', 'kelurahan_id_saksi1', 'wilayah_id_saksi2', 'kecamatan_id_saksi2', 'kelurahan_id_saksi2'], 'integer'],
            [['nik', 'no_kk', 'nama', 'agama', 'tempat_lahir', 'tanggal_lahir', 'jenkel', 'alamat', 'kodepos', 'pekerjaan', 'telepon', 'no_surat_pengantar', 'tanggal_surat', 'instansi_tujuan', 'tujuan', 'pilihan', 'keperluan_administrasi', 'nik_orang_lain', 'no_kk_orang_lain', 'nama_orang_lain', 'tempat_lahir_orang_lain', 'tanggal_lahir_orang_lain', 'jenkel_orang_lain', 'alamat_orang_lain', 'kodepos_orang_lain', 'pekerjaan_orang_lain', 'telepon_orang_lain', 'nik_saksi1', 'no_kk_saksi1', 'nama_saksi1', 'tempat_lahir_saksi1', 'tanggal_lahir_saksi1', 'jenkel_saksi1', 'alamat_saksi1', 'kodepos_saksi1', 'pekerjaan_saksi1', 'telepon_saksi1', 'nik_saksi2', 'no_kk_saksi2', 'nama_saksi2', 'tempat_lahir_saksi2', 'tanggal_lahir_saksi2', 'jenkel_saksi2', 'alamat_saksi2', 'kodepos_saksi2', 'pekerjaan_saksi2', 'telepon_saksi2'], 'safe'],
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
        $query = IzinPm1::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'wilayah_id' => $this->wilayah_id,
            'kecamatan_id' => $this->kecamatan_id,
            'kelurahan_id' => $this->kelurahan_id,
            'tanggal_surat' => $this->tanggal_surat,
            'lokasi_id' => $this->lokasi_id,
            'tanggal_lahir_orang_lain' => $this->tanggal_lahir_orang_lain,
            'wilayah_id_orang_lain' => $this->wilayah_id_orang_lain,
            'kecamatan_id_orang_lain' => $this->kecamatan_id_orang_lain,
            'kelurahan_id_orang_lain' => $this->kelurahan_id_orang_lain,
            'tanggal_lahir_saksi1' => $this->tanggal_lahir_saksi1,
            'wilayah_id_saksi1' => $this->wilayah_id_saksi1,
            'kecamatan_id_saksi1' => $this->kecamatan_id_saksi1,
            'kelurahan_id_saksi1' => $this->kelurahan_id_saksi1,
            'tanggal_lahir_saksi2' => $this->tanggal_lahir_saksi2,
            'wilayah_id_saksi2' => $this->wilayah_id_saksi2,
            'kecamatan_id_saksi2' => $this->kecamatan_id_saksi2,
            'kelurahan_id_saksi2' => $this->kelurahan_id_saksi2,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
                ->andFilterWhere(['like', 'no_kk', $this->no_kk])
                ->andFilterWhere(['like', 'nama', $this->nama])
                ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
                ->andFilterWhere(['like', 'jenkel', $this->jenkel])
                ->andFilterWhere(['like', 'alamat', $this->alamat])
                ->andFilterWhere(['like', 'kodepos', $this->kodepos])
                ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
                ->andFilterWhere(['like', 'telepon', $this->telepon])
                ->andFilterWhere(['like', 'no_surat_pengantar', $this->no_surat_pengantar])
                ->andFilterWhere(['like', 'instansi_tujuan', $this->instansi_tujuan])
                ->andFilterWhere(['like', 'tujuan', $this->tujuan])
                ->andFilterWhere(['like', 'keperluan_administrasi', $this->keperluan_administrasi])
                ->andFilterWhere(['like', 'nik_orang_lain', $this->nik_orang_lain])
                ->andFilterWhere(['like', 'no_kk_orang_lain', $this->no_kk_orang_lain])
                ->andFilterWhere(['like', 'nama_orang_lain', $this->nama_orang_lain])
                ->andFilterWhere(['like', 'tempat_lahir_orang_lain', $this->tempat_lahir_orang_lain])
                ->andFilterWhere(['like', 'jenkel_orang_lain', $this->jenkel_orang_lain])
                ->andFilterWhere(['like', 'alamat_orang_lain', $this->alamat_orang_lain])
                ->andFilterWhere(['like', 'kodepos_orang_lain', $this->kodepos_orang_lain])
                ->andFilterWhere(['like', 'pekerjaan_orang_lain', $this->pekerjaan_orang_lain])
                ->andFilterWhere(['like', 'telepon_orang_lain', $this->telepon_orang_lain])
                ->andFilterWhere(['like', 'nik_saksi1', $this->nik_saksi1])
                ->andFilterWhere(['like', 'no_kk_saksi1', $this->no_kk_saksi1])
                ->andFilterWhere(['like', 'nama_saksi1', $this->nama_saksi1])
                ->andFilterWhere(['like', 'tempat_lahir_saksi1', $this->tempat_lahir_saksi1])
                ->andFilterWhere(['like', 'jenkel_saksi1', $this->jenkel_saksi1])
                ->andFilterWhere(['like', 'alamat_saksi1', $this->alamat_saksi1])
                ->andFilterWhere(['like', 'kodepos_saksi1', $this->kodepos_saksi1])
                ->andFilterWhere(['like', 'pekerjaan_saksi1', $this->pekerjaan_saksi1])
                ->andFilterWhere(['like', 'telepon_saksi1', $this->telepon_saksi1])
                ->andFilterWhere(['like', 'nik_saksi2', $this->nik_saksi2])
                ->andFilterWhere(['like', 'no_kk_saksi2', $this->no_kk_saksi2])
                ->andFilterWhere(['like', 'nama_saksi2', $this->nama_saksi2])
                ->andFilterWhere(['like', 'tempat_lahir_saksi2', $this->tempat_lahir_saksi2])
                ->andFilterWhere(['like', 'jenkel_saksi2', $this->jenkel_saksi2])
                ->andFilterWhere(['like', 'alamat_saksi2', $this->alamat_saksi2])
                ->andFilterWhere(['like', 'kodepos_saksi2', $this->kodepos_saksi2])
                ->andFilterWhere(['like', 'pekerjaan_saksi2', $this->pekerjaan_saksi2])
                ->andFilterWhere(['like', 'telepon_saksi2', $this->telepon_saksi2]);

        return $dataProvider;
    }

}
