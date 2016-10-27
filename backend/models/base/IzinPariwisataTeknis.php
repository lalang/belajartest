<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_teknis".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property integer $jenis_izin_pariwisata_id
 * @property string $no_izin
 * @property string $tanggal_izin
 * @property string $tanggal_masa_berlaku
 *
 * @property \backend\models\IzinPariwisata $izinPariwisata
 * @property \backend\models\JenisIzin $jenisIzin
 */
class IzinPariwisataTeknis extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id', 'jenis_izin_pariwisata_id'], 'integer'],
            [['tanggal_izin', 'tanggal_masa_berlaku'], 'safe'],
            [['no_izin'], 'string', 'max' => 100]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_teknis';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'jenis_izin_pariwisata_id' => Yii::t('app', 'Jenis Izin ID'),
            'no_izin' => Yii::t('app', 'No Izin'),
            'tanggal_izin' => Yii::t('app', 'Tanggal Izin'),
            'tanggal_masa_berlaku' => Yii::t('app', 'Tanggal Masa Berlaku'),
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
    public function getJenisIzinPariwisata()
    {
        return $this->hasOne(\backend\models\JenisIzinPariwisata::className(), ['id' => 'jenis_izin_pariwisata_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataTeknisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataTeknisQuery(get_called_class());
    }
}
