<?php

namespace backend\models;

use Yii;
use \backend\models\base\VisiMisi as BaseVisiMisi;

/**
 * This is the model class for table "visimisi".
 */
class VisiMisi extends BaseVisiMisi
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['icon', 'info', 'info_en','urutan', 'link', 'link_en', 'target', 'publish'], 'required'],
            [['info', 'info_en', 'target', 'publish'], 'string'],
            [['urutan'], 'integer'],
            [['icon'], 'string', 'max' => 50],
            [['link'], 'string', 'max' => 250],
			[['link'], 'string', 'max' => 250]
        ];
    }
	
}
