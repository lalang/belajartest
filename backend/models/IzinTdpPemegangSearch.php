<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpPemegang;

/**
 * backend\models\IzinTdpPemegangSearch represents the model behind the search form about `backend\models\IzinTdpPemegang`.
 */
 class IzinTdpPemegangSearch extends IzinTdpPemegang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'izin_tdp_pemegang_jum_saham'], 'integer'],
            [['izin_tdp_pemegang_nama', 'izin_tdp_pemegang_alamat', 'izin_tdp_pemegang_kodepos', 'izin_tdp_pemegang_tlpn', 'izin_tdp_pemegang_kewarganegaraan', 'izin_tdp_pemegang_npwp'], 'safe'],
            [['izin_tdp_pemegang_jum_modal'], 'number'],
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
        $query = IzinTdpPemegang::find();

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
            'izin_tdp_pemegang_jum_saham' => $this->izin_tdp_pemegang_jum_saham,
            'izin_tdp_pemegang_jum_modal' => $this->izin_tdp_pemegang_jum_modal,
        ]);

        $query->andFilterWhere(['like', 'izin_tdp_pemegang_nama', $this->izin_tdp_pemegang_nama])
            ->andFilterWhere(['like', 'izin_tdp_pemegang_alamat', $this->izin_tdp_pemegang_alamat])
            ->andFilterWhere(['like', 'izin_tdp_pemegang_kodepos', $this->izin_tdp_pemegang_kodepos])
            ->andFilterWhere(['like', 'izin_tdp_pemegang_tlpn', $this->izin_tdp_pemegang_tlpn])
            ->andFilterWhere(['like', 'izin_tdp_pemegang_kewarganegaraan', $this->izin_tdp_pemegang_kewarganegaraan])
            ->andFilterWhere(['like', 'izin_tdp_pemegang_npwp', $this->izin_tdp_pemegang_npwp]);

        return $dataProvider;
    }
}
