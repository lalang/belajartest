<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "kbli_izin".
 *
 * @property integer $id
 * @property integer $kbli_id
 * @property integer $izin_id
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\Kbli $kbli
 */
class IzinKbli extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kbli_izin';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kbli_id' => 'Nama Kbli',
            'izin_id' => 'Nama Izin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKbli()
    {
        return $this->hasOne(\backend\models\Kbli::className(), ['id' => 'kbli_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinKbliQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinKbliQuery(get_called_class());
    }
}
