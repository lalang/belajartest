<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "sop".
 *
 * @property integer $id
 * @property integer $izin_id
 * @property string $status_id
 * @property string $nama_sop
 * @property string $deskripsi_sop
 * @property integer $pelaksana_id
 * @property integer $durasi
 * @property string $durasi_satuan
 * @property integer $urutan
 * @property string $aktif
 * @property integer $action_id
 *
 * @property \backend\models\PerizinanProses[] $perizinanProses
 * @property \backend\models\Izin $izin
 * @property \backend\models\Pelaksana $pelaksana
 */
class Sop extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sop';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'izin_id' => 'Izin',
            'status_id' => 'Status',
            'nama_sop' => 'Nama Sop',
            'deskripsi_sop' => 'Deskripsi Sop',
            'pelaksana_id' => 'Pelaksana',
            'durasi' => 'Durasi',
            'durasi_satuan' => 'Durasi Satuan',
            'urutan' => 'Urutan',
            'aktif' => 'Aktif',
            'action_id' => 'Action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanProses()
    {
        return $this->hasMany(\backend\models\PerizinanProses::className(), ['sop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelaksana()
    {
        return $this->hasOne(\backend\models\Pelaksana::className(), ['id' => 'pelaksana_id']);
    }
     public function getStatus()
    {
        return $this->hasOne(\backend\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\SopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SopQuery(get_called_class());
    }
}
