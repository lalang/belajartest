<?php

namespace backend\models;

use Yii;
use \backend\models\base\DokumenPendukung as BaseDokumenPendukung;

/**
 * This is the model class for table "dokumen_pendukung".
 */
class DokumenPendukung extends BaseDokumenPendukung
{
    
    /**
     * @inheritdoc
     */

	public $no_input;
    public function rules()
    {
        return [
            [['kategori', 'izin_id', 'isi', 'file', 'urutan', 'tipe'], 'required'],
            [['kategori', 'isi'], 'string'],
			[['no_input', 'no_input'], 'string'],
            [['izin_id', 'urutan'], 'integer'],
            [['file'], 'string', 'max' => 100],
            [['tipe'], 'string', 'max' => 10]
        ];
    }
	
}
