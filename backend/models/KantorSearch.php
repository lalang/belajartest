<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kantor;

/**
 * backend\models\KantorSearch represents the model behind the search form about `backend\models\Kantor`.
 */
 class KantorSearch extends Kantor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lokasi_id'], 'integer'],
            [['nama', 'kepala', 'alamat', 'kodepos', 'telepon', 'fax', 'email_jak_go_id', 'email_kelurahan', 'email_ptsp', 'twitter'], 'safe'],
            [['latitude', 'longitude'], 'number'],
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
        $query = Kantor::find();

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
            'lokasi_id' => $this->lokasi_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'kepala', $this->kepala])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email_jak_go_id', $this->email_jak_go_id])
            ->andFilterWhere(['like', 'email_kelurahan', $this->email_kelurahan])
            ->andFilterWhere(['like', 'email_ptsp', $this->email_ptsp])
            ->andFilterWhere(['like', 'twitter', $this->twitter]);

        return $dataProvider;
    }
	
	public function search_lokasi_id($lokasi_id)
    {
		$customer = Kantor::find()->where(['lokasi_id' => $lokasi_id])->one();
		
		return $customer;
	}	
	
	public function all_kantor(){

		$data = Kantor::find()
		->select(['nama as value', 'nama as  label','id as id'])
		->asArray()
		->all();
			
		
		return $data;
	}
	
	public function search_lokasi_nama($nama)
    {
		$data = Kantor::find()->where(['nama' => $nama])->one();
		
		return $data;
	}
}
