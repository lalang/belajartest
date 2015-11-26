<?php

namespace backend\models;

use Yii;
use \backend\models\base\Popup as BasePopup;

/**
 * This is the model class for table "popup".
 */
class Popup extends BasePopup
{
    
    /**
     * @inheritdoc
     */
	public $file; 
    public function rules()
    {
        return [
            [['image','urutan'], 'required'],
            [['urutan'], 'integer'],
            [['target'], 'string'],
			[['publish'], 'string'],
			[['file'],'file'],
            [['image'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 225]
        ];
    }
	
}
