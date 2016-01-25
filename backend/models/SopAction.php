<?php

namespace backend\models;

use Yii;
use \backend\models\base\SopAction as BaseSopAction;

/**
 * This is the model class for table "sop_action".
 */
class SopAction extends BaseSopAction
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50]
        ];
    }
	
}
