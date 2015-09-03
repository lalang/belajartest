<?php

namespace backend\models;

use Yii;
use \backend\models\base\MekanismePelayanan as BaseMekanismePelayanan;

/**
 * This is the model class for table "mekanisme_pelayanan".
 */
class MekanismePelayanan extends BaseMekanismePelayanan
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'isi', 'berkas', 'durasi', 'urutan', 'tipe', 'petugas_cek'], 'required'],
            [['izin_id', 'pelaksana_id', 'dokumen_izin_id', 'durasi', 'urutan'], 'integer'],
            [['isi', 'jenis', 'durasi_satuan', 'aktif', 'petugas_cek'], 'string'],
            [['berkas'], 'string', 'max' => 100],
            [['tipe'], 'string', 'max' => 10]
        ];
    }
	
}
