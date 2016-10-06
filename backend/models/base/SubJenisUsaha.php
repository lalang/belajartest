<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "sub_jenis_usaha".
 *
 * @property integer $id
 * @property integer $jenis_usaha_id
 * @property string $keterangan
 * @property string $aktif
 *
 * @property \backend\models\Izin[] $izins
 * @property \backend\models\JenisUsaha $jenisUsaha
 */
class SubJenisUsaha extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_usaha_id'], 'integer'],
            [['aktif'], 'string'],
            [['keterangan'], 'string', 'max' => 100]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_jenis_usaha';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'jenis_usaha_id' => Yii::t('app', 'Jenis Usaha ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'aktif' => Yii::t('app', 'Aktif'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzins()
    {
        return $this->hasMany(\backend\models\Izin::className(), ['sub_jenis_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisUsaha()
    {
        return $this->hasOne(\backend\models\JenisUsaha::className(), ['id' => 'jenis_usaha_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\SubJenisUsahaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SubJenisUsahaQuery(get_called_class());
    }
}
