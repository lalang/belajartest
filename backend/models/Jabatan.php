<?php

namespace backend\models;

use Yii;
use \backend\models\base\Jabatan as BaseJabatan;

/**
 * This is the model class for table "jabatan".
 */
class Jabatan extends BaseJabatan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jabatan'], 'required'],
            [['nama_jabatan'], 'string', 'max' => 100]
        ];
    }
	
}
