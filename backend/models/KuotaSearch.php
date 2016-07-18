<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\kuota;

/**
 * backend\models\kuotaSearch represents the model behind the search form about `backend\models\kuota`.
 */
class kuotaSearch extends kuota {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'lokasi_id', 'sesi_1_kuota', 'sesi_2_kuota', 'sesi_3_kuota'], 'integer'],
            [['sesi_1_mulai', 'sesi_1_selesai', 'sesi_2_mulai', 'sesi_2_selesai', 'sesi_3_mulai', 'sesi_3_selesai'], 'safe'],
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
        $query = kuota::find();

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
            'lokasi_id' => $this->lokasi_id,
            'sesi_1_kuota' => $this->sesi_1_kuota,
            'sesi_1_mulai' => $this->sesi_1_mulai,
            'sesi_1_selesai' => $this->sesi_1_selesai,
            'sesi_2_kuota' => $this->sesi_2_kuota,
            'sesi_2_mulai' => $this->sesi_2_mulai,
            'sesi_2_selesai' => $this->sesi_2_selesai,
            'sesi_3_kuota' => $this->sesi_3_kuota,
            'sesi_3_mulai' => $this->sesi_3_mulai,
            'sesi_3_selesai' => $this->sesi_3_selesai,
        ]);

        return $dataProvider;
    }

}
