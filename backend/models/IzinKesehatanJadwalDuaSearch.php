<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinKesehatanJadwalDua;

/**
 * backend\models\IzinKesehatanJadwalDuaSearch represents the model behind the search form about `backend\models\IzinKesehatanJadwalDua`.
 */
class IzinKesehatanJadwalDuaSearch extends IzinKesehatanJadwalDua {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'izin_kesehatan_id'], 'integer'],
            [['hari_praktik', 'jam_praktik'], 'safe'],
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
        $query = IzinKesehatanJadwalDua::find();

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
            'izin_kesehatan_id' => $this->izin_kesehatan_id,
        ]);

        $query->andFilterWhere(['like', 'hari_praktik', $this->hari_praktik])
                ->andFilterWhere(['like', 'jam_praktik', $this->jam_praktik]);

        return $dataProvider;
    }

}
