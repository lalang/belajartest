<?php

namespace backend\models;

use Yii;
use \backend\models\base\UserFile as BaseUserFile;

/**
 * This is the model class for table "user_file".
 */
class UserFile extends BaseUserFile {

    /**
     * @inheritdoc
     */
    public $file;

    public function rules() {
        return [
            [['filename', 'description'], 'required'],
            [['user_id'], 'integer'],
            ['filename', 'file'],
            [['file'], 'file'],
            [['type', 'url', 'description'], 'string', 'max' => 255],
            [['path'], 'string', 'max' => 50]
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => '\yiidreamteam\upload\FileUploadBehavior',
                'attribute' => 'filename',
                'filePath' => '@frontend/web/uploads/[[attribute_path]]/[[attribute_user_id]]/[[basename]]',
                'fileUrl' => '/uploads/[[attribute_path]]/[[attribute_user_id]]/[[basename]]',
            ],
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($_SESSION['pemohon_id']) {
                $this->user_id = $_SESSION['pemohon_id'];
            } else {
                $this->user_id = Yii::$app->user->id;
            }

            return true;
        } else {
            return false;
        }
    }

}
