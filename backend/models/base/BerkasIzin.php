<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "berkas_izin".
 *
 * @property integer $id
 * @property integer $izin_id
 * @property string $nama
 * @property string $extension
 * @property string $wajib
 * @property integer $urutan
 * @property string $aktif
 *
 * @property \backend\models\Izin $izin
 * @property \backend\models\PerizinanBerkas[] $perizinanBerkas
 */
class BerkasIzin extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'berkas_izin';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'izin_id' => 'Izin ID',
            'nama' => 'Nama',
            'extension' => 'Extension',
            'wajib' => 'Wajib',
            'urutan' => 'Urutan',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanBerkas()
    {
        return $this->hasMany(\backend\models\PerizinanBerkas::className(), ['berkas_izin_id' => 'id']);
    }

/**
     * @inheritdoc
     * @return type array
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\BerkasIzinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\BerkasIzinQuery(get_called_class());
    }
}
