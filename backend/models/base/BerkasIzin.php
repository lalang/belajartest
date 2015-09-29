<?php

namespace backend\models\base;

use Yii;

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
            'id' => Yii::t('app', 'ID'),
            'izin_id' => Yii::t('app', 'Izin ID'),
            'nama' => Yii::t('app', 'Nama'),
            'extension' => Yii::t('app', 'Extension'),
            'wajib' => Yii::t('app', 'Wajib'),
            'urutan' => Yii::t('app', 'Urutan'),
            'aktif' => Yii::t('app', 'Aktif'),
        ];
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
     * @return \backend\models\BerkasIzinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\BerkasIzinQuery(get_called_class());
    }
}
