<?php

namespace backend\models;

use Yii;
use \backend\models\base\Manfaat as BaseManfaat;

/**
 * This is the model class for table "manfaat".
 */
class Manfaat extends BaseManfaat
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['icon','info', 'info_en','urutan','link','link_en','target','publish'], 'required'],
            [['info', 'info_en', 'target', 'publish'], 'string'],
            [['urutan'], 'integer'],
            [['icon'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 250]
        ];
    }
	
}
