<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hari_libur".
 *
 * @property integer $id
 * @property string $tanggal
 * @property string $keterangan
 * @property string $keterangan_en
 */
class HariLibur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hari_libur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal'], 'required'],
            [['tanggal'], 'safe'],
            [['keterangan', 'keterangan_en'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'keterangan_en' => Yii::t('app', 'Keterangan En'),
        ];
    }

    /**
     * @inheritdoc
     * @return HariLiburQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HariLiburQuery(get_called_class());
    }
}
