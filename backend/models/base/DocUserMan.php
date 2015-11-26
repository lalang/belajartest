<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "doc_user_man".
 *
 * @property integer $id
 * @property integer $id_access
 * @property string $docs
 */
class DocUserMan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_user_man';
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
            'id_access' => Yii::t('app', 'Id Access'),
            'nama' => Yii::t('app', 'Nama'),
            'docs' => Yii::t('app', 'Docs'),
            
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\DocUserManQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\DocUserManQuery(get_called_class());
    }
}
