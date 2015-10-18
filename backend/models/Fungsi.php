<?php

namespace backend\models;

use Yii;
use \backend\models\base\Fungsi as BaseFungsi;

/**
 * This is the model class for table "fungsi".
 */
class Fungsi extends BaseFungsi
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['no_urut','nama','nama_en'], 'required'],
            [['no_urut'], 'integer'],
            [['nama', 'nama_en'], 'string', 'max' => 200]
        ];
    }
	
}
