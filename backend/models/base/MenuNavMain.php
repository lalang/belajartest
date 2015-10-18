<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "menu_nav_main".
 *
 * @property integer $id
 * @property string $nama
 * @property string $nama_en
 * @property string $link
 * @property string $link_en
 * @property string $target
 * @property integer $urutan
 * @property string $publish
 *
 * @property \backend\models\MenuNavSub[] $menuNavSubs
 */
class MenuNavMain extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_nav_main';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
    public function getMenuNavSubs()
    {
        return $this->hasMany(\backend\models\MenuNavSub::className(), ['id_menu_nav' => 'id']);
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
     * @return \backend\models\MenuNavMainQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MenuNavMainQuery(get_called_class());
    }
}
