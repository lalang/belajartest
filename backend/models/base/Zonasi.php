<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "zonasi".
 *
 * @property integer $id
 * @property string $kode
 * @property string $zonasi
 * @property string $rdtr
 *
 * @property \backend\models\Perizinan[] $perizinans
 */
class Zonasi extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zonasi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'zonasi' => Yii::t('app', 'Zonasi'),
            'rdtr' => Yii::t('app', 'Rdtr'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinans()
    {
        return $this->hasMany(\backend\models\Perizinan::className(), ['zonasi_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ZonasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ZonasiQuery(get_called_class());
    }
}
