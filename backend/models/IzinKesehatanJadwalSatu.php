<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKesehatanJadwalSatu as BaseIzinKesehatanJadwalSatu;

/**
 * This is the model class for table "izin_kesehatan_jadwal_satu".
 */
class IzinKesehatanJadwalSatu extends BaseIzinKesehatanJadwalSatu {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['izin_kesehatan_id'], 'integer'],
            [['hari_praktik', 'jam_praktik'], 'string', 'max' => 150]
        ];
    }

}
