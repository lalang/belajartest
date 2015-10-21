<?php

namespace frontend\models;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm {

    /**
     * Add a new field
     * @var string
     */
    public $name;
    public $no_kk;
    public $telepon;
    public $tipe;
    public $nik;
    public $npwp;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
//        $rules[] = ['no_kk', 'required'];
        $rules[] = ['no_kk', 'string', 'max' => 16];
        $rules[] = ['telepon', 'required'];
        $rules[] = ['telepon', 'string', 'max' => 15];
        $rules[] = ['tipe', 'required'];
        $rules[] = ['tipe', 'string', 'max' => 20];
//        $rules[] = ['nik', 'required'];
        $rules[] = ['nik', 'string', 'max' => 16];
//        $rules[] = ['npwp', 'required'];
        $rules[] = ['npwp', 'string', 'max' => 15];
        $rules[] = ['status', 'string', 'max' => 15];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        $labels = parent::attributeLabels();
        $labels['name'] = \Yii::t('user', 'Nama');
        $labels['no_kk'] = \Yii::t('user', 'No. KK');
        $labels['telepon'] = \Yii::t('user', 'Handphone');
        $labels['tipe'] = \Yii::t('user', 'Tipe');
        $labels['nik'] = \Yii::t('user', 'NIK');
        $labels['npwp'] = \Yii::t('user', 'NPWP');
        return $labels;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(User $user) {
        // here is the magic happens
        if ($this->tipe == 'Perorangan') {
//            $service = \common\components\Service::getPendudukInfo($this->nik, $this->no_kk);
//            if($service == null){
//                $status = "bukan";
//                
//                
//            }else{
//                $status = "DKI";
//            }
            if (substr($this->nik, 0, 2) == '31') {
                $status = "DKI";
            } else {
                $status = "bukan";
            }
            $username = $this->nik;
        } else {
            $username = $this->npwp;
        }
        $user->setAttributes([
            'email' => $this->email,
            'username' => $username,
//            'password' => '123456',
            'status' => $status
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
            'no_kk' => $this->no_kk,
            'tipe' => $this->tipe,
            'telepon' => $this->telepon,
            'gravatar_email' => $this->email,
        ]);
        $user->setProfile($profile);
    }

}

?>
