<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BentukPerusahaan;

/**
 * backend\models\BentukPerusahaanSearch represents the model behind the search form about `backend\models\BentukPerusahaan`.
 */
 class BentukPerusahaanSearch extends BentukPerusahaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'urutan'], 'integer'],
            [['nama', 'type', 'publish'], 'safe'],
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
        $query = BentukPerusahaan::find();

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
            'urutan' => $this->urutan,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }
}
