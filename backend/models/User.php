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
//        $scenarios['register'][] = 'pelaksana_id';
        return $scenarios;
    }

    public function rules() {
        $rules = parent::rules();
        // add some rules
        $rules['pelaksana_idRequired'] = ['pelaksana_id', 'required'];
        $rules['pelaksana_idLength'] = ['pelaksana_id', 'string', 'max' => 10];
        $rules['wewenang_idRequired'] = ['wewenang_id', 'required'];
        $rules['wewenang_idLength'] = ['wewenang_id', 'string', 'max' => 10];
//        $rules['lokasi_idRequired'] = ['lokasi_id', 'required'];
        $rules['lokasi_idLength'] = ['lokasi_id', 'string', 'max' => 10];
        

        return $rules;
    }

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes) {
        if ($insert) {
            $access = \Yii::$app->authManager;
            if ($this->pelaksana_id == null)
                $item = $access->getRole('Pemohon');
            else
                $item = $access->getRole('Petugas');
            $access->assign($item, $this->id);
        }
        parent::afterSave($insert, $changedAttributes);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getWewenang()
    {
        return $this->hasOne(\backend\models\Wewenang::className(), ['id' => 'wewenang_id']);
    }
    
     public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }

}
