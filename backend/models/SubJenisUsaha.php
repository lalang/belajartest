<?php

namespace backend\models;

use Yii;
use \backend\models\base\SubJenisUsaha as BaseSubJenisUsaha;

/**
 * This is the model class for table "sub_jenis_usaha".
 */
class SubJenisUsaha extends BaseSubJenisUsaha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['jenis_usaha_id'], 'integer'],
            [['aktif'], 'string'],
			[['kode'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 560]
        ]);
    }
	
}
