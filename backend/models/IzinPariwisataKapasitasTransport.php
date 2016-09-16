<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataKapasitasTransport as BaseIzinPariwisataKapasitasTransport;

/**
 * This is the model class for table "izin_pariwisata_kapasitas_transport".
 */
class IzinPariwisataKapasitasTransport extends BaseIzinPariwisataKapasitasTransport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'jumlah_kapasitas', 'jumlah_unit'], 'integer']
        ]);
    }
	
}
