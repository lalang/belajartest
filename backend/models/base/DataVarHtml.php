<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "data_var_html".
 *
 * @property integer $id
 * @property string $var
 * @property string $ket
 */
class DataVarHtml extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_var_html';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'var' => Yii::t('app', 'Var'),
            'ket' => Yii::t('app', 'Ket'),
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\DataVarHtmlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\DataVarHtmlQuery(get_called_class());
    }
}
