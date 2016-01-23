<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "negara".
 *
 * @property integer $id
 * @property string $kode_negara
 * @property string $nama_negara
 *
 * @property \backend\models\IzinTdpPimpinan[] $izinTdpPimpinans
 * @property \backend\models\IzinTdpSaham[] $izinTdpSahams
 */
class Negara extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'negara';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode_negara' => Yii::t('app', 'Kode Negara'),
            'nama_negara' => Yii::t('app', 'Nama Negara'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpPimpinans()
    {
        return $this->hasMany(\backend\models\IzinTdpPimpinan::className(), ['kewarganegaraan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpSahams()
    {
        return $this->hasMany(\backend\models\IzinTdpSaham::className(), ['kewarganegaraan' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\NegaraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\NegaraQuery(get_called_class());
    }
}
