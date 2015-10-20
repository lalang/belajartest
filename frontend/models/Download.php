<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "download".
 *
 * @property integer $id_download
 * @property string $judul
 * @property string $deskripsi
 * @property string $nama_file
 * @property string $jenis_file
 * @property string $tanggal
 * @property integer $diunduh
 * @property string $download_status
 * @property string $download_update_by
 * @property string $download_update_device
 * @property string $download_update_ip
 * @property integer $download_update_date
 * @property string $judul_eng
 * @property string $deskripsi_eng
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_key
 * @property string $meta_title_eng
 * @property string $meta_desc_eng
 * @property string $meta_key_eng
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'download';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'nama_file', 'tanggal', 'download_status', 'download_update_by', 'download_update_device', 'download_update_ip', 'download_update_date'], 'required'],
            [['jenis_file'], 'string'],
            [['tanggal'], 'safe'],
            [['diunduh', 'download_update_date'], 'integer'],
            [['judul', 'deskripsi', 'nama_file', 'download_update_device', 'judul_eng', 'deskripsi_eng', 'meta_title', 'meta_desc', 'meta_key', 'meta_title_eng', 'meta_desc_eng', 'meta_key_eng'], 'string', 'max' => 100],
            [['download_status'], 'string', 'max' => 20],
            [['download_update_by', 'download_update_ip'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_download' => 'Id Download',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'nama_file' => 'Nama File',
            'jenis_file' => 'Jenis File',
            'tanggal' => 'Tanggal',
            'diunduh' => 'Diunduh',
            'download_status' => 'Download Status',
            'download_update_by' => 'Download Update By',
            'download_update_device' => 'Download Update Device',
            'download_update_ip' => 'Download Update Ip',
            'download_update_date' => 'Download Update Date',
            'judul_eng' => 'Judul Eng',
            'deskripsi_eng' => 'Deskripsi Eng',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_key' => 'Meta Key',
            'meta_title_eng' => 'Meta Title Eng',
            'meta_desc_eng' => 'Meta Desc Eng',
            'meta_key_eng' => 'Meta Key Eng',
        ];
    }
}
