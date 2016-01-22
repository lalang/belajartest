<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdp_saham".
 *
 * @property integer $id
 * @property string $izin_tdp_id
 * @property string $nama_lengkap
 * @property string $alamat
 * @property string $kodepos
 * @property string $no_telp
 * @property integer $kewarganegaraan
 * @property string $npwp
 * @property double $jumlah_saham
 * @property double $jumlah_modal
 *
 * @property \backend\models\IzinTdp $izinTdp
 * @property \backend\models\Negara $kewarganegaraan0
 */
class IzinTdpSaham extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_saham';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_tdp_id' => Yii::t('app', 'Izin Tdp ID'),
            'nama_lengkap' => Yii::t('app', 'Nama Lengkap'),
            'alamat' => Yii::t('app', 'Alamat'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'no_telp' => Yii::t('app', 'No Telp'),
            'kewarganegaraan' => Yii::t('app', 'Kewarganegaraan'),
            'npwp' => Yii::t('app', 'Npwp'),
            'jumlah_saham' => Yii::t('app', 'Jumlah Saham'),
            'jumlah_modal' => Yii::t('app', 'Jumlah Modal'),
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
    public function getKewarganegaraan0()
    {
        return $this->hasOne(\backend\models\Negara::className(), ['id' => 'kewarganegaraan']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdpSahamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpSahamQuery(get_called_class());
    }
}
