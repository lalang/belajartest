<?php

namespace backend\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends \dektrium\user\models\User {

    public function scenarios() {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][] = 'pelaksana_id';
        $scenarios['update'][] = 'pelaksana_id';
        $scenarios['create'][] = 'wewenang_id';
        $scenarios['update'][] = 'wewenang_id';
        $scenarios['create'][] = 'lokasi_id';
        $scenarios['update'][] = 'lokasi_id';
        $scenarios['create'][] = 'no_identitas';
        $scenarios['update'][] = 'no_identitas';
        $scenarios['create'][] = 'nama_jabatan';
        $scenarios['update'][] = 'nama_jabatan';
        $scenarios['create'][] = 'kode_jabatan';
        $scenarios['update'][] = 'kode_jabatan';
        $scenarios['create'][] = 'nama_lokasi';
        $scenarios['update'][] = 'nama_lokasi';
        $scenarios['create'][] = 'kode_lokasi';
        $scenarios['update'][] = 'kode_lokasi';
        $scenarios['create'][] = 'nip';
        $scenarios['update'][] = 'nip';
        $scenarios['create'][] = 'kdprop';
        $scenarios['update'][] = 'kdprop';
        $scenarios['create'][] = 'kdwil';
        $scenarios['update'][] = 'kdwil';
        $scenarios['create'][] = 'kdkec';
        $scenarios['update'][] = 'kdkec';
        $scenarios['create'][] = 'kdkel';
        $scenarios['update'][] = 'kdkel';
        $scenarios['register'][] = 'status';
//        $scenarios['register'][] = 'pelaksana_id';
        return $scenarios;
    }

    public function rules() {
        $rules = parent::rules();
        // add some rules
        $rules['pelaksana_idRequired'] = ['pelaksana_id', 'required','when'=>function ($attribute) {
                    $assigment = \Yii::$app->authManager->getRolesByUser($this->id);
                    foreach ($assigment as $assign) {
                        $assign->name;
                    } return $assign->name == 'Petugas';
                    }];
        $rules['pelaksana_idLength'] = ['pelaksana_id', 'string', 'max' => 10];
        $rules['wewenang_idRequired'] = ['wewenang_id', 'required','when'=>function ($attribute) {
                    $assigment = \Yii::$app->authManager->getRolesByUser($this->id);
                    foreach ($assigment as $assign) {
                        $assign->name;
                    } return $assign->name == 'Petugas';
                    }];
        $rules['wewenang_idLength'] = ['wewenang_id', 'string', 'max' => 10];
//        $rules['lokasi_idRequired'] = ['lokasi_id', 'required'];
        $rules['no_identitasLength'] = ['no_identitas', 'string', 'max' => 30];
        $rules['nama_jabatanLength'] = ['nama_jabatan', 'string', 'max' => 300];
        $rules['kode_jabatanLength'] = ['kode_jabatan', 'string', 'max' => 6];
        $rules['nama_lokasiLength'] = ['nama_lokasi', 'string', 'max' => 300];
        $rules['kode_lokasiLength'] = ['kode_lokasi', 'string', 'max' => 6];
        $rules['statusLength'] = ['status', 'string', 'max' => 100];
//        $rules['kdpropLength'] = ['kdprop', 'number', 'max' => 5];
//        $rules['kdwilLength'] = ['kdwil', 'number', 'max' => 5];
//        $rules['kdkecLength'] = ['kdkec', 'number', 'max' => 5];
//        $rules['kdkelLength'] = ['kdkel', 'number', 'max' => 5];

        return $rules;
    }

    public function attributeLabels() {
        $labels = parent::attributeLabels();
        $labels['pelaksana_id'] = \Yii::t('user', 'Pelaksana');
        $labels['wewenang_id'] = \Yii::t('user', 'Wewenang');
        return $labels;
    }
    
    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes) {
        if ($insert) {
            $access = \Yii::$app->authManager;
            if ($this->pelaksana_id == null){
                $item = $access->getRole('Pemohon');
            }
            else{
                $item = $access->getRole('Petugas');
                $prop = 31;
                switch ($this->wewenang_id) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->kdwil;
                        break;
                    case 3:
                        $lokasi = $this->kdkec;
                        break;
                    case 4:
                        $lokasi = $this->kdkel;
                        break;
                }
                $this->updateAttributes([
                    'kdprop' => $prop,
                    'lokasi_id' => $lokasi,
                    ]);
            }
            $access->assign($item, $this->id);
        }else{
            switch ($this->wewenang_id) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->kdwil;
                        break;
                    case 3:
                        $lokasi = $this->kdkec;
                        break;
                    case 4:
                        $lokasi = $this->kdkel;
                        break;
                }
                $this->updateAttributes([
                    'lokasi_id' => $lokasi,
                    ]);
        }
        parent::afterSave($insert, $changedAttributes);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getWewenang()
    {
        
        $this->hasOne(\backend\models\Wewenang::className(), ['id' => 'wewenang_id']);
    }
    
     public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }
    
     public function getUserValid($username)
    {
         
         if(User::find()->where(['username' => $username]) != NULL){
             return FALSE;
         } else {
             return TRUE;
         }
         
         
    }
    
    public function getPelaksana()
    {
        return $this->hasOne(\backend\models\Pelaksana::className(), ['id' => 'pelaksana_id']);
    }
    
//    public function getProfile()
//    {
//        return $this->hasMany(\dektrium\user\models\Profile::className(), ['user_id' => 'id']);
//    }

}
