<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "zonasi".
 *
 * @property integer $id
 * @property string $kode
 * @property string $zonasi
 * @property string $rdtr
 *
 * @property \backend\models\Perizinan[] $perizinans
 * @property \backend\models\PerizinanProses[] $perizinanProses
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
            'id' => 'ID',
            'kode' => 'Kode',
            'zonasi' => 'Zonasi',
            'rdtr' => 'Rdtr',
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
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanProses()
    {
        return $this->hasMany(\backend\models\PerizinanProses::className(), ['zonasi_id' => 'id']);
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
     * @return \backend\models\ZonasiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ZonasiQuery(get_called_class());
    }
}
