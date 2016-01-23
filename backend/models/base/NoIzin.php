<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "no_izin".
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
class NoIzin extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'no_izin';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    //public function optimisticLock() {
     //   return 'lock';
   // }

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
            'no_izin' => Yii::t('app', 'No Izin'),
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
     * @return \backend\models\NoIzinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\NoIzinQuery(get_called_class());
    }
}
