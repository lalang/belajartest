<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "jabatan".
 *
 * @property integer $id
 * @property string $nama_jabatan
 *
 * @property \backend\models\IzinTdpPimpinan[] $izinTdpPimpinans
 */
class Jabatan extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama_jabatan' => Yii::t('app', 'Nama Jabatan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinTdpPimpinans()
    {
        return $this->hasMany(\backend\models\IzinTdpPimpinan::className(), ['jabatan_lain_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\JabatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\JabatanQuery(get_called_class());
    }
}
