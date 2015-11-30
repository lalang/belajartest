<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKbli as BaseIzinKbli;

/**
 * This is the model class for table "kbli_izin".
 */
class IzinKbli extends BaseIzinKbli
{
    
    /**
     * @inheritdoc
     */
	public $no_input; 
    public function rules()
    {
        return [
            [['kbli_id', 'izin_id'], 'required'],
			[['no_input'],'string'],
            [['kbli_id', 'izin_id'], 'integer']
        ];
    }
	
}
