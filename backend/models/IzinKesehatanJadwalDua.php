<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKesehatanJadwalDua as BaseIzinKesehatanJadwalDua;

/**
 * This is the model class for table "izin_kesehatan_jadwal_dua".
 */
class IzinKesehatanJadwalDua extends BaseIzinKesehatanJadwalDua
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_kesehatan_id'], 'integer'],
            [['hari_praktik', 'jam_praktik'], 'string', 'max' => 150]
        ];
    }
	
}
