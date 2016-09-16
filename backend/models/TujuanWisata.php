<?php

namespace backend\models;

use Yii;
use \backend\models\base\TujuanWisata as BaseTujuanWisata;

/**
 * This is the model class for table "tujuan_wisata".
 */
class TujuanWisata extends BaseTujuanWisata
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
