<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "izin".
 *
 * @property integer $id
 * @property string $jenis
 * @property integer $bidang_id
 * @property string $rumpun_id
 * @property string $tipe
 * @property integer $status_id
 * @property string $nama
 * @property string $alias
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
 * @property string $preview_data
 * @property string $template_sk
 * @property string $template_penolakan
 * @property string $template_preview
 * @property string $template_valid
 * @property string $template_ba_lapangan
 * @property string $template_ba_teknis
 * @property string $action
 *
 * @property DokumenIzin[] $dokumenIzins
 * @property DokumenPendukung[] $dokumenPendukungs
 * @property Arsip $arsip
 * @property Bidang $bidang
 * @property Wewenang $wewenang
 * @property Rumpun $rumpun
 * @property Status $status
 * @property IzinSiup[] $izinSiups
 * @property NoIzin[] $noIzins
 * @property Perizinan[] $perizinans
 * @property Sop[] $sops
 */
class Izin extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['jenis', 'bidang_id', 'nama', 'alias', 'kode', 'fno_surat', 'wewenang_id', 'durasi', 'masa_berlaku', 'latar_belakang', 'persyaratan', 'mekanisme', 'pengaduan', 'dasar_hukum', 'definisi', 'biaya', 'type', 'preview_data', 'template_sk', 'template_penolakan', 'template_preview', 'template_valid'], 'required'],
            [['jenis', 'tipe', 'aktif', 'cek_lapangan', 'cek_sprtrw', 'cek_obyek', 'durasi_satuan', 'cek_perusahaan', 'masa_berlaku_satuan', 'latar_belakang', 'persyaratan', 'mekanisme', 'pengaduan', 'dasar_hukum', 'definisi', 'brosur', 'type', 'preview_data', 'template_sk', 'template_penolakan', 'template_preview', 'template_valid', 'template_ba_lapangan', 'template_ba_teknis'], 'string'],
            [['bidang_id', 'rumpun_id', 'status_id', 'wewenang_id', 'durasi', 'masa_berlaku', 'arsip_id'], 'integer'],
            [['biaya'], 'number'],
            [['nama', 'alias', 'kode'], 'string', 'max' => 255],
            [['fno_surat'], 'string', 'max' => 200],
            [['action'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis' => 'Jenis',
            'bidang_id' => 'Bidang ID',
            'rumpun_id' => 'Rumpun ID',
            'tipe' => 'Tipe',
            'status_id' => 'Status ID',
            'nama' => 'Nama',
            'alias' => 'Alias',
            'kode' => 'Kode',
            'fno_surat' => 'Fno Surat',
            'aktif' => 'Aktif',
            'wewenang_id' => 'Wewenang ID',
            'cek_lapangan' => 'Cek Lapangan',
            'cek_sprtrw' => 'Cek Sprtrw',
            'cek_obyek' => 'Cek Obyek',
            'durasi' => 'Durasi',
            'durasi_satuan' => 'Durasi Satuan',
            'cek_perusahaan' => 'Cek Perusahaan',
            'masa_berlaku' => 'Masa Berlaku',
            'masa_berlaku_satuan' => 'Masa Berlaku Satuan',
            'latar_belakang' => 'Latar Belakang',
            'persyaratan' => 'Persyaratan',
            'mekanisme' => 'Mekanisme',
            'pengaduan' => 'Pengaduan',
            'dasar_hukum' => 'Dasar Hukum',
            'definisi' => 'Definisi',
            'biaya' => 'Biaya',
            'brosur' => 'Brosur',
            'arsip_id' => 'Arsip ID',
            'type' => 'Type',
            'preview_data' => 'Preview Data',
            'template_sk' => 'Template Sk',
            'template_penolakan' => 'Template Penolakan',
            'template_preview' => 'Template Preview',
            'template_valid' => 'Template Valid',
            'template_ba_lapangan' => 'Template Ba Lapangan',
            'template_ba_teknis' => 'Template Ba Teknis',
            'action' => 'Action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenIzins()
    {
        return $this->hasMany(DokumenIzin::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenPendukungs()
    {
        return $this->hasMany(DokumenPendukung::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsip()
    {
        return $this->hasOne(Arsip::className(), ['id' => 'arsip_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidang()
    {
        return $this->hasOne(Bidang::className(), ['id' => 'bidang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWewenang()
    {
        return $this->hasOne(Wewenang::className(), ['id' => 'wewenang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRumpun()
    {
        return $this->hasOne(Rumpun::className(), ['id' => 'rumpun_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinSiups()
    {
        return $this->hasMany(IzinSiup::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoIzins()
    {
        return $this->hasMany(NoIzin::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinans()
    {
        return $this->hasMany(Perizinan::className(), ['izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSops()
    {
        return $this->hasMany(Sop::className(), ['izin_id' => 'id']);
    }
}
