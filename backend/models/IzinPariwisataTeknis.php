<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPariwisataTeknis as BaseIzinPariwisataTeknis;

/**
 * This is the model class for table "izin_pariwisata_teknis".
 */
class IzinPariwisataTeknis extends BaseIzinPariwisataTeknis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['izin_pariwisata_id', 'jenis_izin_pariwisata_id'], 'integer'],
            [['tanggal_izin', 'tanggal_masa_berlaku'], 'safe'],
            [['no_izin'], 'string', 'max' => 100]
        ]);
    }
	
}
