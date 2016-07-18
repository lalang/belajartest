<?php

namespace backend\models;

use Yii;
use \backend\models\base\PerizinanProses as BasePerizinanProses;

/**
 * This is the model class for table "perizinan_proses".
 */
class PerizinanProses extends BasePerizinanProses {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['perizinan_id', 'sop_id', 'urutan', 'nama_sop', 'deskripsi_sop', 'pelaksana_id', 'keterangan', 'active'], 'required'],
            [['perizinan_id', 'sop_id', 'urutan', 'pelaksana_id', 'active', 'zonasi_id', 'update_by', 'todo_by'], 'integer'],
            [['deskripsi_sop', 'dokumen', 'status', 'keterangan', 'alasan_penolakan', 'action', 'pengambil_nama', 'zonasi_sesuai', 'pengambil_nik', 'pengambil_telepon', 'alamat_valid'], 'string'],
            [['tanggal_proses', 'mulai', 'selesai', 'update_date', 'todo_date'], 'safe'],
            [['nama_sop', 'action'], 'string', 'max' => 50],
            [['no_izin', 'pengambil_telepon'], 'string', 'max' => 100],
            [['pengambil_nik', 'pengambil_telepon'], 'match', 'pattern' => '/^[0-9]+$/', 'message' => Yii::t('app', 'Hanya angka yang diperbolehkan')],
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);
        if ($insert === false) {
            $this->tanggal_proses = $this->mulai;
//            $this->selesai = new \yii\db\Expression('NOW()');
            return true;
        } else {
            return false;
        }
    }

}
