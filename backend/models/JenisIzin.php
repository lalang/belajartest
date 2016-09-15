<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisIzin as BaseJenisIzin;

/**
 * This is the model class for table "jenis_izin".
 */
class JenisIzin extends BaseJenisIzin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nama', 'action'], 'required'],
            [['nama'], 'string', 'max' => 50],
            [['action'], 'string', 'max' => 100]
        ]);
    }
	
}
