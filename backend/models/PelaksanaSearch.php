<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pelaksana;

/**
 * backend\models\PelaksanaSearch represents the model behind the search form about `backend\models\Pelaksana`.
 */
 class PelaksanaSearch extends Pelaksana
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama', 'warna', 'aktif','flag_ubah_tgl_exp','cetak_ulang_sk','cek_brankas','view_history'], 'safe'],
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
        $query = Pelaksana::find();

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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'warna', $this->warna])
            ->andFilterWhere(['like', 'aktif', $this->aktif])
			->andFilterWhere(['like', 'flag_ubah_tgl_exp', $this->flag_ubah_tgl_exp])
			->andFilterWhere(['like', 'cetak_ulang_sk', $this->cetak_ulang_sk])
			->andFilterWhere(['like', 'cek_brankas', $this->cek_brankas]);

        return $dataProvider;
    }
}
