<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "hari_libur".
 *
 * @property string $id
 * @property string $tanggal
 * @property string $keterangan
 * @property string $keterangan_en
 */
class HariLibur extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hari_libur';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'keterangan_en' => 'Keterangan English',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\HariLiburQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\HariLiburQuery(get_called_class());
    }
}
