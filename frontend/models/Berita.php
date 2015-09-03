<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property integer $id_berita
 * @property integer $id_kategori
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
 * @property string $berita_status
 * @property string $berita_update_by
 * @property string $berita_update_device
 * @property string $berita_update_ip
 * @property integer $berita_update_date
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
    public function rules()
    {
        return [
            [['id_kategori', 'username', 'judul', 'judul_seo', 'headline', 'isi_berita', 'gambar', 'publish', 'hari', 'tanggal', 'jam', 'tag', 'berita_status', 'berita_update_by', 'berita_update_device', 'berita_update_ip', 'berita_update_date', 'judul_en', 'isi_berita_en', 'meta_title', 'meta_description', 'meta_keyword', 'meta_title_en', 'meta_description_en', 'meta_keyword_en'], 'required'],
            [['id_kategori', 'dibaca', 'berita_update_date'], 'integer'],
            [['headline', 'isi_berita', 'publish', 'isi_berita_en', 'meta_description', 'meta_description_en'], 'string'],
            [['tanggal', 'jam'], 'safe'],
            [['username', 'berita_update_by', 'berita_update_ip'], 'string', 'max' => 50],
            [['judul', 'judul_seo', 'tag'], 'string', 'max' => 200],
            [['gambar', 'berita_update_device'], 'string', 'max' => 100],
            [['hari', 'berita_status'], 'string', 'max' => 20],
            [['judul_en', 'meta_title', 'meta_keyword', 'meta_title_en', 'meta_keyword_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'id_kategori' => 'Id Kategori',
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
            'berita_status' => 'Berita Status',
            'berita_update_by' => 'Berita Update By',
            'berita_update_device' => 'Berita Update Device',
            'berita_update_ip' => 'Berita Update Ip',
            'berita_update_date' => 'Berita Update Date',
            'judul_en' => 'Judul En',
            'isi_berita_en' => 'Isi Berita En',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'meta_title_en' => 'Meta Title En',
            'meta_description_en' => 'Meta Description En',
            'meta_keyword_en' => 'Meta Keyword En',
        ];
    }
}
