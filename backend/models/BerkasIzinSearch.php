<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BerkasIzin;

/**
 * backend\models\BerkasIzinSearch represents the model behind the search form about `backend\models\BerkasIzin`.
 */
class BerkasIzinSearch extends BerkasIzin {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'izin_id', 'urutan'], 'integer'],
            [['nama', 'extension', 'wajib', 'aktif'], 'safe'],
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
    public function search($params, $id) {
        $query = BerkasIzin::find()->where(['izin_id' => $id]);

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
            'izin_id' => $this->izin_id,
            'urutan' => $this->urutan,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
                ->andFilterWhere(['like', 'extension', $this->extension])
                ->andFilterWhere(['like', 'wajib', $this->wajib])
                ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }

}
