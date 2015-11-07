<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "status_perusahaan".
 *
 * @property string $id
 * @property string $nama
 * @property integer $urutan
 * @property string $publish
 */
class StatusPerusahaan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_perusahaan';
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
     * @return \backend\models\StatusPerusahaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\StatusPerusahaanQuery(get_called_class());
    }
}
