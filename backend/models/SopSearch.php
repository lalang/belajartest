<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sop;

/**
 * backend\models\SopSearch represents the model behind the search form about `backend\models\Sop`.
 */
 class SopSearch extends Sop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_id', 'status_id', 'pelaksana_id', 'durasi', 'urutan', 'action_id'], 'integer'],
            [['nama_sop', 'deskripsi_sop', 'durasi_satuan', 'aktif'], 'safe'],
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
        /* Eko 261115 - order by disesuaikan dengan kebutuhan user */
        $query = Sop::find()->where(['izin_id'=>$id])->orderBy('urutan asc');

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
            'status_id' => $this->status_id,
            'pelaksana_id' => $this->pelaksana_id,
            'durasi' => $this->durasi,
            'urutan' => $this->urutan,
            'action_id' => $this->action_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status_id])
            ->andFilterWhere(['like', 'nama_sop', $this->nama_sop])
            ->andFilterWhere(['like', 'deskripsi_sop', $this->deskripsi_sop])
            ->andFilterWhere(['like', 'durasi_satuan', $this->durasi_satuan])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
