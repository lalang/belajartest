<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPenelitianLokasi as BaseIzinPenelitianLokasi;

/**
 * This is the model class for table "izin_penelitian_lokasi".
 */
class IzinPenelitianLokasi extends BaseIzinPenelitianLokasi
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['penelitian_id', 'kota_id', 'kecamatan_id', 'kelurahan_id'], 'integer'],
            [['kota_id'], 'required'],
           
        ];
    }
	
}
