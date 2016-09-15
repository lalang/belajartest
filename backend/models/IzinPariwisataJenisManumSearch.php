<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPariwisataJenisManum;

/**
 * backend\models\IzinPariwisataJenisManumSearch represents the model behind the search form about `backend\models\IzinPariwisataJenisManum`.
 */
 class IzinPariwisataJenisManumSearch extends IzinPariwisataJenisManum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_pariwisata_id', 'jenis_manum_id'], 'integer'],
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
        $query = IzinPariwisataJenisManum::find();

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
            'izin_pariwisata_id' => $this->izin_pariwisata_id,
            'jenis_manum_id' => $this->jenis_manum_id,
        ]);

        return $dataProvider;
    }
}
