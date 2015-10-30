<?php

namespace backend\models;

use Yii;
use \backend\models\base\Rumpun as BaseRumpun;

/**
 * This is the model class for table "rumpun".
 */
class Rumpun extends BaseRumpun
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
