<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpLegal;

/**
 * backend\models\IzinTdpLegalSearch represents the model behind the search form about `backend\models\IzinTdpLegal`.
 */
 class IzinTdpLegalSearch extends IzinTdpLegal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'jenis', 'masa_laku', 'create_by', 'update_by'], 'integer'],
            [['nomor', 'dikeluarkan_oleh', 'tanggal_dikeluarkan', 'masa_laku_satuan', 'create_date', 'update_date'], 'safe'],
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
        $query = IzinTdpLegal::find();

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
            'izin_tdp_id' => $this->izin_tdp_id,
            'jenis' => $this->jenis,
            'tanggal_dikeluarkan' => $this->tanggal_dikeluarkan,
            'masa_laku' => $this->masa_laku,
            'create_by' => $this->create_by,
            'create_date' => $this->create_date,
            'update_by' => $this->update_by,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'nomor', $this->nomor])
            ->andFilterWhere(['like', 'dikeluarkan_oleh', $this->dikeluarkan_oleh])
            ->andFilterWhere(['like', 'masa_laku_satuan', $this->masa_laku_satuan]);

        return $dataProvider;
    }
}
