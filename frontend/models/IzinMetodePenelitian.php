<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "izin_metode_penelitian".
 *
 * @property integer $id
 * @property integer $penelitian_id
 * @property integer $metode_id
 *
 * @property IzinPenelitian $penelitian
 * @property MetodePenelitian $metode
 */
class IzinMetodePenelitian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_metode_penelitian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['penelitian_id', 'metode_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'penelitian_id' => 'Penelitian ID',
            'metode_id' => 'Metode ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenelitian()
    {
        return $this->hasOne(IzinPenelitian::className(), ['id' => 'penelitian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetode()
    {
        return $this->hasOne(MetodePenelitian::className(), ['id' => 'metode_id']);
    }
}
