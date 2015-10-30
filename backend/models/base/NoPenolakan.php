<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "no_penolakan".
 *
 * @property integer $id
 * @property string $tahun
 * @property integer $lokasi_id
 * @property integer $izin_id
 * @property integer $no_izin
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Lokasi $lokasi
 */
class NoPenolakan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'no_penolakan';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
   // public function optimisticLock() {
    //    return 'lock';
    //}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tahun' => Yii::t('app', 'Tahun'),
            'lokasi_id' => Yii::t('app', 'Nama Lokasi'),
            'izin_id' => Yii::t('app', 'Nama Izin'),
            'no_izin' => Yii::t('app', 'No Penolakan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
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
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\NoPenolakanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\NoPenolakanQuery(get_called_class());
    }
}
