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
	public $nm_file;
    public function rules()
    {
        return [
            [['kategori', 'izin_id', 'isi', 'urutan'], 'required'],
            [['kategori', 'isi'], 'string'],
			[['no_input', 'no_input'], 'string'],
			[['file'],'safe'],
			[['nm_file'],'file'],
            [['izin_id', 'urutan'], 'integer'],
            [['file'], 'file'],
            [['tipe'], 'string', 'max' => 10]
        ];
    }
	
}
