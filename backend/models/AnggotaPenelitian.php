<?php

namespace backend\models;

use Yii;
use \backend\models\base\AnggotaPenelitian as BaseAnggotaPenelitian;

/**
 * This is the model class for table "anggota_penelitian".
 */
class AnggotaPenelitian extends BaseAnggotaPenelitian {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['penelitian_id', 'nik_peneliti'], 'integer'],
            [['bidang', 'nama_peneliti'], 'string', 'max' => 50],
        ];
    }

}
