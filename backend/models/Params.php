<?php

namespace backend\models;

use Yii;
use \backend\models\base\Params as BaseParams;

/**
 * This is the model class for table "params".
 */
class Params extends BaseParams {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'value'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['value'], 'string']
        ];
    }

}
