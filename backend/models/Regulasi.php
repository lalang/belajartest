<?php

namespace backend\models;

use Yii;
use \backend\models\base\Regulasi as BaseRegulasi;

/**
 * This is the model class for table "regulasi".
 */
class Regulasi extends BaseRegulasi
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publish'], 'string'],
			[['urutan'], 'integer'],
            [['nama', 'nama_en'], 'string', 'max' => 225]
        ];
    }
	
}
