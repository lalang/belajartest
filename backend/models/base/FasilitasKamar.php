<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "fasilitas_kamar".
 *
 * @property integer $id
 * @property string $keterangan
 *
 * @property \backend\models\IzinPariwisataFasilitas[] $izinPariwisataFasilitas
 */
class FasilitasKamar extends \yii\db\ActiveRecord
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
        return 'fasilitas_kamar';
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
    public function getIzinPariwisataFasilitas()
    {
        return $this->hasMany(\backend\models\IzinPariwisataFasilitas::className(), ['fasilitas_kamar_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\FasilitasKamarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\FasilitasKamarQuery(get_called_class());
    }
}
