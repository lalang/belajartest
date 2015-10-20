<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property string $conten
 * @property string $conten_en
 * @property integer $urutan
 * @property string $image
 * @property string $publish
 */
class Slider extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Judul',
            'title_en' => 'Judul English',
            'conten' => 'Pesan',
            'conten_en' => 'Pesan English',
            'urutan' => 'Urutan',
            'image' => 'Image',
            'publish' => 'Publish',
        ];
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
     * @return \backend\models\SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SliderQuery(get_called_class());
    }
}
