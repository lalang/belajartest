<?php

namespace backend\models;

use Yii;
use \backend\models\base\BerkasIzin as BaseBerkasIzin;

/**
 * This is the model class for table "berkas_izin".
 */
class BerkasIzin extends BaseBerkasIzin
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'nama', 'extension', 'wajib', 'urutan', 'aktif'], 'required'],
            [['izin_id', 'urutan'], 'integer'],
            [['wajib', 'aktif'], 'string'],
            [['nama'], 'string', 'max' => 50],
            [['extension'], 'string', 'max' => 100]
        ];
    }
	
}