<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinKbli as BaseIzinKbli;

/**
 * This is the model class for table "kbli_izin".
 */
class IzinKbli extends BaseIzinKbli {

    /**
     * @inheritdoc
     */
    public $no_input;
    public $old_kbli_id;
    public $kode_kbli_id;

    public function rules() {
        return [
            [['kbli_id', 'izin_id'], 'required'],
            [['no_input'], 'string'],
            [['old_kbli_id'], 'integer'],
            [['kode_kbli_id'], 'integer'],
        ];
    }

}
