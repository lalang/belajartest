<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "params".
 *
 * @property string $name
 * @property string $value
 */
class Params extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'params';
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
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\ParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ParamsQuery(get_called_class());
    }
}
