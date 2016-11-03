<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisUsaha as BaseJenisUsaha;

/**
 * This is the model class for table "jenis_usaha".
 */
class JenisUsaha extends BaseJenisUsaha {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['bidang_izin_usaha_id'], 'integer'],
            [['aktif'], 'string'],
			[['kode'], 'string', 'max' => 50],
            [['keterangan'], 'string']
        ];
    }

}
