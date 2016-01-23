<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpSaham;

/**
 * backend\models\IzinTdpSahamSearch represents the model behind the search form about `backend\models\IzinTdpSaham`.
 */
 class IzinTdpSahamSearch extends IzinTdpSaham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'kewarganegaraan'], 'integer'],
            [['nama_lengkap', 'alamat', 'kodepos', 'no_telp', 'npwp'], 'safe'],
            [['jumlah_saham', 'jumlah_modal'], 'number'],
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
        $query = IzinTdpSaham::find();

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
            'kewarganegaraan' => $this->kewarganegaraan,
            'jumlah_saham' => $this->jumlah_saham,
            'jumlah_modal' => $this->jumlah_modal,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'npwp', $this->npwp]);

        return $dataProvider;
    }
}
