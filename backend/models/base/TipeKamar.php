<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "tipe_kamar".
 *
 * @property integer $id
 * @property string $keterangan
 *
 * @property \backend\models\IzinPariwisataKapasitasAkomodasi[] $izinPariwisataKapasitasAkomodasis
 */
class TipeKamar extends \yii\db\ActiveRecord
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
        return 'tipe_kamar';
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
    public function getIzinPariwisataKapasitasAkomodasis()
    {
        return $this->hasMany(\backend\models\IzinPariwisataKapasitasAkomodasi::className(), ['tipe_kamar_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\TipeKamarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\TipeKamarQuery(get_called_class());
    }
}
