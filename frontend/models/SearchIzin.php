<?php

namespace frontend\models;

use yii\base\Model;

class SearchIzin extends Model {

    public $izin;
    public $bidang;
    public $status;
    public $tipe;
    public $bidang_izin;
    public function rules() {
        return [
            // Application Name
            ['izin', 'required'],
            ['izin', 'integer'],
            [['bidang'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 50],
            [['tipe'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels() {
        return [
            'izin' => 'Jenis Perizinan',
            'bidang' => 'Bidang',
            'status' => 'Status',
            'tipe' => 'Tipe',
        ];
    }

}
