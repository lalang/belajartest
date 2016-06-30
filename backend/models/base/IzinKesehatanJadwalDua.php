<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_kesehatan_jadwal_dua".
 *
 * @property integer $id
 * @property integer $izin_kesehatan_id
 * @property string $hari_praktik
 * @property string $jam_praktik
 *
 * @property \backend\models\IzinKesehatan $izinKesehatan
 */
class IzinKesehatanJadwalDua extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_kesehatan_id'], 'integer'],
            [['hari_praktik', 'jam_praktik'], 'string', 'max' => 150]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_kesehatan_jadwal_dua';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_kesehatan_id' => Yii::t('app', 'Izin Kesehatan ID'),
            'hari_praktik' => Yii::t('app', 'Hari Praktik'),
            'jam_praktik' => Yii::t('app', 'Jam Praktik'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinKesehatan()
    {
        return $this->hasOne(\backend\models\IzinKesehatan::className(), ['id' => 'izin_kesehatan_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinKesehatanJadwalDuaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinKesehatanJadwalDuaQuery(get_called_class());
    }
}
