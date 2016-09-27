<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repgen_syntax".
 *
 * @property integer $id
 * @property integer $jenis_izin_id
 * @property string $aktif
 * @property string $sqlsyntax
 */
class RepgenSyntax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repgen_syntax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_izin_id'], 'integer'],
            [['aktif'], 'string'],
            [['sqlsyntax'], 'string', 'max' => 5000],
            [['jenis_izin_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisIzin::className(), 'targetAttribute' => ['jenis_izin_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_izin_id' => 'Jenis Izin ID',
            'aktif' => 'Aktif',
            'sqlsyntax' => 'Sqlsyntax',
        ];
    }
}
