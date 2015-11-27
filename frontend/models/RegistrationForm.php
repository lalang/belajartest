<?php

namespace frontend\models;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;
use Yii;

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
        $user = $this->module->modelMap['User'];
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
        $rules['no_kkRequired'] = ['no_kk', 'required','when'=>function ($attribute) {
                    return $this->tipe == 'Perorangan';
                    }, 'whenClient' => "function (attribute, value) {
                                    return $('#register-form-tipe').val() == 'Perorangan';
                    }"];
        $rules[] = [['no_kk', 'telepon', 'nik', 'npwp'], 'number'];
        $rules[] = ['no_kk', 'string', 'min' => 16,'max' => 16];
        $rules[] = ['telepon', 'required'];
        $rules[] = ['telepon', 'string', 'max' => 15];
        $rules[] = ['tipe', 'required'];
        $rules[] = ['tipe', 'string', 'max' => 20];
        $rules['tipeValidate'] = [
                'tipe',
                function ($attribute) {
                    if($this->tipe == 'Perusahaan' && $this->npwp == ''){
                        $this->addError('npwp', Yii::t('user', 'NPWP Harus diisi'));
                    }elseif ($this->tipe == 'Perorangan' && $this->nik == '' && $this->no_kk == '') {
                        $this->addError('nik', Yii::t('user', 'NIK Harus diisi'));
                        $this->addError('no_kk', Yii::t('user', 'No.kk Harus diisi'));
                    }
                }
            ];
        $rules['nikRequired'] = ['nik', 'required','when'=>function ($attribute) {
                    return $this->tipe == 'Perorangan';
                    }, 'whenClient' => "function (attribute, value) {
                                    return $('#register-form-tipe').val() == 'Perorangan';
                    }"];
        $rules[] = ['nik', 'string', 'min' => 16, 'max' => 16];
        $rules['nikValidate'] = [
                'nik',
                function ($attribute) {
                    $user = User::findOne(['username'=>  $this->nik]);
                    if($user){
                        $this->addError($attribute, Yii::t('user', 'Nik sudah ada'));
                    }
                }
            ];
        $rules['npwpRequired'] = ['npwp', 'required','when'=>function ($attribute) {
                    return $this->tipe == 'Perusahaan';
                    }, 'whenClient' => "function (attribute, value) {
                                    return $('#register-form-tipe').val() == 'Perusahaan';
                    }"];
        $rules[] = ['npwp', 'string', 'min' => 15, 'max' => 15];
        $rules[] = ['status', 'string', 'max' => 100];
        $rules['npwpValidate'] = [
            'npwp',
            function ($attribute) {
                $user = User::findOne(['username'=>  $this->npwp]);
                if($user){
                        $this->addError($attribute, Yii::t('user', 'NPWP sudah ada'));
                }else{
                $service = \common\components\Service::getNpwpInfo($this->npwp);
                if($service == null || $service["jnis_wp"] == "ORANG PRIBADI"){
//                    $this->tipe = "Perusahaan";
                    $this->addError($attribute, Yii::t('user', 'Hanya Untuk NPWP Badan Usaha'));
                }
                }
            }
            ];
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
            $service = \common\components\Service::getPendudukInfo($this->nik, $this->no_kk);
            if($service['message'] == 'fault'){
                 $this->addError('nik', Yii::t('user', 'Maaf Koneksi ke Disdukcapil Sedang Ada Gangguan'));
                 $this->addError('no_kk', Yii::t('user', 'Maaf Koneksi ke Disdukcapil Sedang Ada Gangguan'));
                 return true;
            }
            if($service == NULL){
                $status = 'Bukan DKI';
                $nama = $this->name;
            }else{
                $status = "DKI";
                $nama = $service['nama'];
                $alamat = $service['alamat'];
                $tempat_lahir = $service['tmp_lahir'];
                $tgl_lahir = $service['tgl_lahir'];
                $jenkel = $service['jk'];
            }
//            if (substr($this->nik, 0, 2) == '31') {
//                $status = "DKI";
//                $nama = $this->name;
//            } else {
//                $status = "Bukan DKI";
//                $nama = $this->name;
//            }
            $username = $this->nik;
        } else {
            $service = \common\components\Service::getNpwpInfo($this->npwp);
            if($service['response'] == FALSE){
                    $this->addError('npwp', Yii::t('user', 'Maaf Koneksi ke DJP Sedang Ada Gangguan'));
                 return true;
            }
            if($service == null){
                $status = "NPWP Salah";
            }else{
                if($service["jnis_wp"] == "BADAN"){
                    $status = "NPWP Badan";
                    $nama = $service["nama"];
                    $alamat = $service["alamat"];
                }else{
                     $status = "NPWP Perorangan";
                    $nama = $service["nama"];
                    $alamat = $service["alamat"];
                }
            }
//            if (substr($this->npwp, 0, 2) == '31') {
//                $status = "NPWP Badan";
//                $nama = $this->name;
//            } else {
//                $status = "NPWP Perorangan";
//                $nama = $this->name;
//            }
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
            'name' => $nama,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jenkel' => $jenkel,
            'no_kk' => $this->no_kk,
            'tipe' => $this->tipe,
            'telepon' => $this->telepon,
            'gravatar_email' => $this->email,
        ]);
        $user->setProfile($profile);
    }

}

?>
