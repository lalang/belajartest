<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "tujuan_wisata".
 *
 * @property integer $id
 * @property string $keterangan
 *
 * @property \backend\models\IzinPariwisataTujuanWisata[] $izinPariwisataTujuanWisatas
 */
class TujuanWisata extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keterangan'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tujuan_wisata';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisataTujuanWisatas()
    {
        return $this->hasMany(\backend\models\IzinPariwisataTujuanWisata::className(), ['tujuan_wisata_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\TujuanWisataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\TujuanWisataQuery(get_called_class());
    }
}
