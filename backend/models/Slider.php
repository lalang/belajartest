<?php

namespace backend\models;

use Yii;
use \backend\models\base\Slider as BaseSlider;

/**
 * This is the model class for table "slider".
 */
class Slider extends BaseSlider
{
    
    /**
     * @inheritdoc
     */
	public $file; 
	 
    public function rules()
    {
        return [
			[['file','title', 'title_en','conten','conten_en','urutan','publish'], 'required'],
            [['conten', 'conten_en', 'publish'], 'string'],
            [['urutan'], 'integer'],
			[['file'],'file'],
            [['title', 'title_en'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 50]
        ];
    }
	
}
