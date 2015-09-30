<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "perizinan_berkas".
 *
 * @property integer $id
 * @property integer $perizinan_id
 * @property integer $berkas_izin_id
 * @property integer $user_file_id
 * @property integer $urutan
 *
 * @property \backend\models\Perizinan $perizinan
 * @property \backend\models\BerkasIzin $berkasIzin
 * @property \backend\models\UserFile $userFile
 */
class PerizinanBerkas extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perizinan_berkas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perizinan_id' => Yii::t('app', 'Perizinan ID'),
            'berkas_izin_id' => Yii::t('app', 'Berkas Izin ID'),
            'user_file_id' => Yii::t('app', 'User File ID'),
            'urutan' => Yii::t('app', 'Urutan'),
        ];
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
    public function getBerkasIzin()
    {
        return $this->hasOne(\backend\models\BerkasIzin::className(), ['id' => 'berkas_izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFile()
    {
        return $this->hasOne(\backend\models\UserFile::className(), ['id' => 'user_file_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\PerizinanBerkasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PerizinanBerkasQuery(get_called_class());
    }
}
