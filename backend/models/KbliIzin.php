<?php

namespace backend\models;

use Yii;
use \backend\models\base\KbliIzin as BaseKbliIzin;

/**
 * This is the model class for table "kbli_izin".
 */
class KbliIzin extends BaseKbliIzin
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kbli_id', 'izin_id'], 'required'],
            [['kbli_id', 'izin_id'], 'integer']
        ];
    }
	
}
