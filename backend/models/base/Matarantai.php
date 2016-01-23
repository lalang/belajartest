<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "matarantai".
 *
 * @property integer $id
 * @property string $nama
 */
class Matarantai extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matarantai';
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
     * @return \backend\models\MatarantaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MatarantaiQuery(get_called_class());
    }
}
