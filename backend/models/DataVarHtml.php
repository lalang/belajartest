<?php

namespace backend\models;

use Yii;
use \backend\models\base\DataVarHtml as BaseDataVarHtml;

/**
 * This is the model class for table "data_var_html".
 */
class DataVarHtml extends BaseDataVarHtml
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['var', 'ket'], 'required'],
            [['var'], 'string'],
            [['ket'], 'string', 'max' => 100],
        ];
    }
	
}
