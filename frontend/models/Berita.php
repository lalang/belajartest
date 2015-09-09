<?php

namespace frontend\models;

use Yii;
use yii\helpers;
use \yii\db\Query;
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
	
	public static function getBerita($kategori){
		
		$timestamp = time();
		$dt = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
		$dt->setTimestamp($timestamp);
		$date_time = strtotime($dt->format('Y-m-d H:i:s'));

		$base_url = 'http://api.beritajakarta.com/';

		$test = curl_init();
		curl_setopt_array($test, array(
			CURLOPT_RETURNTRANSFER => true,
			
			// url yg di-comment hanya berbeda pilihan bahasa
			CURLOPT_URL => $base_url.'ptsp/news/idn/'. $date_time .'/format/json', // get idn
			//CURLOPT_URL => $base_url.'ptsp/news/eng/'. $date_time .'/format/json', // get eng
			
			// login menggunakan PTSP API KEY parameters
			CURLOPT_USERPWD => 'bJ#Pt5p$:427ebffffb2e76adeadcd3dd9f0d14cf',
			CURLOPT_HTTPHEADER => array('BJ-API-KEY:PTSP-27644760-1'),
		));
		
		$response = curl_exec($test);
		$data = json_decode($response, true);
		return $data[$kategori];
	}
	
	public function getBeritaUtama(){
		$query = Berita::find();
        $data = $query->orderBy('id')
		->where(['headline' => 'Y', 'publish' => 'Y'])
        ->limit(4)
        ->all();	
		
		return $data;
	}
	
	public function getBeritaListLeft(){
		$query = Berita::find();
        $data = $query->orderBy('id')
		->where(['headline' => 'N', 'publish' => 'Y'])
		->limit(4)
		->offset(0)
        ->all();	
		
		return $data;
	}
	
	public function getBeritaListRight(){
		$query = Berita::find();
        $data = $query->orderBy('id')
		->where(['headline' => 'N', 'publish' => 'Y'])
		->limit(4)
		->offset(4)
        ->all();	
		
		return $data;
	}
	
	public function getDetailBerita($id){
		$query = Berita::find();
		$data = $query->orderBy('id')
		->select(['tanggal','hari','gambar','judul','isi_berita'])
		->where(['judul_seo' => $id])
        ->all();
	
		return $data;
	}
}
