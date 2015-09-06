<?php

namespace backend\models;

use Yii;
use \backend\models\base\Kuota as BaseKuota;

/**
 * This is the model class for table "kuota".
 */
class Kuota extends BaseKuota
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lokasi_id'], 'required'],
            [['lokasi_id', 'sesi_1_kuota', 'sesi_2_kuota', 'sesi_3_kuota'], 'integer'],
            [['sesi_1_mulai', 'sesi_1_selesai', 'sesi_2_mulai', 'sesi_2_selesai', 'sesi_3_mulai', 'sesi_3_selesai'], 'safe']
        ];
    }
	
}
