<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "kontak".
 *
 * @property integer $id
 * @property string $judul
 * @property string $judul_en
 * @property string $info_main
 * @property string $info_main_en
 * @property string $info_sub
 * @property string $info_sub_en
 * @property string $alamat
 * @property string $alamat_en
 * @property integer $tlp
 * @property string $email
 */
class Kontak extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kontak';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'judul_en' => 'Judul English',
            'info_main' => 'Info Main',
            'info_main_en' => 'Info Main English',
            'info_sub' => 'Info Sub',
            'info_sub_en' => 'Info Sub English',
            'alamat' => 'Alamat',
            'alamat_en' => 'Alamat English',
            'tlp' => 'Tlp',
            'email' => 'Email',
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
     * @return \backend\models\KontakQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\KontakQuery(get_called_class());
    }
}
