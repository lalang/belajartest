<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "title_sub_landing".
 *
 * @property string $id
 * @property string $nama
 * @property string $publish
 */
class TitleSubLanding extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'title_sub_landing';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
  /*  public function optimisticLock() {
        return 'lock';
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
			'nama_seo' => 'Nama Seo',
			'nama_seo_en' => 'Nama Seo English',
            'publish' => 'Publish',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\TitleSubLandingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\TitleSubLandingQuery(get_called_class());
    }
}
