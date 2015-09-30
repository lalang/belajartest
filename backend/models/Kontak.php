<?php

namespace backend\models;

use Yii;
use \backend\models\base\Kontak as BaseKontak;

/**
 * This is the model class for table "kontak".
 */
class Kontak extends BaseKontak
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['judul','judul_en','info_main', 'info_main_en', 'info_sub', 'info_sub_en', 'alamat', 'alamat_en','tlp','judul','email'], 'required'],
            [['info_main', 'info_main_en', 'info_sub', 'info_sub_en', 'alamat', 'alamat_en'], 'string'],
            [['judul', 'judul_en','tlp'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 200]
        ];
    }
	
}
