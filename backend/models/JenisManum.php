<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisManum as BaseJenisManum;

/**
 * This is the model class for table "jenis_manum".
 */
class JenisManum extends BaseJenisManum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['keterangan'], 'string', 'max' => 50]
        ]);
    }
	
}
