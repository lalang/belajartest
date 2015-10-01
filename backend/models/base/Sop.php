<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "sop".
 *
 * @property integer $id
 * @property integer $izin_id
 * @property string $nama_sop
 * @property string $deskripsi_sop
 * @property integer $pelaksana_id
 * @property integer $durasi
 * @property string $durasi_satuan
 * @property integer $urutan
 * @property string $action
 * @property string $aktif
 * @property string $status
 *
 * @property \backend\models\PerizinanProses[] $perizinanProses
 * @property \backend\models\PerizinanSop[] $perizinanSops
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
            'id' => Yii::t('app', 'ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'status' => Yii::t('app', 'Status'),
            'nama_sop' => Yii::t('app', 'Nama Sop'),
            'deskripsi_sop' => Yii::t('app', 'Deskripsi Sop'),
            'pelaksana_id' => Yii::t('app', 'Pelaksana ID'),
            'durasi' => Yii::t('app', 'Durasi'),
            'durasi_satuan' => Yii::t('app', 'Durasi Satuan'),
            'urutan' => Yii::t('app', 'Urutan'),
            'action' => Yii::t('app', 'Action'),
            'aktif' => Yii::t('app', 'Aktif'),
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
    public function getPerizinanSops()
    {
        return $this->hasMany(\backend\models\PerizinanSop::className(), ['sop_id' => 'id']);
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

    /**
     * @inheritdoc
     * @return \backend\models\SopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SopQuery(get_called_class());
    }
}
