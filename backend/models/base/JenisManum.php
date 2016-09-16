<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jenis_manum".
 *
 * @property integer $id
 * @property string $keterangan
 *
 * @property \backend\models\IzinPariwisataJenisManum[] $izinPariwisataJenisManums
 */
class JenisManum extends \yii\db\ActiveRecord
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
        return 'jenis_manum';
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
    public function getIzinPariwisataJenisManums()
    {
        return $this->hasMany(\backend\models\IzinPariwisataJenisManum::className(), ['jenis_manum_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\JenisManumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\JenisManumQuery(get_called_class());
    }
}
