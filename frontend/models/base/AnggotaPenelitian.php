<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "anggota_penelitian".
 *
 * @property integer $id
 * @property integer $penelitian_id
 * @property integer $nik_peneliti
 * @property integer $nama_peneliti
 * @property string $bidang
 *
 * @property \frontend\models\IzinPenelitian $penelitian
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
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'penelitian_id' => 'Penelitian ID',
            'nik_peneliti' => 'Nik Peneliti',
            'nama_peneliti' => 'Nama Peneliti',
            'bidang' => 'Bidang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenelitian()
    {
        return $this->hasOne(\frontend\models\IzinPenelitian::className(), ['id' => 'penelitian_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\models\AnggotaPenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\AnggotaPenelitianQuery(get_called_class());
    }
}
