<?php

namespace backend\models;

use Yii;
use \backend\models\base\Berita as BaseBerita;

/**
 * This is the model class for table "berita".
 */
class Berita extends BaseBerita
{
    
    /**
     * @inheritdoc
     */
    public $file;

    public function rules()
    {
        return [
            [['judul','judul_en', 'headline', 'isi_berita', 'isi_berita_en','publish'], 'required'],
            [['headline', 'isi_berita', 'publish', 'isi_berita_en', 'meta_description', 'meta_description_en'], 'string'],
            [['tanggal', 'jam'], 'safe'],
            [['dibaca'], 'integer'],
            [['file'],'file'],
            [['username'], 'string', 'max' => 50],
            [['judul', 'judul_seo', 'tag'], 'string', 'max' => 200],
            [['gambar'], 'string', 'max' => 100],
            [['hari'], 'string', 'max' => 20],
            [['judul_en', 'meta_title', 'meta_keyword', 'meta_title_en', 'meta_keyword_en'], 'string', 'max' => 255]
        ];
    }
	
}
