<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataKbli as BaseIzinPariwisataKbli;

/**
 * This is the model class for table "izin_pariwisata_kbli".
 */
class IzinPariwisataKbli extends BaseIzinPariwisataKbli
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'kbli_id'], 'integer']
        ]);
    }
	
}
