<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubLanding3;

/**
 * backend\models\SubLanding3Search represents the model behind the search form about `backend\models\SubLanding3`.
 */
 class SubLanding3Search extends SubLanding3
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
        $query = SubLanding3::find();

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
	
	public function getSubLan3Left(){
		$query = SubLanding3::find();
		$jml = floor(count($query->all())/2);
        $data = $query->orderBy('urutan')
		->where(['publish'=>'Y'])
		->limit($jml)
		->offset(0)
        ->all();	
		
		return $data;
	}
	
	public function getSubLan3Right(){
	
		$query = SubLanding3::find();
		$jml_all = count($query->all());
		$jml = floor(count($query->all())/2);
        $data = $query->orderBy('urutan')
		->where(['publish'=>'Y'])	
		->limit($jml_all)
		->offset($jml)
        ->all();	
		
		return $data;
	}
}
