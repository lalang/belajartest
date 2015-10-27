<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TitleSubLanding;

/**
 * backend\models\TitleSubLandingSearch represents the model behind the search form about `backend\models\TitleSubLanding`.
 */
 class TitleSubLandingSearch extends TitleSubLanding
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama','nama_en','publish'], 'safe'],
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
        $query = TitleSubLanding::find();

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
			->andFilterWhere(['like', 'nama_en', $this->nama_en])
            ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }
	
	public function searchTitleSubLan(){
	
		$query = TitleSubLanding::find();
        $data = $query->orderBy('id')
		->where(['publish'=>'Y'])	
        ->all();	
		
		return $data;
	}
}
