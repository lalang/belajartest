<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPenelitianMetode;

/**
 * backend\models\IzinPenelitianMetodeSearch represents the model behind the search form about `backend\models\IzinPenelitianMetode`.
 */
 class IzinPenelitianMetodeSearch extends IzinPenelitianMetode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'penelitian_id', 'metode_id'], 'integer'],
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
        $query = IzinPenelitianMetode::find();

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
            'penelitian_id' => $this->penelitian_id,
            'metode_id' => $this->metode_id,
        ]);

        return $dataProvider;
    }
}
