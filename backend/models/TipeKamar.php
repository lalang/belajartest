<?php

namespace backend\models;

use Yii;
use \backend\models\base\TipeKamar as BaseTipeKamar;

/**
 * This is the model class for table "tipe_kamar".
 */
class TipeKamar extends BaseTipeKamar
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
