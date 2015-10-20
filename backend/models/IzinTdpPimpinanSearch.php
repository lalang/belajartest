<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpPimpinan;

/**
 * backend\models\IzinTdpPimpinanSearch represents the model behind the search form about `backend\models\IzinTdpPimpinan`.
 */
 class IzinTdpPimpinanSearch extends IzinTdpPimpinan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'izin_tdp_pimpinan_kedudukan', 'izin_tdp_pimpinan'], 'integer'],
            [['izin_tdp_pimpinan_nama', 'izin_tdp_pimpinan_tmpt_lahir', 'izin_tdp_pimpinan_tgl_lahir', 'izin_tdp_pimpinan_alamat', 'izin_tdp_pimpinan_kodepos', 'izin_tdp_pimpinan_tlpn', 'izin_tdp_pimpinan_kewarganegara', 'izin_tdp_pimpinan_tgl_mulai', 'izin_tdp_pimpinan_jum_saham', 'izin_tdp_pimpinan_kedudukan_lain', 'izin_tdp_pimpinan_nama_perusahaan', 'izin_tdp_pimpinan_alamat_perusahaan', 'izin_tdp_pimpinan_kodepos_perusahaan', 'izin_tdp_pimpinan_tlpn_perusahaan', 'izin_tdp_pimpinan_tgl_mulai_perusahaan'], 'safe'],
            [['izin_tdp_pimpinan_jum_modal'], 'number'],
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
        $query = IzinTdpPimpinan::find();

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
            'izin_tdp_id' => $this->izin_tdp_id,
            'izin_tdp_pimpinan_kedudukan' => $this->izin_tdp_pimpinan_kedudukan,
            'izin_tdp_pimpinan' => $this->izin_tdp_pimpinan,
            'izin_tdp_pimpinan_tgl_lahir' => $this->izin_tdp_pimpinan_tgl_lahir,
            'izin_tdp_pimpinan_tgl_mulai' => $this->izin_tdp_pimpinan_tgl_mulai,
            'izin_tdp_pimpinan_jum_modal' => $this->izin_tdp_pimpinan_jum_modal,
            'izin_tdp_pimpinan_tgl_mulai_perusahaan' => $this->izin_tdp_pimpinan_tgl_mulai_perusahaan,
        ]);

        $query->andFilterWhere(['like', 'izin_tdp_pimpinan_nama', $this->izin_tdp_pimpinan_nama])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_tmpt_lahir', $this->izin_tdp_pimpinan_tmpt_lahir])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_alamat', $this->izin_tdp_pimpinan_alamat])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_kodepos', $this->izin_tdp_pimpinan_kodepos])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_tlpn', $this->izin_tdp_pimpinan_tlpn])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_kewarganegara', $this->izin_tdp_pimpinan_kewarganegara])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_jum_saham', $this->izin_tdp_pimpinan_jum_saham])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_kedudukan_lain', $this->izin_tdp_pimpinan_kedudukan_lain])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_nama_perusahaan', $this->izin_tdp_pimpinan_nama_perusahaan])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_alamat_perusahaan', $this->izin_tdp_pimpinan_alamat_perusahaan])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_kodepos_perusahaan', $this->izin_tdp_pimpinan_kodepos_perusahaan])
            ->andFilterWhere(['like', 'izin_tdp_pimpinan_tlpn_perusahaan', $this->izin_tdp_pimpinan_tlpn_perusahaan]);

        return $dataProvider;
    }
}
