<?php

namespace backend\models;

use Yii;
use \backend\models\base\MenuHome as BaseMenuHome;

/**
 * This is the model class for table "menu_home".
 */
class MenuHome extends BaseMenuHome {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['icon', 'nama', 'nama_en', 'link', 'link_en', 'urutan', 'publish'], 'required'],
            [['urutan'], 'integer'],
            [['publish'], 'string'],
            [['icon', 'nama', 'nama_en'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 225]
        ];
    }

}
