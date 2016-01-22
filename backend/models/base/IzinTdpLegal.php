<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdp_legal".
 *
 * @property integer $id
 * @property string $izin_tdp_id
 * @property integer $jenis
 * @property string $nomor
 * @property string $dikeluarkan_oleh
 * @property string $tanggal_dikeluarkan
 * @property integer $masa_laku
 * @property string $masa_laku_satuan
 * @property integer $create_by
 * @property string $create_date
 * @property integer $update_by
 * @property string $update_date
 *
 * @property \backend\models\IzinTdp $izinTdp
 * @property \backend\models\JenisIzin $jenis0
 */
class IzinTdpLegal extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_legal';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_tdp_id' => Yii::t('app', 'Izin Tdp ID'),
            'jenis' => Yii::t('app', 'Jenis'),
            'nomor' => Yii::t('app', 'Nomor'),
            'dikeluarkan_oleh' => Yii::t('app', 'Dikeluarkan Oleh'),
            'tanggal_dikeluarkan' => Yii::t('app', 'Tanggal Dikeluarkan'),
            'masa_laku' => Yii::t('app', 'Masa Laku'),
            'masa_laku_satuan' => Yii::t('app', 'Masa Laku Satuan'),
            'create_by' => Yii::t('app', 'Create By'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_by' => Yii::t('app', 'Update By'),
            'update_date' => Yii::t('app', 'Update Date'),
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
    public function getJenis0()
    {
        return $this->hasOne(\backend\models\JenisIzin::className(), ['id' => 'jenis']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinTdpLegalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpLegalQuery(get_called_class());
    }
}
