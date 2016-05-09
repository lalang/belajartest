<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "lokasi_penelitian".
 *
 * @property integer $id
 * @property integer $penelitian_id
 * @property integer $lokasi_id
 *
 * @property \backend\models\IzinPenelitian $penelitian
 * @property \backend\models\Lokasi $lokasi
 */
class LokasiPenelitian extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lokasi_penelitian';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'penelitian_id' => Yii::t('app', 'Penelitian ID'),
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenelitian()
    {
        return $this->hasOne(\backend\models\IzinPenelitian::className(), ['id' => 'penelitian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\LokasiPenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\LokasiPenelitianQuery(get_called_class());
    }
}
