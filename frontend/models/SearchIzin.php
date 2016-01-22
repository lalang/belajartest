<?php

namespace frontend\models;

use yii\base\Model;

class SearchIzin extends Model {

    public $izin;
    public $bidang;
    public $id_user;
    public $status_id;
    public $tipe;
    public $bidang_izin;
    public $id_izin_siup;
    
    
    public function rules() {
        return [
            // Application Name
            ['izin', 'required'],
            [['izin','id_user'], 'integer'],
            [['bidang'], 'string', 'max' => 100],
            [['status_id', 'id_izin_siup'], 'integer'],
            [['tipe'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels() {
        return [
            'izin' => 'Jenis Perizinan',
            'bidang' => 'Bidang',
            'status_id' => 'Status',
            'tipe' => 'Tipe',
            'id_user' => 'Nama Pemohon',
            'id_izin_siup' => 'Izin Siup'
        ];
    }

}
