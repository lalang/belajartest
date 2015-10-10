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
 * @property integer $zonasi_id
 * @property string $dokumen
 * @property string $zonasi_sesuai
 * @property string $pengambil_nik
 * @property string $pengambil_nama
 * @property string $pengambil_telepon
 * @property string $alamat_valid
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
            'perizinan_id' => Yii::t('app', 'Perizinan'),
            'pengambil_nik' => Yii::t('app', 'NIK Pengambil'),
            'pengambil_nama' => Yii::t('app', 'Nama Pengambil'),
            'pengambil_telepon' => Yii::t('app', 'Telepon Pengambil'),
            'sop_id' => Yii::t('app', 'Sop ID'),
            'zonasi_id' => Yii::t('app', 'Zonasi'),
            'zonasi_sesuai' => Yii::t('app', 'Kesesuaian Zonasi'),
            'alamat_valid' => Yii::t('app', 'Alamat Valid'),
            'urutan' => Yii::t('app', 'Urutan'),
            'nama_sop' => Yii::t('app', 'Nama Sop'),
            'deskripsi_sop' => Yii::t('app', 'Deskripsi SOP'),
            'pelaksana_id' => Yii::t('app', 'Pelaksana'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getZonasi()
    {
        return $this->hasOne(\backend\models\Sop::className(), ['id' => 'zonasi_id']);
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
