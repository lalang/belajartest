<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpLeglain;

/**
 * backend\models\IzinTdpLeglainSearch represents the model behind the search form about `backend\models\IzinTdpLeglain`.
 */
 class IzinTdpLeglainSearch extends IzinTdpLeglain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id'], 'integer'],
            [['izin_tdp_leglain_nama_petugas'], 'safe'],
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
        $query = IzinTdpLeglain::find();

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
        ]);

        $query->andFilterWhere(['like', 'izin_tdp_leglain_nama_petugas', $this->izin_tdp_leglain_nama_petugas]);

        return $dataProvider;
    }
}
