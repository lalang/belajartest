<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "page".
 *
 * @property string $id
 * @property string $judul
 * @property string $judul_seo
 * @property string $judul_en
 * @property string $judul_seo_en
 * @property string $description
 * @property string $description_en
 * @property string $gambar
 * @property string $tanggal
 * @property integer $urutan
 * @property string $landing
 * @property string $publish
 */
class Page extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'judul_seo' => 'Judul Seo',
            'judul_en' => 'Judul English',
            'judul_seo_en' => 'Judul Seo English',
            'description' => 'Deskripsi',
            'description_en' => 'Deskripsi English',
            'gambar' => 'Gambar',
            'tanggal' => 'Tanggal',
            'urutan' => 'Urutan',
            'landing' => 'Landing',
            'publish' => 'Publish',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PageQuery(get_called_class());
    }
}
