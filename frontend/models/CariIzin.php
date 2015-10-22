<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CariIzin extends Model
{
    public $cari;

    public function rules()
    {
        return [
            [['cari', 'cari'], 'required'],
        ];
    }
}
?>