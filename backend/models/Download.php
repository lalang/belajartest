<?php

namespace backend\models;

use Yii;
use \backend\models\base\Download as BaseDownload;

/**
 * This is the model class for table "download".
 */
class Download extends BaseDownload
{
    
    /**
     * @inheritdoc
     */
	 
	public $file; 
    public function rules()
    {
        return [
            [['judul', 'tanggal', 'publish'], 'required'],
            [['deskripsi', 'deskripsi_eng', 'jenis_file', 'publish'], 'string'],
			[['file'],'file'],
            [['tanggal'], 'safe'],
            [['diunduh'], 'integer'],
            [['judul', 'judul_eng', 'nama_file'], 'string', 'max' => 100]
        ];
    }
	
}
