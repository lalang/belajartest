<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "mekanisme_pelayanan".
 *
 * @property integer $id
 * @property integer $izin_id
 * @property string $isi
 * @property string $berkas
 * @property integer $pelaksana_id
 * @property integer $dokumen_izin_id
 * @property string $jenis
 * @property integer $durasi
 * @property string $durasi_satuan
 * @property integer $urutan
 * @property integer $cek_berkas
 * @property integer $cek_form
 * @property integer $buat_sk
 * @property integer $cetak_sk
 * @property string $tipe
 * @property string $aktif
 * @property string $petugas_cek
 *
 * @property \backend\models\DokumenIzin $dokumenIzin
 * @property \backend\models\Izin $izin
 * @property \backend\models\Pelaksana $pelaksana
 * @property \backend\models\PerizinanProses[] $perizinanProses
 */
class MekanismePelayanan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mekanisme_pelayanan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'isi' => Yii::t('app', 'Isi'),
            'berkas' => Yii::t('app', 'Berkas'),
            'pelaksana_id' => Yii::t('app', 'Pelaksana ID'),
            'dokumen_izin_id' => Yii::t('app', 'Dokumen Izin ID'),
            'jenis' => Yii::t('app', 'Jenis'),
            'durasi' => Yii::t('app', 'Durasi'),
            'durasi_satuan' => Yii::t('app', 'Durasi Satuan'),
            'urutan' => Yii::t('app', 'Urutan'),
            'cek_berkas' => Yii::t('app', 'Cek Berkas'),
            'cek_form' => Yii::t('app', 'Cek Form'),
            'buat_sk' => Yii::t('app', 'Buat Sk'),
            'cetak_sk' => Yii::t('app', 'Cetak Sk'),
            'tipe' => Yii::t('app', 'Tipe'),
            'aktif' => Yii::t('app', 'Aktif'),
            'petugas_cek' => Yii::t('app', 'Petugas Cek'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenIzin()
    {
        return $this->hasOne(\backend\models\DokumenIzin::className(), ['id' => 'dokumen_izin_id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanProses()
    {
        return $this->hasMany(\backend\models\PerizinanProses::className(), ['mekanisme_pelayanan_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\MekanismePelayananQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MekanismePelayananQuery(get_called_class());
    }
}
