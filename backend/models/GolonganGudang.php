<?php

namespace backend\models;

use Yii;
use \backend\models\base\GolonganGudang as BaseGolonganGudang;

/**
 * This is the model class for table "golongan_gudang".
 */
class GolonganGudang extends BaseGolonganGudang {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nama'], 'required'],
            [['id'], 'integer'],
            [['publish'], 'string'],
            [['nama', 'luas', 'kapasitas_penyimpanan', 'bentuk'], 'string', 'max' => 50]
        ];
    }

}
