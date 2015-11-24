<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NoIzin;

/**
 * backend\models\NoIzinSearch represents the model behind the search form about `backend\models\NoIzin`.
 */
 class NoIzinSearch extends NoIzin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_izin'], 'integer'],
            [['lokasi_id', 'izin_id', 'tahun'], 'safe'],
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
        $query = NoIzin::find()->joinWith(['lokasi','izin'])->orderBy('id asc');

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
            'tahun' => $this->tahun,
            'no_izin' => $this->no_izin,
        ]);
		
		$query->andFilterWhere(['like', 'lokasi.nama', $this->lokasi_id])
                        ->andFilterWhere(['like', 'izin.nama', $this->izin_id]);
			
        return $dataProvider;
    }
}
