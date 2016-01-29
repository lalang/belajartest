<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpLegal as BaseIzinTdpLegal;

/**
 * This is the model class for table "izin_tdp_legal".
 */
class IzinTdpLegal extends BaseIzinTdpLegal
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_tdp_id'], 'required'],
            [['izin_tdp_id', 'jenis', 'masa_laku', 'create_by', 'update_by'], 'integer'],
            [['tanggal_dikeluarkan', 'create_date', 'update_date'], 'safe'],
            [['masa_laku_satuan'], 'string'],
            [['nomor', 'dikeluarkan_oleh'], 'string', 'max' => 200]
        ];
    }
	
}
