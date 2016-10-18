<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubJenisUsaha;

/**
 * backend\models\SubJenisUsahaSearch represents the model behind the search form about `backend\models\SubJenisUsaha`.
 */
 class SubJenisUsahaSearch extends SubJenisUsaha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_usaha_id'], 'integer'],
            [['keterangan', 'aktif'], 'safe'],
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
    public function search($params, $id)
    {
        $query = SubJenisUsaha::find()->where(['jenis_usaha_id' => $id])->orderBy('id asc');

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
            'jenis_usaha_id' => $this->jenis_usaha_id,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
