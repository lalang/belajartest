<?php

namespace backend\models;

use Yii;
use \backend\models\base\StatusPerusahaan as BaseStatusPerusahaan;

/**
 * This is the model class for table "status_perusahaan".
 */
class StatusPerusahaan extends BaseStatusPerusahaan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['urutan','nama'], 'required'],
            [['urutan'], 'integer'],
            [['publish'], 'string'],
            [['nama'], 'string', 'max' => 100]
        ];
    }
	
}
