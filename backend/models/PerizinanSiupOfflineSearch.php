<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PerizinanSiupOffline;

/**
 * backend\models\PerizinanSiupOfflineSearch represents the model behind the search form about `backend\models\PerizinanSiupOffline`.
 */
 class PerizinanSiupOfflineSearch extends PerizinanSiupOffline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_izin', 'pemilik_nama', 'pemilik_tempat_lahir', 'pemilik_tanggal_lahir', 'pemilik_alamat_rumah', 'pemilik_propinsi', 'pemilik_kabupaten', 'pemilik_kecamatan', 'pemilik_kelurahan', 'pemilik_no_telpon', 'pemilik_no_ktp', 'pemilik_kewarganegaraan', 'perusahaan_nama', 'perusahaan_alamat', 'perusahaan_propinsi', 'perusahaan_kabupaten', 'perusahaan_kecamatan', 'perusahaan_kelurahan', 'perusahaan_kodepos', 'perusahaan_no_telpon', 'perusahaan_no_fax', 'perusahaan_email', 'created_by', 'created_date', 'updated_by', 'updated_date'], 'safe'],
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
        $query = PerizinanSiupOffline::find();

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
            'pemilik_tanggal_lahir' => $this->pemilik_tanggal_lahir,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'no_izin', $this->no_izin])
            ->andFilterWhere(['like', 'pemilik_nama', $this->pemilik_nama])
            ->andFilterWhere(['like', 'pemilik_tempat_lahir', $this->pemilik_tempat_lahir])
            ->andFilterWhere(['like', 'pemilik_alamat_rumah', $this->pemilik_alamat_rumah])
            ->andFilterWhere(['like', 'pemilik_propinsi', $this->pemilik_propinsi])
            ->andFilterWhere(['like', 'pemilik_kabupaten', $this->pemilik_kabupaten])
            ->andFilterWhere(['like', 'pemilik_kecamatan', $this->pemilik_kecamatan])
            ->andFilterWhere(['like', 'pemilik_kelurahan', $this->pemilik_kelurahan])
            ->andFilterWhere(['like', 'pemilik_no_telpon', $this->pemilik_no_telpon])
            ->andFilterWhere(['like', 'pemilik_no_ktp', $this->pemilik_no_ktp])
            ->andFilterWhere(['like', 'pemilik_kewarganegaraan', $this->pemilik_kewarganegaraan])
            ->andFilterWhere(['like', 'perusahaan_nama', $this->perusahaan_nama])
            ->andFilterWhere(['like', 'perusahaan_alamat', $this->perusahaan_alamat])
            ->andFilterWhere(['like', 'perusahaan_propinsi', $this->perusahaan_propinsi])
            ->andFilterWhere(['like', 'perusahaan_kabupaten', $this->perusahaan_kabupaten])
            ->andFilterWhere(['like', 'perusahaan_kecamatan', $this->perusahaan_kecamatan])
            ->andFilterWhere(['like', 'perusahaan_kelurahan', $this->perusahaan_kelurahan])
            ->andFilterWhere(['like', 'perusahaan_kodepos', $this->perusahaan_kodepos])
            ->andFilterWhere(['like', 'perusahaan_no_telpon', $this->perusahaan_no_telpon])
            ->andFilterWhere(['like', 'perusahaan_no_fax', $this->perusahaan_no_fax])
            ->andFilterWhere(['like', 'perusahaan_email', $this->perusahaan_email])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
