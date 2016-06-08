<?php

namespace backend\models;

use Yii;
use \backend\models\base\Kepegawaian as BaseKepegawaian;

/**
 * This is the model class for table "kepegawaian".
 */
class Kepegawaian extends BaseKepegawaian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 200]
        ]);
    }
	
}
