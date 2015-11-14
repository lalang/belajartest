<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "menu_home".
 *
 * @property integer $id
 * @property string $icon
 * @property string $nama
 * @property string $nama_en
 * @property string $link
 * @property string $link_en
 * @property integer $urutan
 * @property string $publish
 */
class MenuHome extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_home';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'nama' => 'Nama',
            'nama_en' => 'Nama English',
            'link' => 'Link',
            'link_en' => 'Link English',
            'urutan' => 'Urutan',
            'publish' => 'Publish',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\MenuHomeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MenuHomeQuery(get_called_class());
    }
}
