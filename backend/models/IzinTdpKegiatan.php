<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinTdpKegiatan as BaseIzinTdpKegiatan;

/**
 * This is the model class for table "izin_tdp_kegiatan".
 */
class IzinTdpKegiatan extends BaseIzinTdpKegiatan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kbli_id', 'izin_tdp_id'], 'required'],
            [['kbli_id', 'izin_tdp_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
