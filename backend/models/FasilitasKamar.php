<?php

namespace backend\models;

use Yii;
use \backend\models\base\FasilitasKamar as BaseFasilitasKamar;

/**
 * This is the model class for table "fasilitas_kamar".
 */
class FasilitasKamar extends BaseFasilitasKamar
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
