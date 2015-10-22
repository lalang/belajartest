<?php

namespace backend\models;

use Yii;
use \backend\models\base\PerizinanProses as BasePerizinanProses;

/**
 * This is the model class for table "perizinan_proses".
 */
class PerizinanProses extends BasePerizinanProses
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'sop_id', 'urutan', 'nama_sop', 'deskripsi_sop', 'pelaksana_id', 'keterangan', 'active'], 'required'],
            [['perizinan_id', 'sop_id', 'urutan', 'pelaksana_id', 'active', 'zonasi_id'], 'integer'],
            [['deskripsi_sop', 'dokumen', 'status', 'keterangan', 'action', 'pengambil_nama', 'zonasi_sesuai', 'pengambil_nik', 'pengambil_telepon','alamat_valid'], 'string'],
            [['tanggal_proses', 'mulai', 'selesai'], 'safe'],
            [['nama_sop', 'action'], 'string', 'max' => 50],
            [['no_izin'], 'string', 'max' => 100],
        ];
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        if ($insert === false) {
            $this->tanggal_proses = $this->mulai;
            $this->selesai = new \yii\db\Expression('NOW()');
            return true;
        } else {
            return false;
        }
    }
	
}
