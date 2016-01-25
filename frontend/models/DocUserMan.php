<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\DocUserMan as BaseDocUserMan;

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
            [['id_access', 'nama', 'docs'], 'required'],
            [['id_access', 'docs'], 'string'],
            [['file'],'file'],
            [['nama'], 'string', 'max' => 200],
           
        ];
    }
	
}
