<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataFasilitas as BaseIzinPariwisataFasilitas;

/**
 * This is the model class for table "izin_pariwisata_fasilitas".
 */
class IzinPariwisataFasilitas extends BaseIzinPariwisataFasilitas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'fasilitas_kamar_id'], 'integer']
        ]);
    }
	
}
