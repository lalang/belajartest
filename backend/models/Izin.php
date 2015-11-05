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

    public static function getIzinOptions($bidang_id) {
        $data = static::find()->where(['bidang_id'=>$bidang_id])->select(['id','nama as name'])->asArray()->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;

        return $value;
    }
}
