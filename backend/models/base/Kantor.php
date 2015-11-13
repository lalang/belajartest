<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "kantor".
 *
 * @property string $id
 * @property integer $lokasi_id
 * @property string $nama
 * @property string $kepala
 * @property string $alamat
 * @property string $kodepos
 * @property string $telepon
 * @property string $fax
 * @property double $latitude
 * @property double $longitude
 * @property string $email_jak_go_id
 * @property string $email_kelurahan
 * @property string $email_ptsp
 * @property string $twitter
 *
 * @property \backend\models\Lokasi $lokasi
 */
class Kantor extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kantor';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lokasi_id' => 'Lokasi ID',
            'nama' => 'Nama',
            'kepala' => 'Kepala',
            'alamat' => 'Alamat',
            'kodepos' => 'Kodepos',
            'telepon' => 'Telepon',
            'fax' => 'Fax',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'email_jak_go_id' => 'Email Jak Go ID',
            'email_kelurahan' => 'Email Kelurahan',
            'email_ptsp' => 'Email Ptsp',
            'twitter' => 'Twitter',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(\backend\models\Lokasi::className(), ['id' => 'lokasi_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\KantorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\KantorQuery(get_called_class());
    }
}
