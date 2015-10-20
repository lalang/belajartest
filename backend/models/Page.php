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
	public $url;
    public function rules()
    {
        return [
            [['judul', 'judul_seo', 'description','description_en', 'urutan','landing', 'publish'], 'required'],
            [['description', 'description_en', 'landing', 'publish'], 'string'],
            [['tanggal'], 'safe'],
			[['file'],'file'],
            [['urutan'], 'integer'],
            [['judul', 'judul_seo', 'judul_en', 'judul_seo_en', 'gambar'], 'string', 'max' => 255]
        ];
    }
	
}
