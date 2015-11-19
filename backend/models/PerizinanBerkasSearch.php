<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PerizinanBerkas;

/**
 * backend\models\PerizinanBerkasSearch represents the model behind the search form about `backend\models\PerizinanBerkas`.
 */
 class PerizinanBerkasSearch extends PerizinanBerkas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['perizinan_id', 'berkas_izin_id', 'user_file_id','urutan'], 'safe'],
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
        $query = PerizinanBerkas::find();

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

        $query->andFilterWhere(['like', 'perizinan_id', $this->perizinan_id])
            ->andFilterWhere(['like', 'berkas_izin_id', $this->berkas_izin_id])
            ->andFilterWhere(['like', 'user_file_id', $this->user_file_id]);

        return $dataProvider;
    }
	
	public function searchBerkas($params){ 
		$query = PerizinanBerkas::find();		
        $data = $query->orderBy('urutan')
		->where(['perizinan_id'=>$params])
        ->all();	
		return $data;
	}

}
