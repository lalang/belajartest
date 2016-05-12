<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "metode_penelitian".
 *
 * @property integer $id
 * @property string $metode
 * @property string $aktif
 */
class MetodePenelitian extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metode_penelitian';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'metode' => Yii::t('app', 'Metode'),
            'aktif' => Yii::t('app', 'Aktif'),
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\MetodePenelitianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\MetodePenelitianQuery(get_called_class());
    }
}
