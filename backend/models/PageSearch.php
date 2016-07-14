<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Page;

/**
 * backend\models\PageSearch represents the model behind the search form about `backend\models\Page`.
 */
class PageSearch extends Page {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'urutan'], 'integer'],
            [['judul', 'judul_seo', 'judul_en', 'judul_seo_en', 'description', 'description_en', 'gambar', 'tanggal', 'landing', 'publish'], 'safe'],
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
            'tanggal' => $this->tanggal,
            'urutan' => $this->urutan,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'judul_seo', $this->judul_seo])
                ->andFilterWhere(['like', 'judul_en', $this->judul_en])
                ->andFilterWhere(['like', 'judul_seo_en', $this->judul_seo_en])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'description_en', $this->description_en])
                ->andFilterWhere(['like', 'gambar', $this->gambar])
                ->andFilterWhere(['like', 'landing', $this->landing])
                ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }

    public function active_page_landing() {
        $query = Page::find();
        $data = $query->orderBy('urutan')
                ->where(['publish' => 'Y', 'landing' => 'Y'])
                ->all();

        return $data;
    }

    public function search_page($params, $lang) {
        if ($lang == "en") {
            $query = Page::find()->where(['judul_seo_en' => $params]);
        } else {
            $query = Page::find()->where(['judul_seo' => $params]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

}
