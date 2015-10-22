<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "izin_tdp_kegiatan".
 *
 * @property integer $id
 * @property integer $kbli_id
 * @property integer $izin_tdp_id
 *
 * @property \backend\models\IzinTdp $izinTdp
 * @property \backend\models\Kbli $kbli
 */
class IzinTdpKegiatan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_tdp_kegiatan';
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
            'kbli_id' => 'Kbli ID',
            'izin_tdp_id' => 'Izin Tdp ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdp()
    {
        return $this->hasOne(\backend\models\IzinTdp::className(), ['id' => 'izin_tdp_id']);
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
     * @return \backend\models\IzinTdpKegiatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpKegiatanQuery(get_called_class());
    }
}
