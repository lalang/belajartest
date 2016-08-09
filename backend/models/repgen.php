<?php

namespace backend\models;

use Yii;
use \backend\models\base\repgen as Baserepgen;

/**
 * This is the model class for table "v_repgen_siup".
 */
class repgen extends Baserepgen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Jenis_Izin', 'Nama_Perusahaan', 'Nama_Pimpinan', 'Jabatan_Pimpinan', 'Alamat_Perusahaan', 'Bentuk_Perusahaan', 'Kekayaan_Bersih_Perusahaan', 'Status_Perusahaan', 'Modal_Disetor', 'Aktiva_Tetap_Investasi', 'Aktiva_Tetap_Peralatan', 'kode_propinsi', 'kode_kecamatan', 'kode_kelurahan'], 'required'],
            [['Tanggal_SK', 'Tanggal_Expired'], 'safe'],
            [['Alamat_Perusahaan', 'Status_Permohonan'], 'string'],
            [['Kekayaan_Bersih_Perusahaan', 'Modal_Disetor', 'Aktiva_Tetap_Investasi', 'Aktiva_Tetap_Peralatan'], 'number'],
            [['kode_propinsi', 'kode_kabupaten', 'kode_kecamatan', 'kode_kelurahan'], 'integer'],
            [['NoReg', 'NoReg_TDP_Simultan'], 'string', 'max' => 7],
            [['Jenis_Siup'], 'string', 'max' => 14],
            [['Jenis_Izin', 'Jabatan_Pimpinan', 'Zonasi', 'kode_lokasi'], 'string', 'max' => 50],
            [['No_SK', 'Nama_Perusahaan', 'Nama_Pimpinan'], 'string', 'max' => 100],
            [['NPWP'], 'string', 'max' => 21],
            [['Bentuk_Perusahaan', 'Status_Perusahaan'], 'string', 'max' => 150],
            [['Telpon_Perusahaan', 'Fax_Perusahaan'], 'string', 'max' => 13],
            [['Kelembagaan'], 'string', 'max' => 200],
            [['KBLI_1', 'KBLI_2', 'KBLI_3', 'KBLI_4', 'KBLI_5'], 'string', 'max' => 5],
            [['Kewenangan'], 'string', 'max' => 181],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
    
    public static function getFields($transtype)
    {
        $view = 'v_repgen_'.$transtype;
        $data = (new \yii\db\Query)->select('COLUMN_NAME')->from('INFORMATION_SCHEMA.COLUMNS')->where('table_name = \''.$view.'\'')->all();
        $values = \yii\helpers\ArrayHelper::map($data, 'COLUMN_NAME', 'COLUMN_NAME');
        return $values;
    }

    public static function getOrderFields($transtype)
    {
        $view = 'v_repgen_'.$transtype;
        $data = (new \yii\db\Query)->select('COLUMN_NAME')->from('INFORMATION_SCHEMA.COLUMNS')->where('table_name = \''.$view.'\'')->all();
        $values = \yii\helpers\ArrayHelper::map($data, 'COLUMN_NAME', 'COLUMN_NAME');
        return $values;
    }

    public static function getStatusMohon()
    {
        $data = (new \yii\db\Query)->select('STATUS')->from('PERIZINAN')->groupBy('STATUS')->orderBy('STATUS')->all();
        $values = \yii\helpers\ArrayHelper::map($data, 'STATUS', 'STATUS');
        return $values;
    }

    public static function getDb()
    {
        return Yii::$app->get('dbreplica');
    }
    
}
