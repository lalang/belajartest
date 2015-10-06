<?php

namespace backend\models;

use Yii;
use \backend\models\base\Zonasi as BaseZonasi;

/**
 * This is the model class for table "zonasi".
 */
class Zonasi extends BaseZonasi
{
    public $zona;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'string', 'max' => 5],
            [['zonasi', 'rdtr'], 'string', 'max' => 50],
            [['kode'], 'unique']
        ];
    }
    
    public function afterFind() {
        $this->zona = 'aman';
        parent::afterFind();
        
    }
	
}
