<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "popup".
 *
 * @property string $id
 * @property string $image
 * @property string $url
 * @property integer $urutan
 * @property string $publish
 */
class Popup extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'popup';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'url' => 'Link',
            'urutan' => 'Urutan',
			'target' => 'Target',
            'publish' => 'Publish',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\PopupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PopupQuery(get_called_class());
    }
}
