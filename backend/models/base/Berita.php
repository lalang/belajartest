<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "berita".
 *
 * @property integer $id
 * @property string $username
 * @property string $judul
 * @property string $judul_seo
 * @property string $headline
 * @property string $isi_berita
 * @property string $gambar
 * @property string $publish
 * @property string $hari
 * @property string $tanggal
 * @property string $jam
 * @property integer $dibaca
 * @property string $tag
 * @property string $judul_en
 * @property string $isi_berita_en
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $meta_title_en
 * @property string $meta_description_en
 * @property string $meta_keyword_en
 */
class Berita extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'judul' => 'Judul',
            'judul_seo' => 'Judul Seo',
            'headline' => 'Headline',
            'isi_berita' => 'Isi Berita',
            'gambar' => 'Gambar',
            'publish' => 'Publish',
            'hari' => 'Hari',
            'tanggal' => 'Tanggal',
            'jam' => 'Jam',
            'dibaca' => 'Dibaca',
            'tag' => 'Tag',
            'judul_en' => 'Judul English',
            'judul_seo_en' => 'Judul En',
            'isi_berita_en' => 'Isi Berita English',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'meta_title_en' => 'Meta Title En',
            'meta_description_en' => 'Meta Description En',
            'meta_keyword_en' => 'Meta Keyword En',
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
     * @return \app\models\BeritaQuery the active query used by this AR class.
     */
    // public static function find()
    // {
    //     return new \app\models\BeritaQuery(get_called_class());
    // }
}
