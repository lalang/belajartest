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
        //Eko 07.11.15: tadinya rule required
        //, 'file', 'tipe'
        return [
            [['kategori', 'izin_id', 'isi', 'urutan'], 'required'],
            [['kategori', 'isi'], 'string'],
            [['no_input', 'no_input'], 'string'],
            [['izin_id', 'urutan'], 'integer'],
            [['file'], 'string', 'max' => 100],
            [['tipe'], 'string', 'max' => 10]
        ];
    }
	
}
