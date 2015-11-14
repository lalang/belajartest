<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "publikasi".
 *
 * @property string $id
 * @property string $nama
 * @property string $nama_en
 * @property integer $urutan
 * @property string $publish
 *
 * @property \backend\models\DownloadPublikasi[] $downloadpublikasi
 */
class Publikasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publikasi';
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
            'urutan' => 'Urutan',
            'publish' => 'Publish',
        ];
    }
	
	/**
     * @return \yii\db\ActiveQuery

    public function getDownloadPublikasi()
    {
        return $this->hasMany(\backend\models\DownloadPublikasi::className(), ['publikasi_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\PublikasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PublikasiQuery(get_called_class());
    }
}
