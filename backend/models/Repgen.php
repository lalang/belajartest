<?php

namespace backend\models;

//use Yii;

class Repgen extends \yii\db\ActiveRecord
{

    public static function getFields($transtype)
    {
        $view = 'v_repgen_'.$transtype;
        $fields = (new \yii\db\Query())->select('COLUMN_NAME, DATA_TYPE')->from('INFORMATION_SCHEMA.COLUMNS')->where('table_name = \''.$view.'\'')->all();
        return $fields;
    }

}
