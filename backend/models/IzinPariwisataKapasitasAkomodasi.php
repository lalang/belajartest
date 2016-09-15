<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataKapasitasAkomodasi as BaseIzinPariwisataKapasitasAkomodasi;

/**
 * This is the model class for table "izin_pariwisata_kapasitas_akomodasi".
 */
class IzinPariwisataKapasitasAkomodasi extends BaseIzinPariwisataKapasitasAkomodasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'tipe_kamar_id', 'jumlah_kapasitas', 'jumlah_unit'], 'integer']
        ]);
    }
	
}
