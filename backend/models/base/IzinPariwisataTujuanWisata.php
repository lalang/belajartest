<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_tujuan_wisata".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property integer $tujuan_wisata_id
 *
 * @property \backend\models\IzinPariwisata $izinPariwisata
 * @property \backend\models\TujuanWisata $tujuanWisata
 */
class IzinPariwisataTujuanWisata extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id', 'tujuan_wisata_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_tujuan_wisata';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'tujuan_wisata_id' => Yii::t('app', 'Tujuan Wisata ID'),
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
    public function getTujuanWisata()
    {
        return $this->hasOne(\backend\models\TujuanWisata::className(), ['id' => 'tujuan_wisata_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataTujuanWisataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataTujuanWisataQuery(get_called_class());
    }
}
