<?php

namespace backend\models;

use Yii;
use \backend\models\base\Package as BasePackage;

/**
 * This is the model class for table "package".
 */
class Package extends BasePackage
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'paket_izin_id'], 'integer'],
            [['status'], 'string']
        ];
    }
	
}
