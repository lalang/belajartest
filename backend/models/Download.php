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
            [['file','regulasi_id', 'judul', 'judul_eng','nama_file', 'tanggal', 'publish'], 'required'],
            [['regulasi_id', 'diunduh'], 'integer'],
            [['deskripsi', 'deskripsi_eng', 'jenis_file', 'publish'], 'string'],
            [['tanggal'], 'safe'],
            [['judul', 'judul_eng', 'nama_file'], 'string'],
			[['file'],'file'],
        ];
    }
	
/*	public static function getDownloadOptions($regulasi_id) {
        $data = static::find()->where(['regulasi_id'=>$regulasi_id])->select(['id','nama as name'])->asArray()->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }*/
	
}
