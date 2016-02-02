<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "package".
 *
 * @property string $id
 * @property integer $izin_id
 * @property integer $paket_izin_id
 * @property string $status
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Izin $paketIzin
 */
class Package extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'paket_izin_id' => Yii::t('app', 'Paket Izin ID'),
            'status' => Yii::t('app', 'Status'),
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
    public function getPaketIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'paket_izin_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\PackageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PackageQuery(get_called_class());
    }
}
