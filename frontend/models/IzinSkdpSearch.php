<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinSkdp;

/**
 * frontend\models\IzinSkdpSearch represents the model behind the search form about `backend\models\IzinSkdp`.
 */
 class IzinSkdpSearch extends IzinSkdp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'wilayah_id_perusahaan', 'kecamatan_id_perusahaan', 'kelurahan_id_perusahaan', 'jumlah_karyawan', 'nomor_akta_pendirian', 'nomor_sk_kemenkumham'], 'integer'],
            [['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenkel', 'agama', 'alamat', 'rt', 'rw', 'kodepos', 'telepon', 'passport', 'npwp_perusahaan', 'nama_perusahaan', 'titik_koordinat', 'latitude', 'longtitude', 'nama_gedung_perusahaan', 'blok_perusahaan', 'alamat_perusahaan', 'rt_perusahaan', 'rw_perusahaan', 'kodepos_perusahaan', 'telpon_perusahaan', 'fax_perusahaan', 'klarifikasi_usaha', 'status_kepemilikan', 'status_kantor', 'tanggal_pendirian', 'nama_notaris_pendirian', 'tanggal_pengesahan', 'nama_notaris_pengesahan'], 'safe'],
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
        $query = IzinSkdp::find();

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
            'kewarganegaraan_id' => $this->kewarganegaraan_id,
            'wilayah_id_perusahaan' => $this->wilayah_id_perusahaan,
            'kecamatan_id_perusahaan' => $this->kecamatan_id_perusahaan,
            'kelurahan_id_perusahaan' => $this->kelurahan_id_perusahaan,
            'jumlah_karyawan' => $this->jumlah_karyawan,
            'nomor_akta_pendirian' => $this->nomor_akta_pendirian,
            'tanggal_pendirian' => $this->tanggal_pendirian,
            'nomor_sk_kemenkumham' => $this->nomor_sk_kemenkumham,
            'tanggal_pengesahan' => $this->tanggal_pengesahan,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenkel', $this->jenkel])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'npwp_perusahaan', $this->npwp_perusahaan])
            ->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
            ->andFilterWhere(['like', 'titik_koordinat', $this->titik_koordinat])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longtitude', $this->longtitude])
            ->andFilterWhere(['like', 'nama_gedung_perusahaan', $this->nama_gedung_perusahaan])
            ->andFilterWhere(['like', 'blok_perusahaan', $this->blok_perusahaan])
            ->andFilterWhere(['like', 'alamat_perusahaan', $this->alamat_perusahaan])
            ->andFilterWhere(['like', 'rt_perusahaan', $this->rt_perusahaan])
            ->andFilterWhere(['like', 'rw_perusahaan', $this->rw_perusahaan])
            ->andFilterWhere(['like', 'kodepos_perusahaan', $this->kodepos_perusahaan])
            ->andFilterWhere(['like', 'telpon_perusahaan', $this->telpon_perusahaan])
            ->andFilterWhere(['like', 'fax_perusahaan', $this->fax_perusahaan])
            ->andFilterWhere(['like', 'klarifikasi_usaha', $this->klarifikasi_usaha])
            ->andFilterWhere(['like', 'status_kepemilikan', $this->status_kepemilikan])
            ->andFilterWhere(['like', 'status_kantor', $this->status_kantor])
            ->andFilterWhere(['like', 'nama_notaris_pendirian', $this->nama_notaris_pendirian])
            ->andFilterWhere(['like', 'nama_notaris_pengesahan', $this->nama_notaris_pengesahan]);

        return $dataProvider;
    }
}
