<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpKantor as BaseIzinTdpKantor;

/**
 * This is the model class for table "izin_tdp_kantor".
 */
class IzinTdpKantor extends BaseIzinTdpKantor
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_tdp_id', 'izin_tdp_kantor_nama', 'izin_tdp_kantor_notdp', 'izin_tdp_kantor_alamat', 'izin_tdp_kantor_kota', 'izin_tdp_kantor_propinsi', 'izin_tdp_kantor_kodepos', 'izin_tdp_kantor_tlpn', 'izin_tdp_kantor_status', 'izin_tdp_kantor_kegiatan_id'], 'required'],
            [['izin_tdp_id', 'izin_tdp_kantor_kegiatan_id'], 'integer'],
            [['izin_tdp_kantor_alamat'], 'string'],
            [['izin_tdp_kantor_nama'], 'string', 'max' => 100],
            [['izin_tdp_kantor_notdp'], 'string', 'max' => 20],
            [['izin_tdp_kantor_kota', 'izin_tdp_kantor_propinsi'], 'string', 'max' => 50],
            [['izin_tdp_kantor_kodepos'], 'string', 'max' => 5],
            [['izin_tdp_kantor_tlpn'], 'string', 'max' => 12],
            [['izin_tdp_kantor_status'], 'string', 'max' => 10],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
