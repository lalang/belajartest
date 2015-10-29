<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "sub_landing2".
 *
 * @property integer $id
 * @property string $icon
 * @property string $info
 * @property string $info_en
 * @property integer $urutan
 * @property string $link
 * @property string $link_en
 * @property string $target
 * @property string $publish
 */
class SubLanding2 extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_landing2';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'info' => 'Info',
            'info_en' => 'Info English',
            'urutan' => 'Urutan',
            'link' => 'Link',
            'link_en' => 'Link English',
            'target' => 'Target',
            'publish' => 'Publish',
        ];
    }

/**
     * @inheritdoc
     * @return type mixed
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
     * @return \backend\models\SubLanding2Query the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SubLanding2Query(get_called_class());
    }
}
