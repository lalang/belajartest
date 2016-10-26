<?php

namespace backend\models;

use Yii;
use \backend\models\base\JenisIzinPariwisata as BaseJenisIzinPariwisata;

/**
 * This is the model class for table "jenis_izin_pariwisata".
 *
 * @property integer $id
 * @property string $nama
 */
class JenisIzinPariwisata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_izin_pariwisata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }
}
