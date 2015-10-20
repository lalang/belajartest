<?php

namespace backend\models;

use Yii;
use \backend\models\base\DokumenIzin as BaseDokumenIzin;

/**
 * This is the model class for table "dokumen_izin".
 */
class DokumenIzin extends BaseDokumenIzin
{
    
    /**
     * @inheritdoc
     */
	public $no_input; 
    public function rules()
    {
        return [
            [['izin_id', 'judul', 'isi', 'file'], 'required'],
            [['izin_id'], 'integer'],
			[['no_input', 'no_input'], 'string'],
            [['isi', 'aktif'], 'string'],
            [['judul'], 'string', 'max' => 200],
            [['file'], 'string', 'max' => 100]
        ];
    }
	
}
