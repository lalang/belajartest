<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jenis_perusahaan".
 *
 * @property integer $id
 * @property string $nama
 */
class JenisPerusahaan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_perusahaan';
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
     * @return \backend\models\JenisPerusahaanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\JenisPerusahaanQuery(get_called_class());
    }
}
