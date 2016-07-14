<?php

namespace backend\models;

use Yii;
use \backend\models\base\PerizinanBerkas as BasePerizinanBerkas;

/**
 * This is the model class for table "perizinan_berkas".
 */
class PerizinanBerkas extends BasePerizinanBerkas {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['perizinan_id', 'berkas_izin_id', 'urutan'], 'required'],
            [['perizinan_id', 'berkas_izin_id', 'user_file_id', 'urutan'], 'integer']
        ];
    }

}
