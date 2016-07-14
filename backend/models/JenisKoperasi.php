<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisKoperasi as BaseJenisKoperasi;

/**
 * This is the model class for table "jenis_koperasi".
 */
class JenisKoperasi extends BaseJenisKoperasi {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 200]
        ];
    }

}
