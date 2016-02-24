<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "bentuk_perusahaan".
 *
 * @property string $id
 * @property string $nama
 * @property integer $urutan
 * @property string $type
 * @property string $publish
 *
 * @property \backend\models\IzinTdp[] $izinTdps
 */
class BentukPerusahaan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bentuk_perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'urutan' => Yii::t('app', 'Urutan'),
            'type' => Yii::t('app', 'Type'),
            'publish' => Yii::t('app', 'Publish'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdps()
    {
        return $this->hasMany(\backend\models\IzinTdp::className(), ['bentuk_perusahaan' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\BentukPerusahaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\BentukPerusahaanQuery(get_called_class());
    }
}
