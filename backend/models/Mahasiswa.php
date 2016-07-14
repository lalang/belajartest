<?php

namespace backend\models;

use Yii;
use \backend\models\base\Mahasiswa as BaseMahasiswa;

/**
 * This is the model class for table "mahasiswa".
 */
class Mahasiswa extends BaseMahasiswa {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nim', 'nama', 'jurusan'], 'required'],
            [['nim'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 250],
            [['jurusan'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

}
