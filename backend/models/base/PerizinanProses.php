<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "perizinan_proses".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $sop_id
 * @property integer $urutan
 * @property string $nama_sop
 * @property string $deskripsi_sop
 * @property integer $pelaksana_id
 * @property string $dokumen
 * @property string $status
 * @property string $keterangan
 * @property string $tanggal_proses
 * @property string $mulai
 * @property string $selesai
 * @property integer $active
 *
 * @property \backend\models\Pelaksana $pelaksana
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\Sop $sop
 */
class PerizinanProses extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;
    
        public $nik;
    public $nama;
    public $telepon;
    public $zonasi;
    public $sesuai;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perizinan_proses';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perizinan_id' => Yii::t('app', 'Perizinan ID'),
            'nik' => Yii::t('app', 'NIK'),
            'sop_id' => Yii::t('app', 'Sop ID'),
            'urutan' => Yii::t('app', 'Urutan'),
            'nama_sop' => Yii::t('app', 'Nama Sop'),
            'deskripsi_sop' => Yii::t('app', 'Deskripsi Sop'),
            'pelaksana_id' => Yii::t('app', 'Pelaksana ID'),
            'dokumen' => Yii::t('app', 'Dokumen'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'tanggal_proses' => Yii::t('app', 'Tanggal Proses'),
            'mulai' => Yii::t('app', 'Mulai'),
            'selesai' => Yii::t('app', 'Selesai'),
            'active' => Yii::t('app', 'Active'),
            'action' => Yii::t('app', 'Action'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelaksana()
    {
        return $this->hasOne(\backend\models\Pelaksana::className(), ['id' => 'pelaksana_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinan()
    {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'perizinan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSop()
    {
        return $this->hasOne(\backend\models\Sop::className(), ['id' => 'sop_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\PerizinanProsesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PerizinanProsesQuery(get_called_class());
    }
}
