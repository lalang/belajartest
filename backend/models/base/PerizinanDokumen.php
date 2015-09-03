<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "perizinan_dokumen".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $dokumen_pendukung_id
 * @property integer $urutan
 * @property string $isi
 * @property string $file
 * @property integer $check
 * @property string $keterangan
 * @property integer $user_check
 * @property string $time_check
 *
 * @property \backend\models\DokumenPendukung $dokumenPendukung
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\User $userCheck
 */
class PerizinanDokumen extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perizinan_dokumen';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perizinan_id' => Yii::t('app', 'Perizinan ID'),
            'dokumen_pendukung_id' => Yii::t('app', 'Dokumen Pendukung ID'),
            'urutan' => Yii::t('app', 'Urutan'),
            'isi' => Yii::t('app', 'Isi'),
            'file' => Yii::t('app', 'File'),
            'check' => Yii::t('app', 'Check'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'user_check' => Yii::t('app', 'User Check'),
            'time_check' => Yii::t('app', 'Time Check'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenPendukung()
    {
        return $this->hasOne(\backend\models\DokumenPendukung::className(), ['id' => 'dokumen_pendukung_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinan()
    {
        return $this->hasOne(\backend\models\Perizinan::className(), ['id' => 'perizinan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCheck()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_check']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\PerizinanDokumenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PerizinanDokumenQuery(get_called_class());
    }
}
