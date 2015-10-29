<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "no_penolakan".
 *
 * @property integer $id
 * @property string $tahun
 * @property integer $lokasi_id
 * @property integer $izin_id
 * @property integer $no_izin
 *
 * @property Izin $izin
 * @property Lokasi $lokasi
 */
class NoPenolakan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'no_penolakan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun', 'lokasi_id', 'izin_id', 'no_izin'], 'required'],
            [['tahun'], 'safe'],
            [['lokasi_id', 'izin_id', 'no_izin'], 'integer']
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
