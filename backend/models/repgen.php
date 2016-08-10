<?php

namespace backend\models;

use yii\db\Query;

class Repgen extends \yii\db\ActiveRecord
{

    public static function getFields($transtype)
    {
        $view = 'v_repgen_'.$transtype;
        $fields = (new Query())->select('COLUMN_NAME, DATA_TYPE')->from('INFORMATION_SCHEMA.COLUMNS')->where('table_name = \''.$view.'\'')->all();
        return $fields;
    }

}
