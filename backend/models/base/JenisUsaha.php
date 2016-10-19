<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jenis_usaha".
 *
 * @property integer $id
 * @property integer $bidang_izin_usaha_id
 * @property string $keterangan
 * @property string $aktif
 *
 * @property \backend\models\Izin[] $izins
 * @property \backend\models\BidangIzinUsaha $bidangIzinUsaha
 * @property \backend\models\SubJenisUsaha[] $subJenisUsahas
 */
class JenisUsaha extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;
    
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
            'bidang_izin_usaha_id' => Yii::t('app', 'Bidang Izin Usaha ID'),
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
    public function getBidangIzinUsaha()
    {
        return $this->hasOne(\backend\models\BidangIzinUsaha::className(), ['id' => 'bidang_izin_usaha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubJenisUsahas()
    {
        return $this->hasMany(\backend\models\SubJenisUsaha::className(), ['jenis_usaha_id' => 'id']);
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
