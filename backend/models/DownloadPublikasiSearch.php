<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DownloadPublikasi;

/**
 * backend\models\DownloadPublikasiSearch represents the model behind the search form about `backend\models\DownloadPublikasi`.
 */
 class DownloadPublikasiSearch extends DownloadPublikasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'publikasi_id', 'diunduh'], 'integer'],
            [['judul', 'judul_eng', 'deskripsi', 'deskripsi_eng', 'nama_file', 'jenis_file', 'tanggal', 'publish'], 'safe'],
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
    public function search($params,$id)
    {
        $query = DownloadPublikasi::find()->where(['publikasi_id'=>$id]);

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
            'publikasi_id' => $this->publikasi_id,
            'tanggal' => $this->tanggal,
            'diunduh' => $this->diunduh,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'judul_eng', $this->judul_eng])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'deskripsi_eng', $this->deskripsi_eng])
            ->andFilterWhere(['like', 'nama_file', $this->nama_file])
            ->andFilterWhere(['like', 'jenis_file', $this->jenis_file])
            ->andFilterWhere(['like', 'publish', $this->publish]);

        return $dataProvider;
    }
}
