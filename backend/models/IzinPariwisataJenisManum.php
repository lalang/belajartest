<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataJenisManum as BaseIzinPariwisataJenisManum;

/**
 * This is the model class for table "izin_pariwisata_jenis_manum".
 */
class IzinPariwisataJenisManum extends BaseIzinPariwisataJenisManum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'jenis_manum_id'], 'integer']
        ]);
    }
	
}
