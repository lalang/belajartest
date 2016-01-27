<?php

namespace backend\models;

use Yii;
use \backend\models\base\Bank as BaseBank;

/**
 * This is the model class for table "bank".
 */
class Bank extends BaseBank
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 200]
        ];
    }
	
}
