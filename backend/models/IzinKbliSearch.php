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
			//[['id', 'kbli_id', 'izin_id'], 'integer'],
            [['id'], 'integer'],
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
		
		if(!empty($params['id']) and !empty($params['IzinKbliSearch']['kbli_id'])){ 
			$query = IzinKbli::find()->joinWith('kbli')->where(['izin_id'=>$params['id']])->andFilterWhere(['like', 'kbli.nama', $params['IzinKbliSearch']['kbli_id']])->orderBy('id desc');			
		}elseif(!empty($params['id']) and !empty($params['IzinKbliSearch']['kode_kbli_id'])){ 
			$query = IzinKbli::find()->joinWith('kbli')->where(['izin_id'=>$params['id']])->andFilterWhere(['like', 'kbli.kode', trim($params['IzinKbliSearch']['kode_kbli_id'])])->orderBy('id desc');		
		}else{
			$query = IzinKbli::find()->where(['izin_id'=>$id])->orderBy('id desc');
		}
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

        $query->andFilterWhere(['like', 'kbli_id', $this->kbli_id])
            ->andFilterWhere(['like', 'izin_id', $this->izin_id]);
	//	echo"<pre>";print_r($dataProvider);die();
        return $dataProvider;
    }
}
