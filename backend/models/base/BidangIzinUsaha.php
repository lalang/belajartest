<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "bidang_izin_usaha".
 *
 * @property integer $id
 * @property string $keterangan
 * @property string $kode
 * @property string $aktif
 *
 * @property \backend\models\Izin[] $izins
 * @property \backend\models\JenisUsaha[] $jenisUsahas
 */
class BidangIzinUsaha extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['keterangan', 'kode'], 'string', 'max' => 100]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bidang_izin_usaha';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'kode' => Yii::t('app', 'Kode'),
            'aktif' => Yii::t('app', 'Aktif'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzins()
    {
        return $this->hasMany(\backend\models\Izin::className(), ['bidang_izin_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisUsahas()
    {
        return $this->hasMany(\backend\models\JenisUsaha::className(), ['bidang_izin_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\BidangIzinUsahaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\BidangIzinUsahaQuery(get_called_class());
    }
}
