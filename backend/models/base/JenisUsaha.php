<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jenis_usaha".
 *
 * @property integer $id
 * @property integer $bidang_izin_id
 * @property string $keterangan
 * @property string $aktif
 *
 * @property \backend\models\Izin[] $izins
 * @property \backend\models\BidangIzinUsaha $bidangIzin
 * @property \backend\models\SubJenis[] $subJenis
 */
class JenisUsaha extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bidang_izin_id'], 'integer'],
            [['aktif'], 'string'],
            [['keterangan'], 'string', 'max' => 100]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_usaha';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bidang_izin_id' => Yii::t('app', 'Bidang Izin ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'aktif' => Yii::t('app', 'Aktif'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzins()
    {
        return $this->hasMany(\backend\models\Izin::className(), ['jenis_usaha_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidangIzin()
    {
        return $this->hasOne(\backend\models\BidangIzinUsaha::className(), ['id' => 'bidang_izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubJenis()
    {
        return $this->hasMany(\backend\models\SubJenis::className(), ['jenis_usaha_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\JenisUsahaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\JenisUsahaQuery(get_called_class());
    }
}
