<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin".
 *
 * @property integer $id
 * @property string $jenis
 * @property integer $bidang_id
 * @property string $nama
 * @property string $kode
 * @property string $fno_surat
 * @property string $aktif
 * @property integer $wewenang_id
 * @property string $cek_lapangan
 * @property string $cek_sprtrw
 * @property string $cek_obyek
 * @property integer $durasi
 * @property string $durasi_satuan
 * @property string $cek_perusahaan
 * @property integer $masa_berlaku
 * @property string $masa_berlaku_satuan
 * @property string $latar_belakang
 * @property string $persyaratan
 * @property string $mekanisme
 * @property string $pengaduan
 * @property string $dasar_hukum
 * @property string $definisi
 * @property double $biaya
 * @property string $brosur
 * @property integer $arsip_id
 * @property string $type
 * @property string $template_sk
 * @property string $template_penolakan
 * @property string $template_valid
 * @property string $preview_data
 * @property string $template_ba_lapangan
 * @property string $template_ba_teknis
 * @property string $action
 * @property string $min
 * @property string $max
 *
 * @property \backend\models\DokumenIzin[] $dokumenIzins
 * @property \backend\models\DokumenPendukung[] $dokumenPendukungs
 * @property \backend\models\Arsip $arsip
 * @property \backend\models\Bidang $bidang
 * @property \backend\models\Wewenang $wewenang
 * @property \backend\models\IzinSiup[] $izinSiups
 * @property \backend\models\Perizinan[] $perizinans
 * @property \backend\models\Sop[] $sops
 */
class Izin extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'jenis' => Yii::t('app', 'Jenis'),
            'bidang_id' => Yii::t('app', 'Bidang'),
            'rumpun_id' => Yii::t('app', 'Rumpun'),
            'tipe' => Yii::t('app', 'Tipe'),
            'status_id' => Yii::t('app', 'Status'),
            'nama' => Yii::t('app', 'Nama'),
            'kode' => Yii::t('app', 'Kode'),
            'fno_surat' => Yii::t('app', 'Fno Surat'),
            'aktif' => Yii::t('app', 'Aktif'),
            'wewenang_id' => Yii::t('app', 'Wewenang ID'),
            'cek_lapangan' => Yii::t('app', 'Cek Lapangan'),
            'cek_sprtrw' => Yii::t('app', 'Cek Sprtrw'),
            'cek_obyek' => Yii::t('app', 'Cek Obyek'),
            'durasi' => Yii::t('app', 'Durasi'),
            'durasi_satuan' => Yii::t('app', 'Durasi Satuan'),
            'cek_perusahaan' => Yii::t('app', 'Cek Perusahaan'),
            'masa_berlaku' => Yii::t('app', 'Masa Berlaku'),
            'masa_berlaku_satuan' => Yii::t('app', 'Masa Berlaku Satuan'),
            'latar_belakang' => Yii::t('app', 'Latar Belakang'),
            'persyaratan' => Yii::t('app', 'Persyaratan'),
            'mekanisme' => Yii::t('app', 'Mekanisme'),
            'pengaduan' => Yii::t('app', 'Pengaduan'),
            'dasar_hukum' => Yii::t('app', 'Dasar Hukum'),
            'definisi' => Yii::t('app', 'Definisi'),
            'biaya' => Yii::t('app', 'Biaya'),
            'brosur' => Yii::t('app', 'Brosur'),
            'arsip_id' => Yii::t('app', 'Arsip ID'),
            'type' => Yii::t('app', 'Type'),
            'preview_data' => Yii::t('app', 'Template Preview Data'),
            'template_sk' => Yii::t('app', 'Template Sk'),
            'template_penolakan' => Yii::t('app', 'Template Penolakan'),
            'template_preview' => Yii::t('app', 'Template Preview'),
            'template_valid' => Yii::t('app', 'Template Valid'),
            'preview_data' => Yii::t('app', 'Preview Data'),
            'template_ba_lapangan' => Yii::t('app', 'Template Ba Lapangan'),
            'template_ba_teknis' => Yii::t('app', 'Template Ba Teknis'),
            'action' => Yii::t('app', 'Action'),
            'max' => Yii::t('app', 'Max'),
            'min' => Yii::t('app', 'Min'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenIzins()
    {
        return $this->hasMany(\backend\models\DokumenIzin::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenPendukungs()
    {
        return $this->hasMany(\backend\models\DokumenPendukung::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsip()
    {
        return $this->hasOne(\backend\models\Arsip::className(), ['id' => 'arsip_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidang()
    {
        return $this->hasOne(\backend\models\Bidang::className(), ['id' => 'bidang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRumpun()
    {
        return $this->hasOne(\backend\models\Rumpun::className(), ['id' => 'rumpun_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\backend\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWewenang()
    {
        return $this->hasOne(\backend\models\Wewenang::className(), ['id' => 'wewenang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinSiups()
    {
        return $this->hasMany(\backend\models\IzinSiup::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinans()
    {
        return $this->hasMany(\backend\models\Perizinan::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSops()
    {
        return $this->hasMany(\backend\models\Sop::className(), ['izin_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinQuery(get_called_class());
    }
	
}
