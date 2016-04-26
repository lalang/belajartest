<?php

namespace backend\models;

use Yii;
use \backend\models\base\Sop as BaseSop;

/**
 * This is the model class for table "sop".
 */
class Sop extends BaseSop
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'nama_sop', 'deskripsi_sop', 'durasi', 'urutan'], 'required'],
            [['izin_id', 'status_id', 'pelaksana_id', 'durasi', 'urutan', 'action_id'], 'integer'],
            [['deskripsi_sop', 'durasi_satuan', 'aktif', 'upload_bapl'], 'string'],
            [['nama_sop'], 'string', 'max' => 50]
        ];
    }
	
}
