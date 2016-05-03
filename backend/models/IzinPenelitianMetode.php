<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPenelitianMetode as BaseIzinPenelitianMetode;

/**
 * This is the model class for table "izin_penelitian_metode".
 */
class IzinPenelitianMetode extends BaseIzinPenelitianMetode
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['penelitian_id', 'metode_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
