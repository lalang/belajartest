<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "download".
 *
 * @property integer $id
 * @property string $judul
 * @property string $judul_eng
 * @property string $deskripsi
 * @property string $deskripsi_eng
 * @property string $nama_file
 * @property string $jenis_file
 * @property string $tanggal
 * @property integer $diunduh
 * @property string $publish
 */
class Download extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
     * @return \backend\models\DownloadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\DownloadQuery(get_called_class());
    }
}
