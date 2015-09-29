<?php

namespace backend\models;

use Yii;
use \backend\models\base\UserFile as BaseUserFile;

/**
 * This is the model class for table "user_file".
 */
class UserFile extends BaseUserFile
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'description'], 'required'],
            [['user_id'], 'integer'],
            ['filename', 'file'],
            [['type', 'url', 'description'], 'string', 'max' => 255]
        ];
    }
    
    public function behaviors()
    {
    	return [
    			[
    					'class' => '\yiidreamteam\upload\FileUploadBehavior',
    					'attribute' => 'filename',
    					'filePath' => '@webroot/uploads/[[pk]].[[extension]]',
    					'fileUrl' => '/uploads/[[pk]].[[extension]]',
    			],
    	];
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->user_id = Yii::$app->user->id;
            return true;
        } else {
            return false;
        }
    }
	
}
