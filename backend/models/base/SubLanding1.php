<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "sub_landing1".
 *
 * @property integer $id
 * @property integer $no_urut
 * @property string $nama
 * @property string $nama_en
 */
class SubLanding1 extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_landing1';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_urut' => 'No Urut',
            'nama' => 'Nama',
            'nama_en' => 'Nama English',
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
     * @return \backend\models\SubLanding1Query the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SubLanding1Query(get_called_class());
    }
}
