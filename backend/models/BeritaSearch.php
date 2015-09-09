<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Berita;

/**
 * backend\models\BeritaSearch represents the model behind the search form about `backend\models\Berita`.
 */
 class BeritaSearch extends Berita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dibaca'], 'integer'],
            [['username', 'judul', 'judul_seo', 'headline', 'isi_berita', 'gambar', 'publish', 'hari', 'tanggal', 'jam', 'tag', 'judul_en', 'isi_berita_en', 'meta_title', 'meta_description', 'meta_keyword', 'meta_title_en', 'meta_description_en', 'meta_keyword_en'], 'safe'],
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
        $query = Berita::find();

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
            'jam' => $this->jam,
            'dibaca' => $this->dibaca,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'judul_seo', $this->judul_seo])
            ->andFilterWhere(['like', 'headline', $this->headline])
            ->andFilterWhere(['like', 'isi_berita', $this->isi_berita])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'publish', $this->publish])
            ->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'judul_en', $this->judul_en])
            ->andFilterWhere(['like', 'isi_berita_en', $this->isi_berita_en])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword])
            ->andFilterWhere(['like', 'meta_title_en', $this->meta_title_en])
            ->andFilterWhere(['like', 'meta_description_en', $this->meta_description_en])
            ->andFilterWhere(['like', 'meta_keyword_en', $this->meta_keyword_en]);

        return $dataProvider;
    }
}
