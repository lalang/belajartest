<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "regulasi".
 *
 * @property string $id
 * @property string $nama
 * @property string $nama_en
 * @property string $publish
 *
 * @property \backend\models\Download[] $downloads
 */
class Regulasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regulasi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nama_en' => 'Nama English',
            'publish' => 'Publish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownloads()
    {
        return $this->hasMany(\backend\models\Download::className(), ['regulasi_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\RegulasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\RegulasiQuery(get_called_class());
    }
}
