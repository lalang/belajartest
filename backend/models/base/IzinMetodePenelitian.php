<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "izin_metode_penelitian".
 *
 * @property integer $id
 * @property integer $penelitian_id
 * @property integer $metode_id
 *
 * @property \backend\models\IzinPenelitian $penelitian
 * @property \backend\models\MetodePenelitian $metode
 */
class IzinMetodePenelitian extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_metode_penelitian';
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
            'id' => Yii::t('app', 'ID'),
            'penelitian_id' => Yii::t('app', 'Penelitian ID'),
            'metode_id' => Yii::t('app', 'Metode ID'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getMetode()
    {
        return $this->hasOne(\backend\models\MetodePenelitian::className(), ['id' => 'metode_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\IzinMetodePenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\IzinMetodePenelitianQuery(get_called_class());
    }
}
