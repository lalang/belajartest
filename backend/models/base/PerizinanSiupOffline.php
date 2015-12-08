<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "perizinan_siup_offline".
 *
 * @property integer $id
 * @property string $no_izin
 * @property string $pemilik_nama
 * @property string $pemilik_tempat_lahir
 * @property string $pemilik_tanggal_lahir
 * @property string $pemilik_alamat_rumah
 * @property string $pemilik_propinsi
 * @property string $pemilik_kabupaten
 * @property string $pemilik_kecamatan
 * @property string $pemilik_kelurahan
 * @property string $pemilik_no_telpon
 * @property string $pemilik_no_ktp
 * @property string $pemilik_kewarganegaraan
 * @property string $perusahaan_nama
 * @property string $perusahaan_alamat
 * @property string $perusahaan_propinsi
 * @property string $perusahaan_kabupaten
 * @property string $perusahaan_kecamatan
 * @property string $perusahaan_kelurahan
 * @property string $perusahaan_kodepos
 * @property string $perusahaan_no_telpon
 * @property string $perusahaan_no_fax
 * @property string $perusahaan_email
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 */
class PerizinanSiupOffline extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perizinan_siup_offline';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_izin' => 'No Izin',
            'pemilik_nama' => 'Pemilik Nama',
            'pemilik_tempat_lahir' => 'Pemilik Tempat Lahir',
            'pemilik_tanggal_lahir' => 'Pemilik Tanggal Lahir',
            'pemilik_alamat_rumah' => 'Pemilik Alamat Rumah',
            'pemilik_propinsi' => 'Pemilik Propinsi',
            'pemilik_kabupaten' => 'Pemilik Kabupaten',
            'pemilik_kecamatan' => 'Pemilik Kecamatan',
            'pemilik_kelurahan' => 'Pemilik Kelurahan',
            'pemilik_no_telpon' => 'Pemilik No Telpon',
            'pemilik_no_ktp' => 'Pemilik No Ktp',
            'pemilik_kewarganegaraan' => 'Pemilik Kewarganegaraan',
            'perusahaan_nama' => 'Perusahaan Nama',
            'perusahaan_alamat' => 'Perusahaan Alamat',
            'perusahaan_propinsi' => 'Perusahaan Propinsi',
            'perusahaan_kabupaten' => 'Perusahaan Kabupaten',
            'perusahaan_kecamatan' => 'Perusahaan Kecamatan',
            'perusahaan_kelurahan' => 'Perusahaan Kelurahan',
            'perusahaan_kodepos' => 'Perusahaan Kodepos',
            'perusahaan_no_telpon' => 'Perusahaan No Telpon',
            'perusahaan_no_fax' => 'Perusahaan No Fax',
            'perusahaan_email' => 'Perusahaan Email',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

/**
     * @inheritdoc
     * @return type mixed
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
     * @return \backend\models\PerizinanSiupOfflineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PerizinanSiupOfflineQuery(get_called_class());
    }
}
