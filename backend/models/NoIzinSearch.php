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
            [['id', 'lokasi_id', 'izin_id', 'no_izin'], 'integer'],
            [['tahun'], 'safe'],
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
        $query = NoIzin::find();

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
            'lokasi_id' => $this->lokasi_id,
            'izin_id' => $this->izin_id,
            'no_izin' => $this->no_izin,
        ]);

        return $dataProvider;
    }
}
