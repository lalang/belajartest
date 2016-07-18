<?php

namespace backend\models;

use Yii;
use \backend\models\base\Satuan as BaseSatuan;

/**
 * This is the model class for table "satuan".
 */
class Satuan extends BaseSatuan {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['kode', 'nama'], 'required'],
            [['kode'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 200]
        ];
    }

}
