<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisUsaha as BaseJenisUsaha;

/**
 * This is the model class for table "jenis_usaha".
 */
class JenisUsaha extends BaseJenisUsaha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['bidang_izin_id'], 'integer'],
            [['aktif'], 'string'],
            [['keterangan'], 'string', 'max' => 100]
        ]);
    }
	
}
