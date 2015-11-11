<?php

namespace backend\models;

use Yii;
use \backend\models\base\Pelaksana as BasePelaksana;

/**
 * This is the model class for table "pelaksana".
 */
class Pelaksana extends BasePelaksana
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'warna', 'aktif','flag_ubah_tgl_exp'], 'required'],
            [['nama'], 'string', 'max' => 100],
            [['warna', 'aktif'], 'string', 'max' => 15]
        ];
    }
	
}
