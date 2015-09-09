<?php

namespace backend\models;

use Yii;
use \backend\models\base\Page as BasePage;

/**
 * This is the model class for table "page".
 */
class Page extends BasePage
{
    
    /**
     * @inheritdoc
     */

    public $file;

    public function rules()
    {
        return [
            [['page_title', 'page_description', 'page_urutan'], 'required'],
            [['page_description', 'page_description_en', 'meta_description', 'meta_description_en'], 'string'],
            [['page_date'], 'safe'],
            [['file'],'file'],
            [['page_urutan'], 'integer'],
            [['page_title', 'page_title_en', 'page_image', 'meta_title', 'meta_title_en', 'meta_keyword', 'meta_keyword_en'], 'string', 'max' => 255]
        ];
    }
	
}
