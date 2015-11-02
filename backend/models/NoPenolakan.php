<?php

namespace backend\models;

use Yii;
use \backend\models\base\NoPenolakan as BaseNoPenolakan;

/**
 * This is the model class for table "no_penolakan".
 */
class NoPenolakan extends BaseNoPenolakan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun', 'lokasi_id', 'no_izin'], 'required'],
            [['tahun'], 'safe'],
            [['lokasi_id', 'no_izin'], 'integer'],
            //[['lock'], 'default', 'value' => '0'],
            //[['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
