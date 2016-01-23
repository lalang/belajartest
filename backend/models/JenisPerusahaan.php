<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisPerusahaan as BaseJenisPerusahaan;

/**
 * This is the model class for table "jenis_perusahaan".
 */
class JenisPerusahaan extends BaseJenisPerusahaan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 200]
        ];
    }
	
}
