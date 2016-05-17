<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_tdp_kegiatan".
 *
 * @property integer $id
 * @property string $izin_tdp_id
 * @property integer $kbli_id
 * @property string $produk
 * @property string $flag_utama
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_tdp_id' => Yii::t('app', 'Izin Tdp ID'),
            'kbli_id' => Yii::t('app', 'Kbli ID'),
            'produk' => Yii::t('app', 'Produk'),
            'flag_utama' => Yii::t('app', 'Flag Utama'),
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
     * @return \backend\models\IzinTdpKegiatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinTdpKegiatanQuery(get_called_class());
    }
    
    public static function getDb()
    {
        // use the "db2" application component
        return \Yii::$app->dbTrans;  
    }
}
