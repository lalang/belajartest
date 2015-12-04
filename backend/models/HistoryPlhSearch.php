<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HistoryPlh;

/**
 * backend\models\HistoryPlhSearch represents the model behind the search form about `backend\models\HistoryPlh`.
 */
 class HistoryPlhSearch extends HistoryPlh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'user_lokasi', 'user_plh_id', 'user_plh_lokasi'], 'integer'],
            [['tanggal_mulai', 'tanggal_akhir', 'status'], 'safe'],
            [['tanggal_akhir'], 'compare', 'compareAttribute'=>'tanggal_mulai', 'operator'=>'>='],
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
        $query = HistoryPlh::find()->where('CURDATE() <= tanggal_akhir');

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
            'user_id' => $this->user_id,
            'user_lokasi' => $this->user_lokasi,
            'user_plh_id' => $this->user_plh_id,
            'user_plh_lokasi' => $this->user_plh_lokasi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}