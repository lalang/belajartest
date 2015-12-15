<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\DocUserMan;

/**
 * frontend\models\DocUserManSearch represents the model behind the search form about `frontend\models\DocUserMan`.
 */
 class DocUserManSearch extends DocUserMan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_access', 'nama', 'docs'], 'safe'],
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
        $query = DocUserMan::find();

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
        ]);

        $query->andFilterWhere(['like', 'id_access', 'Pemohon'])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'docs', $this->docs]);
       
        $query->andWhere('doc_user_man.aktivasi = "Y"');
        return $dataProvider;
    }
}
