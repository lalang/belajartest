<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp_kantor".
 *
 * @property integer $id
 * @property integer $izin_tdp_id
 * @property string $izin_tdp_kantor_nama
 * @property string $izin_tdp_kantor_notdp
 * @property string $izin_tdp_kantor_alamat
 * @property string $izin_tdp_kantor_kota
 * @property string $izin_tdp_kantor_propinsi
 * @property string $izin_tdp_kantor_kodepos
 * @property string $izin_tdp_kantor_tlpn
 * @property string $izin_tdp_kantor_status
 * @property integer $izin_tdp_kantor_kegiatan_id
 *
 * @property \backend\models\IzinTdp $izinTdp
 * @property \backend\models\Kbli $izinTdpKantorKegiatan
 */
class IzinTdpKantor extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_kantor';
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
            'izin_tdp_kantor_nama' => 'Izin Tdp Kantor Nama',
            'izin_tdp_kantor_notdp' => 'Izin Tdp Kantor Notdp',
            'izin_tdp_kantor_alamat' => 'Izin Tdp Kantor Alamat',
            'izin_tdp_kantor_kota' => 'Izin Tdp Kantor Kota',
            'izin_tdp_kantor_propinsi' => 'Izin Tdp Kantor Propinsi',
            'izin_tdp_kantor_kodepos' => 'Izin Tdp Kantor Kodepos',
            'izin_tdp_kantor_tlpn' => 'Izin Tdp Kantor Tlpn',
            'izin_tdp_kantor_status' => 'Izin Tdp Kantor Status',
            'izin_tdp_kantor_kegiatan_id' => 'Izin Tdp Kantor Kegiatan ID',
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
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpKantorKegiatan()
    {
        return $this->hasOne(\backend\models\Kbli::className(), ['id' => 'izin_tdp_kantor_kegiatan_id']);
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
     * @return \backend\models\IzinTdpKantorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpKantorQuery(get_called_class());
    }
}
