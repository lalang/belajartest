<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "user_file".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $filename
 * @property string $type
 * @property string $url
 * @property string $description
 *
 * @property \backend\models\PerizinanBerkas[] $perizinanBerkas
 * @property \backend\models\User $user
 */
class UserFile extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_file';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'filename' => Yii::t('app', 'Filename'),
            'type' => Yii::t('app', 'Type'),
            'url' => Yii::t('app', 'Url'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanBerkas()
    {
        return $this->hasMany(\backend\models\PerizinanBerkas::className(), ['user_file_id' => 'id'])->joinWith('perizinan');
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\UserFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserFileQuery(get_called_class());
    }
}
