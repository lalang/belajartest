<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $kode
 *
 * @property IzinSiup[] $izinSiups
 * @property Perizinan[] $perizinans
 * @property Sop[] $sops
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kode'], 'required'],
            [['kode'], 'integer'],
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
            'kode' => 'Kode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinSiups()
    {
        return $this->hasMany(IzinSiup::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinans()
    {
        return $this->hasMany(Perizinan::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSops()
    {
        return $this->hasMany(Sop::className(), ['status_id' => 'id']);
    }
}
