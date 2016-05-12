<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_penelitian_lokasi".
 *
 * @property integer $id
 * @property integer $penelitian_id
 * @property integer $kota_id
 * @property integer $kecamatan_id
 * @property integer $kelurahan_id
 *
 * @property \backend\models\IzinPenelitian $penelitian
 */
class IzinPenelitianLokasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_penelitian_lokasi';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
//    public function optimisticLock() {
//        return 'lock';
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'penelitian_id' => Yii::t('app', 'Penelitian ID'),
            'kota_id' => Yii::t('app', 'Kota ID'),
            'kecamatan_id' => Yii::t('app', 'Kecamatan ID'),
            'kelurahan_id' => Yii::t('app', 'Kelurahan ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenelitian()
    {
        return $this->hasOne(\backend\models\IzinPenelitian::className(), ['id' => 'penelitian_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinPenelitianLokasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPenelitianLokasiQuery(get_called_class());
    }
}
