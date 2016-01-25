<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DocUserMan;

/**
 * backend\models\DocUserManSearch represents the model behind the search form about `backend\models\DocUserMan`.
 */
 class DocUserManSearch extends DocUserMan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_access'], 'integer'],
            
            [['docs', 'nama'], 'safe'],
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
 if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster'))
    { 
            $query->andFilterWhere([
            'id' => $this->id,
            'id_access' => $this->id_access,
            
        ]);
    }
    elseif(Yii::$app->user->can('Petugas')){
     $query->andFilterWhere([
            'id' => $this->id,
            'id_access' => 'Petugas',
            'aktivasi' => 'Y'
            
        ]);
     }
    else{
     $query->andFilterWhere([
            'id' => $this->id,
            'id_access' => 'Pemohon',
            'aktivasi' => 'Y'
            
        ]);
     //$query->andWhere('doc_user_man.aktivasi = "Y"');
    }
        $query->andFilterWhere(['like', 'docs', $this->docs])->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
