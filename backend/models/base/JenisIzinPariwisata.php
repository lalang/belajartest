<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jenis_izin_pariwisata".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property \backend\models\IzinPariwisataTeknis[] $izinPariwisataTeknis
 */
class JenisIzinPariwisata extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_izin_pariwisata';
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
    public function getIzinPariwisataTeknis()
    {
        return $this->hasMany(\backend\models\IzinPariwisataTeknis::className(), ['jenis_izin_pariwisata_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\JenisIzinPariwisataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\JenisIzinPariwisataQuery(get_called_class());
    }
}
