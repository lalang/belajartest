<?php

namespace backend\models;

use Yii;
use \backend\models\base\BidangIzinUsaha as BaseBidangIzinUsaha;

/**
 * This is the model class for table "bidang_izin_usaha".
 */
class BidangIzinUsaha extends BaseBidangIzinUsaha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['aktif'], 'string'],
            [['keterangan', 'kode'], 'string', 'max' => 560]
        ]);
    }
    
    public static function getDataList() {
        $data = static::find()
                ->where(['aktif' => 'Y'])
                ->orderBy('keterangan')
                ->all();
//        $value = (count($data) == 0) ? ['' => ''] : $data;
        $value = (count($data) == 0) ? ['' => ''] : \yii\helpers\ArrayHelper::map($data, 'id', 'keterangan');

        return $value;
    }
	
}
