<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpKantorcabang;

/**
 * backend\models\IzinTdpKantorcabangSearch represents the model behind the search form about `backend\models\IzinTdpKantorcabang`.
 */
 class IzinTdpKantorcabangSearch extends IzinTdpKantorcabang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'propinsi_id', 'kabupaten_id', 'status_prsh', 'kbli_id'], 'integer'],
            [['nama', 'no_tdp', 'alamat', 'kodepos', 'no_telp'], 'safe'],
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
        $query = IzinTdpKantorcabang::find();

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
            'propinsi_id' => $this->propinsi_id,
            'kabupaten_id' => $this->kabupaten_id,
            'status_prsh' => $this->status_prsh,
            'kbli_id' => $this->kbli_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_tdp', $this->no_tdp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp]);

        return $dataProvider;
    }
}
