<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "page".
 *
 * @property integer $id
 * @property string $page_title
 * @property string $page_title_en
 * @property string $page_description
 * @property string $page_description_en
 * @property string $page_image
 * @property string $page_date
 * @property string $meta_title
 * @property string $meta_title_en
 * @property string $meta_description
 * @property string $meta_description_en
 * @property string $meta_keyword
 * @property string $meta_keyword_en
 * @property integer $page_urutan
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
            'page_title' => 'Judul',
            'page_title_seo' => 'Page Title_seo',
            'page_title_en' => 'Judul',
            'page_title_seo_en' => 'Page Title En Seo',
            'page_description' => 'Isi Halaman',
            'page_description_en' => 'Isi Halaman',
            'page_image' => 'Gambar',
            'page_date' => 'Update',
            'meta_title' => 'Meta Title',
            'meta_title_en' => 'Meta Title En',
            'meta_description' => 'Meta Description',
            'meta_description_en' => 'Meta Description En',
            'meta_keyword' => 'Meta Keyword',
            'meta_keyword_en' => 'Meta Keyword En',
            'page_urutan' => 'Nomor Urut',
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
     * @return \app\models\PageQuery the active query used by this AR class.
     */
    // public static function find()
    // {
    //     return new \app\models\PageQuery(get_called_class());
    // }
}
