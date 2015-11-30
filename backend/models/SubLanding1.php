<?php

namespace backend\models;

use Yii;
use \backend\models\base\SubLanding1 as BaseSubLanding1;

/**
 * This is the model class for table "sub_landing1".
 */
class SubLanding1 extends BaseSubLanding1
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_urut','nama'], 'required'],
            [['no_urut'], 'integer'],
            [['nama', 'nama_en'], 'string'],
        ];
    }
	
}
