<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "history_plh".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_lokasi
 * @property integer $user_plh_id
 * @property integer $user_plh_lokasi
 * @property string $tanggal_mulai
 * @property string $tanggal_akhir
 * @property string $status
 *
 * @property \backend\models\Perizinan[] $perizinans
 */
class HistoryPlh extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history_plh';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Username'),
            'user_lokasi' => Yii::t('app', 'User Lokasi'),
            'user_plh_id' => Yii::t('app', 'Username PLH'),
            'user_plh_lokasi' => Yii::t('app', 'User Plh Lokasi'),
            'tanggal_mulai' => Yii::t('app', 'Tanggal Mulai'),
            'tanggal_akhir' => Yii::t('app', 'Tanggal Akhir'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinans()
    {
        return $this->hasMany(\backend\models\Perizinan::className(), ['plh_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\HistoryPlhQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\HistoryPlhQuery(get_called_class());
    }
    
}
