<?php

namespace backend\models;

use Yii;
use \backend\models\base\Kantor as BaseKantor;

/**
 * This is the model class for table "kantor".
 */
class Kantor extends BaseKantor {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['lokasi_id'], 'required'],
            [['lokasi_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['nama', 'kepala', 'email_jak_go_id', 'email_kelurahan', 'email_ptsp', 'twitter'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 255],
            [['kodepos', 'telepon', 'fax'], 'string', 'max' => 15]
        ];
    }

}
