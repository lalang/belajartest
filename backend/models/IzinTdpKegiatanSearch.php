<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpKegiatan;

/**
 * backend\models\IzinTdpKegiatanSearch represents the model behind the search form about `backend\models\IzinTdpKegiatan`.
 */
 class IzinTdpKegiatanSearch extends IzinTdpKegiatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'kbli_id'], 'integer'],
            [['produk', 'flag_utama'], 'safe'],
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
        $query = IzinTdpKegiatan::find();

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
            'kbli_id' => $this->kbli_id,
        ]);

        $query->andFilterWhere(['like', 'produk', $this->produk])
            ->andFilterWhere(['like', 'flag_utama', $this->flag_utama]);

        return $dataProvider;
    }
}
