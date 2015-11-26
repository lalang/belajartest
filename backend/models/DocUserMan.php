<?php

namespace backend\models;

use Yii;
use \backend\models\base\DocUserMan as BaseDocUserMan;

/**
 * This is the model class for table "doc_user_man".
 */
class DocUserMan extends BaseDocUserMan
{
 public $file;   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_access','aktivasi','nama'], 'required'],
            [['nama'], 'string'],
            [['file'],'file'],
            [['docs'], 'string'],
           
        ];
    }
	
}
