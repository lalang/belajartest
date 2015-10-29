<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "no_izin".
 *
 * @property integer $id
 * @property string $tahun
 * @property integer $lokasi_id
 * @property integer $izin_id
 * @property string $no_izin
 *
 * @property Izin $izin
 * @property Lokasi $lokasi
 */
class NoIzin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'no_izin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tahun', 'lokasi_id', 'izin_id', 'no_izin'], 'required'],
            [['id', 'lokasi_id', 'izin_id'], 'integer'],
            [['tahun'], 'safe'],
            [['no_izin'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'lokasi_id' => 'Lokasi ID',
            'izin_id' => 'Izin ID',
            'no_izin' => 'No Izin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(Lokasi::className(), ['id' => 'lokasi_id']);
    }
}
