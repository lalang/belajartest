<?php

namespace backend\models;

use Yii;
use \backend\models\base\Izin as BaseIzin;

class Izin extends BaseIzin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        //Eko 07.11.15: tadinya rule mandatatory
        //, 'latar_belakang', 'persyaratan', 'mekanisme', 'pengaduan', 'dasar_hukum', 'definisi', 'template_valid'
        //Eko 07.11.15: tadinya rule string
        //, 'latar_belakang', 'persyaratan', 'mekanisme', 'pengaduan', 'dasar_hukum', 'definisi', 'brosur', 'template_valid', 'template_ba_lapangan', 'template_ba_teknis'
        return [
//            [['jenis', 'bidang_id', 'nama', 'alias', 'kode', 'fno_surat', 'wewenang_id', 'durasi', 'masa_berlaku', 'biaya', 'type', 'preview_data', 'template_sk', 'preview_data', 'template_penolakan', 'template_preview'], 'required'],
            [['jenis', 'bidang_id', 'nama', 'kode', 'fno_surat', 'wewenang_id', 'durasi', 'masa_berlaku', 'biaya', 'preview_data', 'template_sk', 'template_penolakan', 'template_preview'], 'required'],
            [['jenis', 'tipe', 'aktif', 'cek_lapangan', 'cek_sprtrw', 'cek_obyek', 'durasi_satuan', 'cek_perusahaan', 'masa_berlaku_satuan', 'type', 'preview_data', 'template_sk', 'preview_data', 'template_penolakan', 'template_preview'], 'string'],
            [['bidang_id', 'rumpun_id', 'status_id', 'wewenang_id', 'durasi', 'masa_berlaku', 'arsip_id'], 'integer'],
            [['biaya'], 'number'],
            [['nama', 'alias', 'kode'], 'string', 'max' => 255],
            [['fno_surat'], 'string', 'max' => 200],
            [['action'], 'string', 'max' => 100]
        ];
    }

    public static function getIzinOptions($bidang_id) {
        $data = static::find()->where(['bidang_id'=>$bidang_id])->select(['id','nama as name'])->asArray()->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }
}
