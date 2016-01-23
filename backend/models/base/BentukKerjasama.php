<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "bentuk_kerjasama".
 *
 * @property integer $id
 * @property string $nama
 */
class BentukKerjasama extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bentuk_kerjasama';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\BentukKerjasamaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\BentukKerjasamaQuery(get_called_class());
    }
}
