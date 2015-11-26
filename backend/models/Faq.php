<?php

namespace backend\models;

use Yii;
use \backend\models\base\Faq as BaseFaq;

/**
 * This is the model class for table "faq".
 */
class Faq extends BaseFaq
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanya', 'jawab', 'tanya_en', 'jawab_en'], 'required'],
            [['tanya', 'jawab', 'tanya_en', 'jawab_en', 'aktif'], 'string']
        ];
    }
	
}
