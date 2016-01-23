<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisIzin as BaseJenisIzin;

/**
 * This is the model class for table "jenis_izin".
 */
class JenisIzin extends BaseJenisIzin
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50]
        ];
    }
	
}
