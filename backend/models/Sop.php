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
            [['izin_id', 'nama_sop', 'deskripsi_sop', 'durasi', 'urutan', 'action'], 'required'],
            [['izin_id', 'pelaksana_id', 'durasi', 'urutan'], 'integer'],
            [['deskripsi_sop', 'durasi_satuan', 'action', 'aktif'], 'string'],
            [['nama_sop'], 'string', 'max' => 50]
        ];
    }
	
}
