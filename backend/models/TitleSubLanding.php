<?php

namespace backend\models;

use Yii;
use \backend\models\base\TitleSubLanding as BaseTitleSubLanding;

/**
 * This is the model class for table "title_sub_landing".
 */
class TitleSubLanding extends BaseTitleSubLanding
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'nama_en', 'publish'], 'required'],
            [['publish'], 'string'],
            [['nama'], 'string', 'max' => 100],
			[['nama_en'], 'string', 'max' => 100],
			[['nama_seo'], 'string', 'max' => 100],
			[['nama_seo_en'], 'string', 'max' => 100],
        ];
    }
	
}
