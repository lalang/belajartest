<?php

namespace backend\models;

use Yii;
use \backend\models\base\MenuNavigasiSub as BaseMenuNavigasiSub;

/**
 * This is the model class for table "menu_nav_sub".
 */
class MenuNavigasiSub extends BaseMenuNavigasiSub
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu_nav', 'urutan'], 'integer'],
            [['target', 'publish'], 'string'],
            [['nama', 'nama_en'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 225]
        ];
    }
	
}