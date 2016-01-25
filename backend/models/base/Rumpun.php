<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "rumpun".
 *
 * @property string $id
 * @property string $nama
 *
 * @property \backend\models\Izin[] $izins
 */
class Rumpun extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rumpun';
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
            'nama' => Yii::t('app', 'Nama'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzins()
    {
        return $this->hasMany(\backend\models\Izin::className(), ['rumpun_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\RumpunQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\RumpunQuery(get_called_class());
    }
}
