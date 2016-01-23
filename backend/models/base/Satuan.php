<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "satuan".
 *
 * @property integer $id
 * @property string $kode
 * @property string $nama
 *
 * @property \backend\models\IzinTdp[] $izinTdps
 */
class Satuan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'satuan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdps()
    {
        return $this->hasMany(\backend\models\IzinTdp::className(), ['vii_fa_satuan' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\SatuanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SatuanQuery(get_called_class());
    }
}
