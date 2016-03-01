<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpKantor;

/**
 * backend\models\IzinTdpKantorSearch represents the model behind the search form about `backend\models\IzinTdpKantor`.
 */
 class IzinTdpKantorSearch extends IzinTdpKantor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'izin_tdp_id', 'izin_tdp_kantor_kegiatan_id'], 'integer'],
            [['izin_tdp_kantor_nama', 'izin_tdp_kantor_notdp', 'izin_tdp_kantor_alamat', 'izin_tdp_kantor_kota', 'izin_tdp_kantor_propinsi', 'izin_tdp_kantor_kodepos', 'izin_tdp_kantor_tlpn', 'izin_tdp_kantor_status'], 'safe'],
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
        $query = IzinTdpKantor::find();

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
            'izin_tdp_kantor_kegiatan_id' => $this->izin_tdp_kantor_kegiatan_id,
        ]);

        $query->andFilterWhere(['like', 'izin_tdp_kantor_nama', $this->izin_tdp_kantor_nama])
            ->andFilterWhere(['like', 'izin_tdp_kantor_notdp', $this->izin_tdp_kantor_notdp])
            ->andFilterWhere(['like', 'izin_tdp_kantor_alamat', $this->izin_tdp_kantor_alamat])
            ->andFilterWhere(['like', 'izin_tdp_kantor_kota', $this->izin_tdp_kantor_kota])
            ->andFilterWhere(['like', 'izin_tdp_kantor_propinsi', $this->izin_tdp_kantor_propinsi])
            ->andFilterWhere(['like', 'izin_tdp_kantor_kodepos', $this->izin_tdp_kantor_kodepos])
            ->andFilterWhere(['like', 'izin_tdp_kantor_tlpn', $this->izin_tdp_kantor_tlpn])
            ->andFilterWhere(['like', 'izin_tdp_kantor_status', $this->izin_tdp_kantor_status]);

        return $dataProvider;
    }
}
