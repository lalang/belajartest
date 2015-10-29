<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubLanding1;

/**
 * backend\models\SubLanding1Search represents the model behind the search form about `backend\models\SubLanding1`.
 */
 class SubLanding1Search extends SubLanding1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_urut'], 'integer'],
            [['nama', 'nama_en'], 'safe'],
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
        $query = SubLanding1::find();

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
            'no_urut' => $this->no_urut,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nama_en', $this->nama_en]);

        return $dataProvider;
    }
	
	public function getSublan1Left(){
		$query = SubLanding1::find();
		$jml = floor(count($query->all())/2);
        $data = $query->orderBy('no_urut')
		->limit($jml)
		->offset(0)
        ->all();	
		
		return $data;
	}
	
	public function getSublan1Right(){
	
		$query = SubLanding1::find();
		$jml_all = count($query->all());
		$jml = floor(count($query->all())/2);
        $data = $query->orderBy('no_urut')
		->limit($jml_all)
		->offset($jml)
        ->all();	
		
		return $data;
	}
}
