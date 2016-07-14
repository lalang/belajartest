<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MenuHome;

/**
 * backend\models\MenuHomeSearch represents the model behind the search form about `backend\models\MenuHome`.
 */
class MenuHomeSearch extends MenuHome {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'urutan'], 'integer'],
            [['icon', 'nama', 'nama_en', 'link', 'link_en', 'publish'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = MenuHome::find();

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

        $query->andFilterWhere(['like', 'icon', $this->icon])
                ->andFilterWhere(['like', 'nama', $this->nama])
                ->andFilterWhere(['like', 'nama_en', $this->nama_en])
                ->andFilterWhere(['like', 'link', $this->link])
                ->andFilterWhere(['like', 'link_en', $this->link_en])
                ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }

}
