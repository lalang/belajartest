<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_jenis_manum".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property integer $jenis_manum_id
 *
 * @property \backend\models\IzinPariwisata $izinPariwisata
 * @property \backend\models\JenisManum $jenisManum
 */
class IzinPariwisataJenisManum extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id', 'jenis_manum_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_jenis_manum';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'jenis_manum_id' => Yii::t('app', 'Jenis Manum ID'),
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
    public function getJenisManum()
    {
        return $this->hasOne(\backend\models\JenisManum::className(), ['id' => 'jenis_manum_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPariwisataJenisManumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataJenisManumQuery(get_called_class());
    }
}
