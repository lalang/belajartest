<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp_pemegang".
 *
 * @property integer $id
 * @property integer $izin_tdp_id
 * @property string $izin_tdp_pemegang_nama
 * @property string $izin_tdp_pemegang_alamat
 * @property string $izin_tdp_pemegang_kodepos
 * @property string $izin_tdp_pemegang_tlpn
 * @property string $izin_tdp_pemegang_kewarganegaraan
 * @property string $izin_tdp_pemegang_npwp
 * @property integer $izin_tdp_pemegang_jum_saham
 * @property double $izin_tdp_pemegang_jum_modal
 *
 * @property \backend\models\IzinTdp $izinTdp
 */
class IzinTdpPemegang extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_pemegang';
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
            'izin_tdp_pemegang_nama' => 'Izin Tdp Pemegang Nama',
            'izin_tdp_pemegang_alamat' => 'Izin Tdp Pemegang Alamat',
            'izin_tdp_pemegang_kodepos' => 'Izin Tdp Pemegang Kodepos',
            'izin_tdp_pemegang_tlpn' => 'Izin Tdp Pemegang Tlpn',
            'izin_tdp_pemegang_kewarganegaraan' => 'Izin Tdp Pemegang Kewarganegaraan',
            'izin_tdp_pemegang_npwp' => 'Izin Tdp Pemegang Npwp',
            'izin_tdp_pemegang_jum_saham' => 'Izin Tdp Pemegang Jum Saham',
            'izin_tdp_pemegang_jum_modal' => 'Izin Tdp Pemegang Jum Modal',
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
     * @return \backend\models\IzinTdpPemegangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpPemegangQuery(get_called_class());
    }
}
