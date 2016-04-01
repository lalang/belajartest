<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "golongan_gudang".
 *
 * @property integer $id
 * @property string $nama
 * @property string $luas
 * @property string $kapasitas_penyimpanan
 * @property string $bentuk
 * @property string $publish
 */
class GolonganGudang extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'golongan_gudang';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'luas' => 'Luas',
            'kapasitas_penyimpanan' => 'Kapasitas Penyimpanan',
            'bentuk' => 'Bentuk',
            'publish' => 'Publish',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\GolonganGudangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\GolonganGudangQuery(get_called_class());
    }
}
