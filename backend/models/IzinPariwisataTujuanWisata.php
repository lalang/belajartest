<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataTujuanWisata as BaseIzinPariwisataTujuanWisata;

/**
 * This is the model class for table "izin_pariwisata_tujuan_wisata".
 */
class IzinPariwisataTujuanWisata extends BaseIzinPariwisataTujuanWisata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'tujuan_wisata_id'], 'integer']
        ]);
    }
	
}
