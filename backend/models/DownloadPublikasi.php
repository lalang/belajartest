<?php

namespace backend\models;

use Yii;
use \backend\models\base\DownloadPublikasi as BaseDownloadPublikasi;

/**
 * This is the model class for table "download_publikasi".
 */
class DownloadPublikasi extends BaseDownloadPublikasi
{
    
    /**
     * @inheritdoc
     */
	public $file;   
    public function rules()
    {
        return [
            [['publikasi_id', 'judul', 'nama_file', 'tanggal', 'publish'], 'required'],
            [['publikasi_id', 'diunduh'], 'integer'],
            [['deskripsi', 'deskripsi_eng', 'publish'], 'string'],
            [['tanggal'], 'safe'],
            [['judul', 'judul_eng', 'nama_file'], 'string', 'max' => 100],
            [['jenis_file'], 'string', 'max' => 50],
			[['file'],'file'],
        ];
    }
	
}
