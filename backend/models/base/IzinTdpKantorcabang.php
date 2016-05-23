<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdp_kantorcabang".
 *
 * @property integer $id
 * @property string $izin_tdp_id
 * @property string $nama
 * @property string $no_tdp
 * @property string $alamat
 * @property integer $propinsi_id
 * @property integer $kabupaten_id
 * @property string $kodepos
 * @property string $no_telp
 * @property integer $status_prsh
 * @property integer $kbli_id
 *
 * @property \backend\models\IzinTdp $izinTdp
 */
class IzinTdpKantorcabang extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_kantorcabang';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_tdp_id' => Yii::t('app', 'Izin Tdp ID'),
            'nama' => Yii::t('app', 'Nama'),
            'no_tdp' => Yii::t('app', 'No Tdp'),
            'alamat' => Yii::t('app', 'Alamat'),
            'propinsi_id' => Yii::t('app', 'Propinsi ID'),
            'kabupaten_id' => Yii::t('app', 'Kabupaten ID'),
            'kodepos' => Yii::t('app', 'Kodepos'),
            'no_telp' => Yii::t('app', 'No Telp'),
            'status_prsh' => Yii::t('app', 'Status Prsh'),
            'kbli_id' => Yii::t('app', 'Kbli ID'),
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
     * @inheritdoc
     * @return \backend\models\IzinTdpKantorcabangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpKantorcabangQuery(get_called_class());
    }
    
}
