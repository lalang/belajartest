<?php

namespace backend\models;

use Yii;
use \backend\models\base\HariLibur as BaseHariLibur;

/**
 * This is the model class for table "hari_libur".
 */
class HariLibur extends BaseHariLibur {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['keterangan', 'keterangan_en', 'tanggal'], 'required'],
            [['tanggal'], 'safe'],
            [['keterangan', 'keterangan_en'], 'string', 'max' => 100]
        ];
    }

}
