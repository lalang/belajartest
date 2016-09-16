<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPariwisataKapasitasTransport;

/**
 * backend\models\IzinPariwisataKapasitasTransportSearch represents the model behind the search form about `backend\models\IzinPariwisataKapasitasTransport`.
 */
 class IzinPariwisataKapasitasTransportSearch extends IzinPariwisataKapasitasTransport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_pariwisata_id', 'jumlah_kapasitas', 'jumlah_unit'], 'integer'],
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
        $query = IzinPariwisataKapasitasTransport::find();

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
            'jumlah_kapasitas' => $this->jumlah_kapasitas,
            'jumlah_unit' => $this->jumlah_unit,
        ]);

        return $dataProvider;
    }
}
