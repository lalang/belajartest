<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kontak;

/**
 * backend\models\KontakSearch represents the model behind the search form about `backend\models\Kontak`.
 */
 class KontakSearch extends Kontak
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tlp'], 'integer'],
            [['judul', 'judul_en', 'info_main', 'info_main_en', 'info_sub', 'info_sub_en', 'alamat', 'alamat_en', 'email'], 'safe'],
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
        $query = Kontak::find();

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
            'tlp' => $this->tlp,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'judul_en', $this->judul_en])
            ->andFilterWhere(['like', 'info_main', $this->info_main])
            ->andFilterWhere(['like', 'info_main_en', $this->info_main_en])
            ->andFilterWhere(['like', 'info_sub', $this->info_sub])
            ->andFilterWhere(['like', 'info_sub_en', $this->info_sub_en])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'alamat_en', $this->alamat_en])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
	
	public function active_kontak(){ 
	
		$model = Kontak::findOne('1');
		return $model;
	}
}
