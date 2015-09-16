<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "faq".
 *
 * @property integer $id
 * @property string $tanya
 * @property string $jawab
 * @property string $tanya_en
 * @property string $jawab_en
 * @property string $aktif
 */
class Faq extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanya' => 'Tanya',
            'jawab' => 'Jawab',
            'tanya_en' => 'Tanya',
            'jawab_en' => 'Jawab',
            'aktif' => 'Aktif',
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
     * @return \app\models\FaqQuery the active query used by this AR class.
     */
  /*  public static function find()
    {
        return new \app\models\FaqQuery(get_called_class());
    }*/
}
