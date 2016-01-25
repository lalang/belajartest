<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "download_publikasi".
 *
 * @property integer $id
 * @property string $publikasi_id
 * @property string $judul
 * @property string $judul_eng
 * @property string $deskripsi
 * @property string $deskripsi_eng
 * @property string $nama_file
 * @property string $jenis_file
 * @property string $tanggal
 * @property integer $diunduh
 * @property string $publish
 *
 * @property \backend\models\Publikasi $publikasi
 */
class DownloadPublikasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'download_publikasi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'publikasi_id' => 'Publikasi ID',
            'judul' => 'Judul',
            'judul_eng' => 'Judul English',
            'deskripsi' => 'Deskripsi',
            'deskripsi_eng' => 'Deskripsi English',
            'nama_file' => 'Nama File',
            'jenis_file' => 'Jenis File',
            'tanggal' => 'Tanggal',
            'diunduh' => 'Diunduh',
            'publish' => 'Publish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublikasi()
    {
        return $this->hasOne(\backend\models\Publikasi::className(), ['id' => 'publikasi_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\DownloadPublikasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\DownloadPublikasiQuery(get_called_class());
    }
}
