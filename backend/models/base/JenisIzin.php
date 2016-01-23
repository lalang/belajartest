<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jenis_izin".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property \backend\models\IzinTdpLegal[] $izinTdpLegals
 */
class JenisIzin extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_izin';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpLegals()
    {
        return $this->hasMany(\backend\models\IzinTdpLegal::className(), ['jenis' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\JenisIzinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\JenisIzinQuery(get_called_class());
    }
}
