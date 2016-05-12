<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "anggota_penelitian".
 *
 * @property integer $id
 * @property integer $penelitian_id
 * @property integer $nik_peneliti
 * @property integer $nama_peneliti
 * @property string $bidang
 *
 * @property \backend\models\IzinPenelitian $penelitian
 */
class AnggotaPenelitian extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota_penelitian';
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
            'nik_peneliti' => Yii::t('app', 'Nik Peneliti'),
            'nama_peneliti' => Yii::t('app', 'Nama Peneliti'),
            'bidang' => Yii::t('app', 'Bidang'),
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
     * @return \backend\models\AnggotaPenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\AnggotaPenelitianQuery(get_called_class());
    }
}
