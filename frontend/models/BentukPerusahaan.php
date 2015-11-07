<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\BentukPerusahaan as BaseBentukPerusahaan;

/**
 * This is the model class for table "bentuk_perusahaan".
 */
class BentukPerusahaan extends BaseBentukPerusahaan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['urutan'], 'integer'],
            [['type', 'publish'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
