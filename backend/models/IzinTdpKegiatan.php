<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpKegiatan as BaseIzinTdpKegiatan;

/**
 * This is the model class for table "izin_tdp_kegiatan".
 */
class IzinTdpKegiatan extends BaseIzinTdpKegiatan
{
    public $izin_siup_id_ketg;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_tdp_id'], 'required'],
            [['izin_tdp_id', 'kbli_id'], 'integer'],
            [['flag_utama'], 'string'],
            [['produk'], 'string', 'max' => 200]
        ];
    }
	
}
