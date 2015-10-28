<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubLanding2;

/**
 * backend\models\SubLanding2Search represents the model behind the search form about `backend\models\SubLanding2`.
 */
 class SubLanding2Search extends SubLanding2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'urutan'], 'integer'],
            [['icon', 'info', 'info_en', 'link', 'link_en', 'target', 'publish'], 'safe'],
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
        $query = SubLanding2::find();

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
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'info_en', $this->info_en])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'link_en', $this->link_en])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }
	
	public function active_sublan2(){
		$query = SubLanding2::find();		
        $data = $query->orderBy('urutan')
		->where(['publish'=>'Y'])
        ->all();	
		
		return $data;
	}
}
