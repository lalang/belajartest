<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPariwisataKbli;

/**
 * backend\models\IzinPariwisataKbliSearch represents the model behind the search form about `backend\models\IzinPariwisataKbli`.
 */
 class IzinPariwisataKbliSearch extends IzinPariwisataKbli
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_pariwisata_id', 'kbli_id'], 'integer'],
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
        $query = IzinPariwisataKbli::find();

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
            'kbli_id' => $this->kbli_id,
        ]);

        return $dataProvider;
    }
}
