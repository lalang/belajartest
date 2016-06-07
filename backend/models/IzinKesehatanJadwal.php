<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKesehatanJadwal as BaseIzinKesehatanJadwal;

/**
 * This is the model class for table "izin_kesehatan_jadwal".
 */
class IzinKesehatanJadwal extends BaseIzinKesehatanJadwal
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
