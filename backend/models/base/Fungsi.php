<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "fungsi".
 *
 * @property integer $id
 * @property integer $no_urut
 * @property string $nama
 * @property string $nama_en
 */
class Fungsi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fungsi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_urut' => 'No Urut',
            'nama' => 'Nama Fungsi',
            'nama_en' => 'Nama Fungsi Inggris',
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
     * @return \app\models\FungsiQuery the active query used by this AR class.
     */
   /* public static function find()
    {
        return new \app\models\FungsiQuery(get_called_class());
    }*/
}
