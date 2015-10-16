<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "menu_nav_sub".
 *
 * @property integer $id
 * @property integer $id_menu_nav
 * @property string $nama
 * @property string $nama_en
 * @property string $link
 * @property string $link_en
 * @property string $target
 * @property integer $urutan
 * @property string $publish
 *
 * @property \backend\models\MenuNavMain $idMenuNav
 */
class MenuNavSub extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_nav_sub';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_menu_nav' => 'Id Menu Nav',
            'nama' => 'Nama',
            'nama_en' => 'Nama English',
            'link' => 'Link',
            'link_en' => 'Link English',
            'target' => 'Target',
            'urutan' => 'Urutan',
            'publish' => 'Publish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMenuNav()
    {
        return $this->hasOne(\backend\models\MenuNavMain::className(), ['id' => 'id_menu_nav']);
    }

/**
     * @inheritdoc
     * @return type array
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\MenuNavSubQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MenuNavSubQuery(get_called_class());
    }
}
