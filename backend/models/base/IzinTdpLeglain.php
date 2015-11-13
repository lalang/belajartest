<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp_leglain".
 *
 * @property integer $id
 * @property integer $izin_tdp_id
 * @property string $izin_tdp_leglain_nama_petugas
 *
 * @property \backend\models\IzinTdp $izinTdp
 */
class IzinTdpLeglain extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_leglain';
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
            'id' => 'ID',
            'izin_tdp_id' => 'Izin Tdp ID',
            'izin_tdp_leglain_nama_petugas' => 'Izin Tdp Leglain Nama Petugas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdp()
    {
        return $this->hasOne(\backend\models\IzinTdp::className(), ['id' => 'izin_tdp_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdpLeglainQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpLeglainQuery(get_called_class());
    }
}
