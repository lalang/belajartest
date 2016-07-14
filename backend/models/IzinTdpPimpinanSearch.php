<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinTdpPimpinan;

/**
 * backend\models\IzinTdpPimpinanSearch represents the model behind the search form about `backend\models\IzinTdpPimpinan`.
 */
class IzinTdpPimpinanSearch extends IzinTdpPimpinan {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'izin_tdp_id', 'jabatan_id', 'kewarganegaraan_id', 'jabatan_lain_id', 'jml_lbr_saham'], 'integer'],
            [['nama_lengkap', 'tmplahir', 'tgllahir', 'alamat_lengkap', 'kodepos', 'telepon', 'mulai_jabat'], 'safe'],
            [['jml_rp_modal'], 'number'],
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
        $query = IzinTdpPimpinan::find();

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
            'jabatan_id' => $this->jabatan_id,
            'kewarganegaraan_id' => $this->kewarganegaraan_id,
            'jabatan_lain_id' => $this->jabatan_lain_id,
            'tgllahir' => $this->tgllahir,
            'mulai_jabat' => $this->mulai_jabat,
            'jml_lbr_saham' => $this->jml_lbr_saham,
            'jml_rp_modal' => $this->jml_rp_modal,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
                ->andFilterWhere(['like', 'tmplahir', $this->tmplahir])
                ->andFilterWhere(['like', 'alamat_lengkap', $this->alamat_lengkap])
                ->andFilterWhere(['like', 'kodepos', $this->kodepos])
                ->andFilterWhere(['like', 'telepon', $this->telepon]);

        return $dataProvider;
    }

}
