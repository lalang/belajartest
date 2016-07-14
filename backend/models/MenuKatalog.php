<?php

namespace backend\models;

use Yii;
use \backend\models\base\MenuKatalog as BaseMenuKatalog;

/**
 * This is the model class for table "menu_katalog".
 */
class MenuKatalog extends BaseMenuKatalog {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['icon', 'nama', 'nama_en', 'link', 'link_en', 'urutan', 'publish', 'target'], 'required'],
            [['urutan'], 'integer'],
            [['publish', 'target'], 'string'],
            [['icon', 'nama', 'nama_en'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 225]
        ];
    }

}
