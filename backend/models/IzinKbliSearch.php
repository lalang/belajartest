<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinKbli;

/**
 * backend\models\IzinKbliSearch represents the model behind the search form about `backend\models\IzinKbli`.
 */
 class IzinKbliSearch extends IzinKbli
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kbli_id', 'izin_id'], 'integer'],
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
        $query = IzinKbli::find()->where(['izin_id'=>$id])->orderBy('id desc');

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
            'kbli_id' => $this->kbli_id,
            'izin_id' => $this->izin_id,
        ]);

        return $dataProvider;
    }
}
