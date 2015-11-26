<?php

namespace backend\models;

use Yii;
use \backend\models\base\SubLanding2 as BaseSubLanding2;

/**
 * This is the model class for table "sub_landing2".
 */
class SubLanding2 extends BaseSubLanding2
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info', 'info_en', 'target','urutan','link'], 'required'],
            [['info', 'info_en', 'target', 'publish'], 'string'],
            [['urutan'], 'integer'],
            [['icon'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 250]
        ];
    }
	
}
