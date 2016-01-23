<?php

namespace backend\models;

use Yii;
use \backend\models\base\Negara as BaseNegara;

/**
 * This is the model class for table "negara".
 */
class Negara extends BaseNegara
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_negara', 'nama_negara'], 'required'],
            [['kode_negara'], 'string', 'max' => 10],
            [['nama_negara'], 'string', 'max' => 200]
        ];
    }
	
}
