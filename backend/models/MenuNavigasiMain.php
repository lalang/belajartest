<?php

namespace backend\models;

use Yii;
use \backend\models\base\MenuNavigasiMain as BaseMenuNavigasiMain;

/**
 * This is the model class for table "menu_nav".
 */
class MenuNavigasiMain extends BaseMenuNavigasiMain
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target', 'publish'], 'string'],
            [['urutan'], 'integer'],
            [['nama', 'nama_en'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 225]
        ];
    }
	
}
