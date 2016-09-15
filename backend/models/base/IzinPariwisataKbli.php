<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pariwisata_kbli".
 *
 * @property integer $id
 * @property integer $izin_pariwisata_id
 * @property integer $kbli_id
 *
 * @property \backend\models\IzinPariwisata $izinPariwisata
 * @property \backend\models\Kbli $kbli
 */
class IzinPariwisataKbli extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_pariwisata_id', 'kbli_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pariwisata_kbli';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'izin_pariwisata_id' => Yii::t('app', 'Izin Pariwisata ID'),
            'kbli_id' => Yii::t('app', 'Kbli ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPariwisata()
    {
        return $this->hasOne(\backend\models\IzinPariwisata::className(), ['id' => 'izin_pariwisata_id']);
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
     * @return \backend\models\IzinPariwisataKbliQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinPariwisataKbliQuery(get_called_class());
    }
}
