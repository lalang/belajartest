<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "download".
 *
 * @property integer $id
 * @property string $regulasi_id
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
 * @property \backend\models\Regulasi $idRegulasi
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
            'regulasi_id' => 'Id Regulasi',
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
    public function getRegulasi()
    {
        return $this->hasOne(\backend\models\Regulasi::className(), ['id' => 'regulasi_id']);
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
