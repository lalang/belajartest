<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_fasilitas".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property integer $fasilitas_kamar_id
 *
 * @property \backend\models\FasilitasKamar $fasilitasKamar
 * @property \backend\models\IzinPariwisata $izinPariwisata
 */
class IzinPariwisataFasilitas extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id', 'fasilitas_kamar_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_fasilitas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'fasilitas_kamar_id' => Yii::t('app', 'Fasilitas Kamar ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFasilitasKamar()
    {
        return $this->hasOne(\backend\models\FasilitasKamar::className(), ['id' => 'fasilitas_kamar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisata()
    {
        return $this->hasOne(\backend\models\IzinPariwisata::className(), ['id' => 'izin_pariwisata_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataFasilitasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataFasilitasQuery(get_called_class());
    }
}
