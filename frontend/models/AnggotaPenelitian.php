<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\AnggotaPenelitian as BaseAnggotaPenelitian;

/**
 * This is the model class for table "anggota_penelitian".
 */
class AnggotaPenelitian extends BaseAnggotaPenelitian
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['penelitian_id', 'nik_peneliti', 'nama_peneliti'], 'integer'],
            [['bidang'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
