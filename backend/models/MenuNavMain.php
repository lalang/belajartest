<?php

namespace backend\models;

use Yii;
use \backend\models\base\MenuNavMain as BaseMenuNavMain;

/**
 * This is the model class for table "menu_nav_main".
 */
class MenuNavMain extends BaseMenuNavMain
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['nama','nama_en', 'link', 'link_en', 'urutan'], 'required'],
            [['target', 'publish'], 'string'],
            [['urutan'], 'integer'],
            [['nama', 'nama_en'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 225]
        ];
    }
	
}
