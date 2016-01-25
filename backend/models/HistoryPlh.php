<?php

namespace backend\models;

use Yii;
use \backend\models\base\HistoryPlh as BaseHistoryPlh;

/**
 * This is the model class for table "history_plh".
 */
class HistoryPlh extends BaseHistoryPlh
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_plh_id', 'tanggal_mulai', 'tanggal_akhir'], 'required'],
            [['user_id', 'user_lokasi', 'user_plh_id', 'user_plh_lokasi'], 'integer'],
            [['tanggal_mulai', 'tanggal_akhir'], 'safe'],
            [['tanggal_akhir'], 'compare', 'compareAttribute'=>'tanggal_mulai', 'operator'=>'>='],
            [['status'], 'string']
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }
    
    public function getUser_plh()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_plh_id']);
    }
    
    public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'user_lokasi']);
    }
    
    public function getLokasi_plh()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'user_plh_lokasi']);
    }
	
}
