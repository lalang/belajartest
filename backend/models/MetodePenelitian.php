<?php

namespace backend\models;

use Yii;
use \backend\models\base\MetodePenelitian as BaseMetodePenelitian;

/**
 * This is the model class for table "metode_penelitian".
 */
class MetodePenelitian extends BaseMetodePenelitian
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['metode'], 'string', 'max' => 50]
        ];
    }
	
}
