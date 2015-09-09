<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Page;

/**
 * backend\models\PageSearch represents the model behind the search form about `backend\models\Page`.
 */
 class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'page_urutan'], 'integer'],
            [['page_title', 'page_title_en', 'page_description', 'page_description_en', 'page_image', 'page_date', 'meta_title', 'meta_title_en', 'meta_description', 'meta_description_en', 'meta_keyword', 'meta_keyword_en'], 'safe'],
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
        $query = Page::find();

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
            'page_date' => $this->page_date,
            'page_urutan' => $this->page_urutan,
        ]);

        $query->andFilterWhere(['like', 'page_title', $this->page_title])
            ->andFilterWhere(['like', 'page_title_en', $this->page_title_en])
            ->andFilterWhere(['like', 'page_description', $this->page_description])
            ->andFilterWhere(['like', 'page_description_en', $this->page_description_en])
            ->andFilterWhere(['like', 'page_image', $this->page_image])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_title_en', $this->meta_title_en])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_description_en', $this->meta_description_en])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'meta_keyword_en', $this->meta_keyword_en]);
			
		$query->orderBy('page_urutan DESC');
		
        return $dataProvider;
    }
}
