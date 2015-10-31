<?php

namespace backend\models;

use Yii;
use \backend\models\base\Publikasi as BasePublikasi;

/**
 * This is the model class for table "publikasi".
 */
class Publikasi extends BasePublikasi
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['urutan'], 'integer'],
            [['publish'], 'string'],
            [['nama', 'nama_en'], 'string', 'max' => 225]
        ];
    }
	
}