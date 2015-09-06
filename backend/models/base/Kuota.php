<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "kuota".
 *
 * @property integer $id
 * @property integer $lokasi_id
 * @property integer $sesi_1_kuota
 * @property string $sesi_1_mulai
 * @property string $sesi_1_selesai
 * @property integer $sesi_2_kuota
 * @property string $sesi_2_mulai
 * @property string $sesi_2_selesai
 * @property integer $sesi_3_kuota
 * @property string $sesi_3_mulai
 * @property string $sesi_3_selesai
 *
 * @property \backend\models\Lokasi $lokasi
 */
class Kuota extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kuota';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lokasi_id' => Yii::t('app', 'Lokasi ID'),
            'sesi_1_kuota' => Yii::t('app', 'Sesi 1 Kuota'),
            'sesi_1_mulai' => Yii::t('app', 'Sesi 1 Mulai'),
            'sesi_1_selesai' => Yii::t('app', 'Sesi 1 Selesai'),
            'sesi_2_kuota' => Yii::t('app', 'Sesi 2 Kuota'),
            'sesi_2_mulai' => Yii::t('app', 'Sesi 2 Mulai'),
            'sesi_2_selesai' => Yii::t('app', 'Sesi 2 Selesai'),
            'sesi_3_kuota' => Yii::t('app', 'Sesi 3 Kuota'),
            'sesi_3_mulai' => Yii::t('app', 'Sesi 3 Mulai'),
            'sesi_3_selesai' => Yii::t('app', 'Sesi 3 Selesai'),
        ];
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
     * @return \backend\models\KuotaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\KuotaQuery(get_called_class());
    }
}
