<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpKegiatan;

/**
 * backend\models\IzinTdpKegiatanSearch represents the model behind the search form about `backend\models\IzinTdpKegiatan`.
 */
 class IzinTdpKegiatanSearch extends IzinTdpKegiatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kbli_id', 'izin_tdp_id'], 'integer'],
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
        $query = IzinTdpKegiatan::find();

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
            'kbli_id' => $this->kbli_id,
            'izin_tdp_id' => $this->izin_tdp_id,
        ]);

        return $dataProvider;
    }
}
