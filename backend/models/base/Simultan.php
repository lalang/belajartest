<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "simultan".
 *
 * @property string $id
 * @property integer $perizinan_parent_id
 * @property integer $perizinan_child_id
 *
 * @property \backend\models\Perizinan $perizinanParent
 * @property \backend\models\Perizinan $perizinanChild
 */
class Simultan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simultan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perizinan_parent_id' => Yii::t('app', 'Perizinan Parent ID'),
            'perizinan_child_id' => Yii::t('app', 'Perizinan Child ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanParent()
    {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'perizinan_parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanChild()
    {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'perizinan_child_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\SimultanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SimultanQuery(get_called_class());
    }
    
}
