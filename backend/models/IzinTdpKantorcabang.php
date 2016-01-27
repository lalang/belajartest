<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpKantorcabang as BaseIzinTdpKantorcabang;

/**
 * This is the model class for table "izin_tdp_kantorcabang".
 */
class IzinTdpKantorcabang extends BaseIzinTdpKantorcabang
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_tdp_id'], 'required'],
            [['izin_tdp_id', 'propinsi_id', 'kabupaten_id', 'status_prsh', 'kbli_id'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 200],
            [['no_tdp', 'no_telp'], 'string', 'max' => 50],
            [['kodepos'], 'string', 'max' => 10]
        ];
    }
	
}
