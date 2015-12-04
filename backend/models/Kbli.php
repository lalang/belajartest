<?php

namespace backend\models;

use Yii;
use \backend\models\base\Kbli as BaseKbli;

/**
 * This is the model class for table "kbli".
 */
class Kbli extends BaseKbli {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['kode', 'nama'], 'required'],
			[['parent_id'], 'integer'],
            [['kode'], 'string', 'max' => 5],
            [['nama'], 'string', 'max' => 255]
        ];
    }

    public function getKodeNama() {
        return $this->kode . ' | ' . $this->nama;
    }

}
