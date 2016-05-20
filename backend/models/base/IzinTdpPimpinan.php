<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdp_pimpinan".
 *
 * @property integer $id
 * @property string $izin_tdp_id
 * @property integer $jabatan_id
 * @property integer $kewarganegaraan_id
 * @property integer $jabatan_lain_id
 * @property string $nama_lengkap
 * @property string $tmplahir
 * @property string $tgllahir
 * @property string $alamat_lengkap
 * @property string $kodepos
 * @property string $telepon
 * @property string $mulai_jabat
 * @property integer $jml_lbr_saham
 * @property double $jml_rp_modal
 *
 * @property \backend\models\IzinTdp $izinTdp
 * @property \backend\models\Jabatan $jabatan
 * @property \backend\models\Jabatan $jabatanLain
 * @property \backend\models\Negara $kewarganegaraan
 */
class IzinTdpPimpinan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_pimpinan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_tdp_id' => Yii::t('app', 'Izin Tdp ID'),
            'jabatan_id' => Yii::t('app', 'Jabatan ID'),
            'kewarganegaraan_id' => Yii::t('app', 'Kewarganegaraan ID'),
            'jabatan_lain_id' => Yii::t('app', 'Jabatan Lain ID'),
            'nama_lengkap' => Yii::t('app', 'Nama Lengkap'),
            'tmplahir' => Yii::t('app', 'Tmplahir'),
            'tgllahir' => Yii::t('app', 'Tgllahir'),
            'alamat_lengkap' => Yii::t('app', 'Alamat Lengkap'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'telepon' => Yii::t('app', 'Telepon'),
            'mulai_jabat' => Yii::t('app', 'Tgl. Mulai Jabatan'),
            'nama_perusahaan_lain' => Yii::t('app', 'Nama Prsh. Lain'),
            'alamat_perusahaan_lain' => Yii::t('app', 'Alamat Prsh. Lain'),
            'kodepos_perusahaan_lain' => Yii::t('app', 'Kodepos Prsh. Lain'),
            'telepon_perusahaan_lain' => Yii::t('app', 'Telepon Prsh. Lain'),
            'mulai_jabat_lain' => Yii::t('app', 'Tgl. Mulai Jabatan Lain'),
            'jml_lbr_saham' => Yii::t('app', 'Jml Lbr Saham'),
            'jml_rp_modal' => Yii::t('app', 'Jml Rp Modal'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdp()
    {
        return $this->hasOne(\backend\models\IzinTdp::className(), ['id' => 'izin_tdp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(\backend\models\Jabatan::className(), ['id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanLain()
    {
        return $this->hasOne(\backend\models\Jabatan::className(), ['id' => 'jabatan_lain_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKewarganegaraan()
    {
        return $this->hasOne(\backend\models\Negara::className(), ['id' => 'kewarganegaraan_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdpPimpinanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpPimpinanQuery(get_called_class());
    }
    
    public static function getDb()
    {
        // use the "db2" application component
        return \Yii::$app->dbTrans;  
    }
}
