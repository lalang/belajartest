<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "bentuk_perusahaan".
 *
 * @property string $id
 * @property string $nama
 * @property integer $urutan
 * @property string $type
 * @property string $publish
 */
class BentukPerusahaan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bentuk_perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'urutan' => 'Urutan',
            'type' => 'Type',
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
     * @return \backend\models\BentukPerusahaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\BentukPerusahaanQuery(get_called_class());
    }
}
