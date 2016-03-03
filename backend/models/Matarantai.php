<?php

namespace backend\models;

use Yii;
use \backend\models\base\Matarantai as BaseMatarantai;

/**
 * This is the model class for table "matarantai".
 */
class Matarantai extends BaseMatarantai
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama','aktif'], 'required'],
            [['nama'], 'string', 'max' => 200]
        ];
    }
	
}
