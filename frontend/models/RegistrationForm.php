<?php

namespace frontend\models;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * Add a new field
     * @var string
     */
    public $name;
    public $no_ktp;
    public $telepon;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['name', 'required'];
        $rules[] = ['name', 'string', 'max' => 255];
        $rules[] = ['no_ktp', 'required'];
        $rules[] = ['no_ktp', 'string', 'max' => 16];
        $rules[] = ['telepon', 'required'];
        $rules[] = ['telepon', 'string', 'max' => 15];
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['name'] = \Yii::t('user', 'Nama');
        $labels['no_ktp'] = \Yii::t('user', 'No. Identitas');
        $labels['telepon'] = \Yii::t('user', 'Handphone');
        return $labels;
    }

    /**
     * @inheritdoc
     */
    public function loadAttributes(User $user)
    {
        // here is the magic happens
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'name' => $this->name,
            'no_ktp' => $this->no_ktp,
            'telepon' => $this->telepon,
            'gravatar_email' => $this->email,
        ]);
        $user->setProfile($profile);
    }
}
?>
