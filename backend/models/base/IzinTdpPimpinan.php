<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp_pimpinan".
 *
 * @property integer $id
 * @property integer $izin_tdp_id
 * @property integer $izin_tdp_pimpinan_kedudukan
 * @property string $izin_tdp_pimpinan_nama
 * @property integer $izin_tdp_pimpinan
 * @property string $izin_tdp_pimpinan_tmpt_lahir
 * @property string $izin_tdp_pimpinan_tgl_lahir
 * @property string $izin_tdp_pimpinan_alamat
 * @property string $izin_tdp_pimpinan_kodepos
 * @property string $izin_tdp_pimpinan_tlpn
 * @property string $izin_tdp_pimpinan_kewarganegara
 * @property string $izin_tdp_pimpinan_tgl_mulai
 * @property string $izin_tdp_pimpinan_jum_saham
 * @property double $izin_tdp_pimpinan_jum_modal
 * @property string $izin_tdp_pimpinan_kedudukan_lain
 * @property string $izin_tdp_pimpinan_nama_perusahaan
 * @property string $izin_tdp_pimpinan_alamat_perusahaan
 * @property string $izin_tdp_pimpinan_kodepos_perusahaan
 * @property string $izin_tdp_pimpinan_tlpn_perusahaan
 * @property string $izin_tdp_pimpinan_tgl_mulai_perusahaan
 *
 * @property \backend\models\IzinTdp $izinTdp
 */
class IzinTdpPimpinan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_pimpinan';
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
            'izin_tdp_pimpinan_kedudukan' => 'Izin Tdp Pimpinan Kedudukan',
            'izin_tdp_pimpinan_nama' => 'Izin Tdp Pimpinan Nama',
            'izin_tdp_pimpinan' => 'Izin Tdp Pimpinan',
            'izin_tdp_pimpinan_tmpt_lahir' => 'Izin Tdp Pimpinan Tmpt Lahir',
            'izin_tdp_pimpinan_tgl_lahir' => 'Izin Tdp Pimpinan Tgl Lahir',
            'izin_tdp_pimpinan_alamat' => 'Izin Tdp Pimpinan Alamat',
            'izin_tdp_pimpinan_kodepos' => 'Izin Tdp Pimpinan Kodepos',
            'izin_tdp_pimpinan_tlpn' => 'Izin Tdp Pimpinan Tlpn',
            'izin_tdp_pimpinan_kewarganegara' => 'Izin Tdp Pimpinan Kewarganegara',
            'izin_tdp_pimpinan_tgl_mulai' => 'Izin Tdp Pimpinan Tgl Mulai',
            'izin_tdp_pimpinan_jum_saham' => 'Izin Tdp Pimpinan Jum Saham',
            'izin_tdp_pimpinan_jum_modal' => 'Izin Tdp Pimpinan Jum Modal',
            'izin_tdp_pimpinan_kedudukan_lain' => 'Izin Tdp Pimpinan Kedudukan Lain',
            'izin_tdp_pimpinan_nama_perusahaan' => 'Izin Tdp Pimpinan Nama Perusahaan',
            'izin_tdp_pimpinan_alamat_perusahaan' => 'Izin Tdp Pimpinan Alamat Perusahaan',
            'izin_tdp_pimpinan_kodepos_perusahaan' => 'Izin Tdp Pimpinan Kodepos Perusahaan',
            'izin_tdp_pimpinan_tlpn_perusahaan' => 'Izin Tdp Pimpinan Tlpn Perusahaan',
            'izin_tdp_pimpinan_tgl_mulai_perusahaan' => 'Izin Tdp Pimpinan Tgl Mulai Perusahaan',
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
     * @return \backend\models\IzinTdpPimpinanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpPimpinanQuery(get_called_class());
    }
}
