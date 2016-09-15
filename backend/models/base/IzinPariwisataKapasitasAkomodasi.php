<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_kapasitas_akomodasi".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property integer $tipe_kamar_id
 * @property integer $jumlah_kapasitas
 * @property integer $jumlah_unit
 *
 * @property \backend\models\IzinPariwisata $izinPariwisata
 * @property \backend\models\TipeKamar $tipeKamar
 */
class IzinPariwisataKapasitasAkomodasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id', 'tipe_kamar_id', 'jumlah_kapasitas', 'jumlah_unit'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_kapasitas_akomodasi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'tipe_kamar_id' => Yii::t('app', 'Tipe Kamar ID'),
            'jumlah_kapasitas' => Yii::t('app', 'Jumlah Kapasitas'),
            'jumlah_unit' => Yii::t('app', 'Jumlah Unit'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisata()
    {
        return $this->hasOne(\backend\models\IzinPariwisata::className(), ['id' => 'izin_pariwisata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipeKamar()
    {
        return $this->hasOne(\backend\models\TipeKamar::className(), ['id' => 'tipe_kamar_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataKapasitasAkomodasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataKapasitasAkomodasiQuery(get_called_class());
    }
}
