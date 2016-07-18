<?php

namespace backend\models;

use Yii;
use \backend\models\base\MenuNavigasi as BaseMenuNavigasi;

/**
 * This is the model class for table "menu_navigasi".
 */
class MenuNavigasi extends BaseMenuNavigasi {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'urutan'], 'integer'],
            [['target', 'publish'], 'string'],
            [['nama', 'nama_en'], 'string', 'max' => 50],
            [['link', 'link_en'], 'string', 'max' => 225]
        ];
    }

}
