<?php

namespace backend\models;

use Yii;
use \backend\models\base\PerizinanDokumen as BasePerizinanDokumen;

/**
 * This is the model class for table "perizinan_dokumen".
 */
class PerizinanDokumen extends BasePerizinanDokumen
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'dokumen_pendukung_id', 'urutan', 'isi'], 'required'],
            [['perizinan_id', 'dokumen_pendukung_id', 'urutan', 'check', 'user_check'], 'integer'],
            [['isi', 'keterangan'], 'string'],
            [['time_check'], 'safe'],
            [['file'], 'string', 'max' => 100]
        ];
    }
	
}
