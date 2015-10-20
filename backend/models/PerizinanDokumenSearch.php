<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PerizinanDokumen;

/**
 * backend\models\PerizinanDokumenSearch represents the model behind the search form about `backend\models\PerizinanDokumen`.
 */
 class PerizinanDokumenSearch extends PerizinanDokumen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'perizinan_id', 'dokumen_pendukung_id', 'urutan', 'check', 'user_check'], 'integer'],
            [['isi', 'file', 'keterangan', 'time_check'], 'safe'],
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
        $query = PerizinanDokumen::find();

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
            'perizinan_id' => $this->perizinan_id,
            'dokumen_pendukung_id' => $this->dokumen_pendukung_id,
            'urutan' => $this->urutan,
            'check' => $this->check,
            'user_check' => $this->user_check,
            'time_check' => $this->time_check,
        ]);

        $query->andFilterWhere(['like', 'isi', $this->isi])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
