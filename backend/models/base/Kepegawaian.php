<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "kepegawaian".
 *
 * @property integer $id
 * @property string $nama
 * @property string $keterangan
 *
 * @property \backend\models\IzinKesehatan[] $izinKesehatans
 */
class Kepegawaian extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 200]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kepegawaian';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinKesehatans()
    {
        return $this->hasMany(\backend\models\IzinKesehatan::className(), ['kepegawaian_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\KepegawaianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\KepegawaianQuery(get_called_class());
    }
}
