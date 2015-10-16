<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kantor".
 *
 * @property string $id
 * @property integer $lokasi_id
 * @property string $nama
 * @property string $alamat
 * @property string $kepala
 * @property double $latitude
 * @property double $longitude
 *
 * @property Lokasi $lokasi
 */
class Kantor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kantor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lokasi_id'], 'required'],
            [['lokasi_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['nama', 'kepala'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
            'nama' => Yii::t('app', 'Nama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'kepala' => Yii::t('app', 'Kepala'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(Lokasi::className(), ['id' => 'lokasi_id']);
    }
}
