<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPariwisataTeknis;

/**
 * backend\models\IzinPariwisataTeknisSearch represents the model behind the search form about `backend\models\IzinPariwisataTeknis`.
 */
 class IzinPariwisataTeknisSearch extends IzinPariwisataTeknis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_pariwisata_id', 'jenis_izin_id'], 'integer'],
            [['no_izin', 'tanggal_izin', 'tanggal_masa_berlaku'], 'safe'],
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
        $query = IzinPariwisataTeknis::find();

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
            'jenis_izin_id' => $this->jenis_izin_id,
            'tanggal_izin' => $this->tanggal_izin,
            'tanggal_masa_berlaku' => $this->tanggal_masa_berlaku,
        ]);

        $query->andFilterWhere(['like', 'no_izin', $this->no_izin]);

        return $dataProvider;
    }
}